#!/home/tommy/ndu/bin/python3
#使用者辭典一律設定為權重1
#僅處理一般斷詞模式
from datetime import datetime
import time
from ckiptagger import data_utils, construct_dictionary, WS, POS, NER
import sys

def stopwordslist(filepath):
    stopwords = [line.strip() for line in open(filepath, 'r', encoding='utf-8').readlines()]
    return stopwords

#onnly need to run once
#data_utils.download_data_gdown("./")

ws = WS("../../data")
pos = POS("../../data")
ner = NER("../../data")

documents = []
with open('doc.txt', 'r') as file:
    documents = file.read().split("\n")

word_to_weight = {}
with open('userdict.txt', 'r') as file:
    words = file.read().split("\n")
for i in range(0,len(words)):
    word_to_weight[ words[i] ] = 1;

#print(word_to_weight)
#word_to_weight = {
#    "趙立堅": 1,
#    "受邀": 1
#}
dictionary = construct_dictionary(word_to_weight)

# sentence_segmentation = True, # To consider delimiters
# segment_delimiter_set = {",", "。", ":", "?", "!", ";"}), # This is the defualt set of delimiters
# recommend_dictionary = dictionary1, # words in this dictionary are encouraged
# coerce_dictionary = dictionary2, # words in this dictionary are forced
word_sentence_list = ws( documents, recommend_dictionary = dictionary )
#word_sentence_list = ws( documents )
pos_sentence_list = pos(word_sentence_list)
entity_sentence_list = ner(word_sentence_list, pos_sentence_list)

stopwords = stopwordslist('stopwords.txt')  # 這裏加載停用詞的路徑

results = ''
for sentence in word_sentence_list:
    sentence = ' '.join(sentence)
    result = ''
    words = sentence.split(' ')
    for word in words:
        if word not in stopwords:
            result = result + word + " "
    results = results + result + "\n"

with open('results.txt', 'w') as f:
    f.write(results)

#read meta data and write them back
with open('metadata.txt') as f:
    tmp = f.readlines()
strs = tmp[0].split(",")

taskname = strs[0]
starttime = strs[1]
endtime = strs[2]
pid = strs[3]
status = strs[4]

endtime = str(int(datetime.now().timestamp()))

with open('metadata.txt', 'w') as f:
    f.write(taskname + "," + starttime + "," + endtime + "," + pid + "," + "結束")
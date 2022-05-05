#!/home/tommy/ndu/bin/python3
from datetime import datetime
import time
import jieba

def stopwordslist(filepath):
    stopwords = [line.strip() for line in open(filepath, 'r', encoding='utf-8').readlines()]
    return stopwords

documents = []
with open('doc.txt', 'r') as file:
    documents = file.read().split("\n")

jieba.load_userdict("userdict.txt")

for sentence in documents:
    seg_list = jieba.cut(sentence)
    #print(' '.join(seg_list))

stopwords = stopwordslist('stopwords.txt')  # 這裏加載停用詞的路徑

results = ''
for sentence in documents:
    seg_list = jieba.cut(sentence)
    sentence = ' '.join(seg_list)

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

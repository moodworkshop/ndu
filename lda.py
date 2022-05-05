#!/home/tommy/ndu/bin/python3
#使用者辭典一律設定為權重1
#僅處理一般斷詞模式
from sklearn.feature_extraction.text import CountVectorizer
from gensim import corpora, models
from gensim.models import CoherenceModel
from datetime import datetime
import time
import sys
import csv

min_df = float(sys.argv[1])
max_df = float(sys.argv[2])
num_topics = int(sys.argv[3])
num_words = int(sys.argv[4])

vectorizer = CountVectorizer(min_df=min_df, max_df=max_df, lowercase=True)

documents = []
f = open("doc.txt", "r")
files = f.read().split("\n")
for i in range(0,len(files)):
  documents.append( files[i].split(" ") )
dictionary = corpora.Dictionary(documents)
corpus = [dictionary.doc2bow(words) for words in documents] #sparce matrix

results = ""
scores = ""
for i in range( 2, (num_topics+1) ):
    results = results + "取" + str(i) + "個主題\n"
    lda = models.ldamodel.LdaModel(corpus=corpus, id2word=dictionary, num_topics=num_topics)
    for topic in lda.print_topics(num_words=num_words):
        results =  results + topic[1] + "\n"
    results = results + "\n"
    coherence_model_lda = CoherenceModel(model=lda, texts=documents, dictionary=dictionary, coherence='c_v')
    coherence_lda = coherence_model_lda.get_coherence()
    scores = scores + str(i) + "," + str(coherence_lda) + "\n"

with open('results.txt', 'w') as f:
    f.write(results)

with open('scores.txt', 'w') as f:
    f.write(scores)

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
#!/home/tommy/ndu/bin/python3
#使用者辭典一律設定為權重1
#僅處理一般斷詞模式
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfTransformer
from sklearn.metrics.pairwise import cosine_similarity
from datetime import datetime
import time
import sys
import csv

vectorizer = CountVectorizer()
#vectorizer = CountVectorizer(min_df=0.2, max_df=0.5, lowercase=True)

with open('doc.txt', 'r') as file:
    documents = file.read().split("\n")

corpus = documents

X = vectorizer.fit_transform(corpus)
one_hot_encoded = X.toarray()           
column_names = vectorizer.get_feature_names_out()

results = ''
for i in range( 0,len(column_names) ):
    results = results + column_names[i] + "\n"
with open('column_names.txt', 'w') as f:
    f.write(results)

with open('one_hot_encoded.txt', 'w') as f:
    csv.writer(f, delimiter=',').writerows(one_hot_encoded)

transformer = TfidfTransformer()
tfidf = transformer.fit_transform(vectorizer.fit_transform(corpus))

with open('tfidf_encoded.txt', 'w') as f:
    csv.writer(f, delimiter=',').writerows(tfidf.toarray())

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
#!/home/tommy/ndu/bin/python3
#使用者辭典一律設定為權重1
#僅處理一般斷詞模式
import matplotlib.pyplot as plt #載入繪圖套件
import wordcloud #載入文字雲套件
from collections import Counter
from datetime import datetime
import time
import sys

with open('doc.txt', 'r') as file:
    documents = file.read()
documents = documents.replace("\n", " ")

results_obj = wordcloud.WordCloud().process_text( documents )

#print(documents)

results = ""
for k, v in results_obj.items():
   results = results + k + ","  + str(v) + "\n"

with open('results.txt', 'w') as f:
    f.write(results)

wc = wordcloud.WordCloud(collocations=True,width=1080,height=720,background_color='white',font_path='../../JhengHei.ttf').generate(documents)
wc.to_file('my_wordcloud.png')

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
#!/usr/bin/env python
from __future__ import print_function
import os

path = './pics'
path_to_json = './json'

optList = []
sqlList = []
bId = []
bIdList = []
sId = []
sIdList = []
imgId = []
imgIdList = []

files = os.listdir(path)
newFiles = ''

for bid in files:
	bId.append(bid)

for bid in bId:
  files = os.listdir(path + '/' + bid)
  bIdItem = path + '/' + bid
  bIdList.append(files)
  # print(bIdItem)
  for sid in files:
    files = os.listdir(path + '/' + bid + '/' + sid)
    sIdPath = bIdItem + '/' + sid
    sIdList.append(sIdPath)
    sId.append(sid)
    for iId in files:
      imgIdPath = sIdPath + '/' + iId
      optPath = '"bId":' + bid + ',"sId":' + sid + ',"imgId":' + iId
      sqlPath = '(\'' + iId + '\'' + "," + bid + "," + sid + ')'
      imgIdList.append(imgIdPath)
      imgId.append(iId)
      optList.append(optPath)
      sqlList.append(sqlPath)

# print(optPath)

with open(path_to_json + "/output.json", "w") as f:
  f.write('{\n' + '"path":[\n')

  for i in optList:
    opt = '{' + i + '}'
    f.write(opt + ",\n")
      
  f.write(']\n}')

with open(path_to_json + "/sql.txt", "w") as f:
  f.write('INSERT INTO `sake_img`(`imgName`, `bId`, `sId`)\nVALUES\n')

  for i in sqlList:
    f.write(i + ",\n")
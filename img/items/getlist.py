#!/usr/bin/env python
from __future__ import print_function
import os

path = './pics'
path_to_output = './json'

bId = []
sId = []
imgId = []

bIdList = []
sIdList = []
optList = []
sqlList = []
jsonList = []
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
      optPath = '"' + path + '/' + bid + '/' + sid + '/' + iId + '"'
      jsonPath = '"bId":' + bid + ',"sId":' + sid + ',"imgId":' + iId
      sqlPath = '(\'' + iId + '\'' + "," + bid + "," + sid + ')'
      imgIdList.append(imgIdPath)
      imgId.append(iId)
      optList.append(optPath)
      jsonList.append(jsonPath)
      sqlList.append(sqlPath)

# no use this time
def buildPath():
  for i in files:
    path  = path + '/' + i
    files = os.listdir(path)
    optList.append(i)

# print(optPath)

with open(path_to_output + "/item.json", "w") as f:
  f.write('{\n' + '"items":[\n')
  for i in jsonList:
    opt = '{' + i + '}'
    f.write(opt + ",\n")      
  f.write(']\n}')

with open(path_to_output + "/sql.txt", "w") as f:
  f.write('INSERT INTO `sake_img`(`imgName`, `bId`, `sId`)\nVALUES\n')
  for i in sqlList:
    f.write(i + ",\n")

with open(path_to_output + "/path.json", "w") as f:
  f.write('{\n' + '"items":[\n')
  for i in optList:
    opt = '{"path": ' + i + '}'
    f.write(opt + ",\n")      
  f.write(']\n}')
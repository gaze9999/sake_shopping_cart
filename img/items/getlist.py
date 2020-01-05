#!/usr/bin/env python
from __future__ import print_function
import os

path = './pics'
path_to_json = './json'

folderList = []
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
  sIdItems = os.listdir(path + '/' + bid)
  sIdList.append(sIdItems)

for sid in sIdList:
  for i in sid:
    sIdPath = '/' + i
    imgIdList.append(sIdPath)

print(imgIdList)



# with open(path_to_json + "/output.json", "w") as f:
#   f.write('{\n' + '"path":[\n')

#   for p in bId:
#     opt = '{"pics":' + '"/' + p + '"}'
#   for 

#   f.write(']\n}')

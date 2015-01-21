###############################
# Script for scrapping links and club name from OSL website
# Tarik Adnan Moon
# Part of Join Harvard Project
################################

from bs4 import BeautifulSoup
soup = BeautifulSoup(open('index.htm'))

links = soup.find_all('a')

linkArray = []
nameArray = []
for link in links:
	l = link.get('href')
	linkArray.append(l)
	name = link.get_text()
	name = name.encode('ascii','ignore')
	nameArray.append(name)

print nameArray
# print linkArray

f = open('file.txt','w+')

for name in nameArray:
	f.write(name)
	f.write('\n')

fl = open('links.txt','w+')

for link in linkArray:
	fl.write(link)
	fl.write('\n')
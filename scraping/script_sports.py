###############################
# Script for scrapping links and sprorts name from gocrimson.com
# Tarik Adnan Moon
# Part of Join Harvard Project
################################

from bs4 import BeautifulSoup
soup = BeautifulSoup(open('index.html'))

# First find all links in the 'rich' div
links = soup.find('div',{'class':'rich'}).find_all('a')

# print links

linkArray = []
nameArray = []
for link in links:
	l = link.get('href')
	linkArray.append(l)
	name = link.get_text()
	name = name.encode('ascii','ignore')
	nameArray.append(name)

# print nameArray
# print linkArray

#write all sports name in a txt file
f = open('name.txt','w+')

for name in nameArray:
	f.write(name)
	f.write('\n')

#write all sports' links in a txt file
fl = open('links.txt','w+')

for link in linkArray:
	fl.write(link)
	fl.write('\n')
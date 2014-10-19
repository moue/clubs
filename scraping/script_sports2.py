################################
# Script for scrapping information of each sports club from gocrimson.com
# Tarik Adnan Moon
# Part of Join Harvard Project
################################

from bs4 import BeautifulSoup
import urllib2
import csv

#global array for taking all the club infos
infoClubs = []

linkTxt = open('links.txt','r+')
clubs = open('name.txt', 'r+')

num = 0
while(num <62):
	tempArr =[]
	name = clubs.readline().strip()
	tempArr.append(name)
	num += 1
	link = linkTxt.readline().strip()
	print 'link',num, link
	club = urllib2.urlopen(link)
	club = BeautifulSoup(club)

	club = club.find('div',{'class':'rich'}).find_all('p')

	clubinfo =''

	for i in range(1,len(club)):
		clubinfo += str(club[i])

	tempArr.append(clubinfo)
	infoClubs.append(tempArr)

# write all these info to a csv file for later converting to sql
with open('sports.csv', 'w+') as f:
    newfile = csv.writer(f, delimiter='|',quotechar='"', quoting=csv.QUOTE_MINIMAL)
    for club in infoClubs:
    	clubStuff = []
    	for info in club:
    		clubStuff.append(info)
        newfile.writerow(clubStuff)
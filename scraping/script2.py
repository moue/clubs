###############################
# Script for scrapping infromation of all the clubs from OSL website
# Tarik Adnan Moon
# Part of Join Harvard Project
################################

from bs4 import BeautifulSoup
import urllib2
import csv
infoClubs = []
categoryArr = []

linkTxt = open('links.txt','r+')
clubs = open('file.txt', 'r+')

num = 0
while(num <452):
	num += 1
	link = linkTxt.readline().strip()
	print 'link',num, link
	club = urllib2.urlopen(link)

	infoClub = [ '' for i in range(10) ]
	#0: clubid
	clubid = link[60:]
	infoClub[0] = clubid
	#1: clubname
	infoClub[1] = clubs.readline().strip()

	soup = BeautifulSoup(club)

	# info = soup.p.get_text()
	info = soup.p.get_text().encode('ascii','ignore')
	#2: club description
	infoClub[2] = info

	stuff = soup.ul

	stuffArray =[]

	stuffArray.append(stuff.li)

	count = 0
	for more in stuff.li.next_siblings:
		if (count%2 == 1):
			stuffArray.append(more)
		count +=1

	# for j in range(8):
	# 	infoClub[j+2] = stuffArray[j]

	#info New: categories do .a trick

	catRaw = BeautifulSoup(str(stuffArray[0]))
	cats = catRaw.find_all('a')

	
	for cat in cats:
		catStr = []
		tempCat = str(cat.get('href'))
		catStr.append(clubid)
		catStr.append(tempCat[18:])
		categoryArr.append(catStr)
	# print cats
	# print categoryArr

	#info 3: number of members
	memStr = (str(stuffArray[1]))[49:-10]

	# print memStr
	if memStr == '1-9':
		memStr = 0
	elif memStr == '10-25':
		memStr = 1
	elif memStr == '26-50':
		memStr = 2
	elif memStr == '76-100':
		memStr =3
	else:
		memStr = 4
	# print memStr

	infoClub[3] = str(memStr)

	#inf 4: involvement
	involvementStr = str(stuffArray[2])
	infoClub[4] = involvementStr[43:-10]

	#info 5: group email
	emailRaw = BeautifulSoup(str(stuffArray[3]))
	email = emailRaw.a.get('href')
	infoClub[5] = str(email)

	#info 6: group website
	webRaw = BeautifulSoup(str(stuffArray[4]))
	web = webRaw.a.get('href')
	infoClub[6] = str(web)
	#info 7: Mailing address
	mailingRaw = BeautifulSoup(str(stuffArray[5]))
	mail = mailingRaw.ul

	mailStr = (str(mail.li))[4:-5] + ','

	check = 0
	for line in mail.li.next_siblings:
		check +=1
		if (check % 2 == 0):
			mailStr += (str(line))[4:-5]+ ','

	mailStr = mailStr[:-1]
	if (num != 204):
		mailStr.encode('ascii','ignore')

		if len(mailStr) > 255:
			print 'Error: mailing address too long'

		infoClub[7] = mailStr
	else:
		infoClubs[7] = "hardcode"


	#info 8
	string1 = str(stuffArray[6])
	infoClub[8] = string1[58:-10]
	#info 9
	string = str(stuffArray[7])
	infoClub[9] = string[56:-10]

	infoClubs.append(infoClub)

# print infoClubs

# linkArray = []
# nameArray = []
# for link in links:
# 	l = link.get('href')
# 	linkArray.append(l)
# 	name = link.get_text()
# 	name = name.encode('ascii','ignore')
# 	nameArray.append(name)

# print linkArray
# print linkArray

# f = open('file.txt','w+')

# for name in nameArray:
# 	f.write(name)
# 	f.write('\n')

# fl = open('links.txt','w+')

# for link in linkArray:
# 	fl.write(link)
# 	fl.write('\n')

with open('clubs.csv', 'w+') as f:
    newfile = csv.writer(f, delimiter='|',quotechar='"', quoting=csv.QUOTE_MINIMAL)
    for club in infoClubs:
    	clubStuff = []
    	for info in club:
    		clubStuff.append(info)
        newfile.writerow(clubStuff)

with open('clubsCat.csv', 'w+') as fn:
    catFile = csv.writer(fn, delimiter=',',quotechar='"', quoting=csv.QUOTE_MINIMAL)
    catFile.writerow(['club_id','club_tag'])
    for lol in categoryArr:
        catFile.writerow(lol)
# fn = open('out.txt', 'w+')
# for club in infoClubs:
# 	newfile.writerow(club)
	# clubStuff =  []
	# for info in club:
	# 	clubStuff.append(info.encode('utf8'))
	# csvfn.writerow(clubStuff)


# fn.close()
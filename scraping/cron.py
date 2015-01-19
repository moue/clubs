from bs4 import BeautifulSoup
import requests as rq
import csv

def get_all_clubs():
	"""
	Gets the names and urls of all the clubs at Harvard
	"""
	url = "http://fas-mini-sites.fas.harvard.edu/osl/grouplist"

	r = rq.get(url)
	soup = BeautifulSoup(r.text)
	links = soup.find_all('a')

	linkArray = []
	nameArray = []

	for link in links:
		l = link.get('href')
		linkArray.append(l)
		name = link.get_text()
		name = name.encode('ascii','ignore')
		nameArray.append(name)

	return nameArray, linkArray


def get_club_info(url):
	"""
	Gets the info of all the clubs given the links of all the clubs. 
	This is basically a for loop that goes through all the info pages and scrapes them.

	They get 9 info into 
	1. Clubname:
	2. 
	"""
	base_url = "http://fas-mini-sites.fas.harvard.edu/osl/grouplist"
	num = 0

	club_url = base_url + url

	categoryArr= []

	r = rq.get(club_url)
	soup = BeautifulSoup(r.text)
	infoClub = [ '' for i in range(9) ]
	#0: clubid
	clubid = url.split("=")[-1]
	infoClub[0] = clubid
	#1: clubname
	infoClub[1] =  soup.find("h2").text
	                         
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

	#info New: categories do .a trick

	catRaw = BeautifulSoup(str(stuffArray[0]))
	cats = catRaw.find_all('a')

	for cat in cats:
	    catStr = []
	    tempCat = str(cat.get('href'))
	    catStr.append(clubid)
	    catStr.append(tempCat[18:])
	    categoryArr.append(catStr)

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


	#info 8: month of election
	string1 = str(stuffArray[6])
	infoClub[8] = string1[58:-10]
	
	print "Got all info of", infoClub[0], infoClub[1]

	return infoClub, categoryArr

def cron_main():
	"""
	Gets allt the info and writes the data to a csv file
	"""
	_, club_urls = get_all_clubs()
	
	club_info_full =[]
	cat_full =[]
	for url in club_urls:
		club_info, cat_arr = get_club_info(url)
		club_info_full.append(club_info)
		cat_full.extend(cat_arr)

	with open('clubs.csv', 'w+') as f:
	    newfile = csv.writer(f, delimiter='|',quotechar='"', quoting=csv.QUOTE_MINIMAL)
	    for club in club_info_full:
	    	clubStuff = []
	    	for info in club:
	    		clubStuff.append(info)
	        newfile.writerow(clubStuff)

	with open('clubsCat.csv', 'w+') as fn:
	    catFile = csv.writer(fn, delimiter=',',quotechar='"', quoting=csv.QUOTE_MINIMAL)

	    catFile.writerow(['club_id','club_tag'])
	    for lol in cat_full:
	        catFile.writerow(lol)

if __name__ == '__main__':
	cron_main()


Harvard College Student Activities Finder
====

- [x] Emailed Prof. Waldo to set up time to discuss site
- [ ] Create documentation
	- [ ] Clean up github repo
	- [ ] Comments on the purpose of each file in the directory tree
	- [ ] Add comments to each file
- [ ] Email Prof. Waldo the link to the github repo 
- [ ] Migrate site to AWS hosting
	- [ ] Get AWS credentials
	- [ ] Move database to AWS
	- [ ] Point joinharvard.com to AWS
- [ ] Get new Harvard url like activities.college.harvard.edu or activities.fas.harvard.edu

Features
==

Randomizer
-
Randomly generates 8 student organizations and 2 club sports to display upon key down. 

Clubs
-
* Lists all 500+ student organizations and club sports on one page  
* Allows real-time search of keywords (matching on organization name)  
* Filter by organization type (including new catagory of athletics)
* Each club has its own pop-up with club information

SQL + Scraping
-
* Screen scraped organizations from [OSL Student Organizations list](http://osl.fas.harvard.edu/student-organizations)
* Screen scraped club sports from [Crimson Athletics page](http://www.gocrimson.com/)
* Scraping folder includes scraping scripts

Guides
-
User guide to choosing clubs with potential to become blog post series. 

Built With
==
* jQuery 1.11.1: http://jquery.com/
* jQuery Isotope: http://isotope.metafizzy.co/
* Underscore 1.5.1: http://underscorejs.org/
* Bootstrap 2.3.1: http://getbootstrap.com/2.3.2/
* Underscore.js 1.5.1: http://underscorejs.org/

Built By
===
* [sharonzhou](https://github.com/sharonzhou)
* [moue](https://github.com/moue)
* [georgelok](https://github.com/georgelok)
* [anway](https://github.com/anway)
* [tmoon](https://github.com/tmoon)
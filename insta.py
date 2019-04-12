import requests
import os
import sys
import ddb
def follow(ig):
	ig_t = ig+'.txt'
	r = requests.get("https://www.instagram.com/"+ig+"/")
	try:
		f = open(ig_t,'x', encoding="utf-8")
	except:
		os.remove(ig_t)
		f = open(ig_t,'x', encoding="utf-8")
	f.write(r.text)
	i = 0
	w = open(ig_t, 'r', encoding="utf-8")
	while i<4000:
		y = w.readline(i)
		i+=1
		if "Followers" in y:
			i+=4000
			fls=y[23:38]
			flss = fls.replace(',','')
			flssx = flss.replace(' 1','')
			print(flssx)
			
			

# que= input('Do u wanna keep The file ? y/n => ')
# if que !='y':
	f.close()
	w.close()
	os.remove(ig_t)

def ss(nn):
	follow(nn)
if sys.argv[1] == '1':
	ss(sys.argv[2])
elif sys.argv[1] =='2':
	while 1==1:
		ss(sys.argv[2])




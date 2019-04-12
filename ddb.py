import requests
def inx(f_n):
	r = requests.post("http://localhost/dbc/connect.php",data={'ig_n':f_n});

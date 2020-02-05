#!/usr/bin/env python

import os
import sys
import mysql.connector

def plot_graph(data_name,pid,month,year):
	conn = mysql.connector.connect(host="127.0.0.1",port=3306,user="root",passwd="",db="ims_project_check",buffered=True)
	cursor = conn.cursor()
	
	print ("SELECT %s,d.date FROM diet d,user u,food f where u.id=%s and month(d.date)=%d and year(d.date) = %d and d.food_id = f.id and d.Pid=u.id",("f."+str(data_name),pid,month,year))
	last_id = cursor.execute("""SELECT f."""+data_name+""",d.date,u.name FROM diet d,user u,food f where u.id="""+str(pid)+""" and month(d.date)="""+str(month)+""" and year(d.date) = """+str(year)+""" and d.food_id = f.id and d.Pid=u.id""")
	
	#check = cursor.execute("""SELECT f.sugars,d.date FROM diet d,user u,food f where u.id="1" and month(d.date)=2 and year(d.date) = 2020 and d.food_id = f.id and d.Pid=u.id""")
	name_records = cursor.fetchall()
	for entry in name_records:
		print (entry)
	
plot_graph("sugars",1,2,2020)

#"SELECT %s,d.date FROM diet d,user u,food f where u.id=%s and month(d.date)=%s and year(d.date) = %s and d.food_id = f.id and d.Pid=u.id""",("f."+str(data_name),str(pid),str(month),str(year))

#SELECT f.sugars,d.date FROM diet d,user u,food f where u.id="1" and month(d.date)=2 and year(d.date) = 2020 and d.food_id = f.id and d.Pid=u.id

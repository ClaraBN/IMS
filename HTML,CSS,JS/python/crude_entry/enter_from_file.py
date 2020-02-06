#!/usr/bin/env python

#import MySQLdb
import mysql.connector
conn = mysql.connector.connect(host="back.db1.course.it.uu.se",port=3306,user="spring20_ims_1",passwd="5LUrVPtV",db="spring20_ims_1",buffered=True)
#conn.autocommit(True)
cursor = conn.cursor()

def writing(Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol):

    last_id = cursor.execute("""SELECT id FROM food""")
    records = cursor.fetchall()
    
    try:
        entry_number = 0
        for entry in records:
            if entry[0] > entry_number:
                entry_number = entry[0]
        next_number = entry_number + 1
    except:
        next_number = 1
    #print ("INSERT INTO food (id, name, fat, carbohydrate, sugars, fiber, protein, alcohol) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)",(str(next_number),Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol))
    present_names = cursor.execute("""SELECT name FROM food""")
    name_records = cursor.fetchall()
    for entry in name_records:
        if Name in entry:
            print ("Name present")
            return (None)
    #print (str(next_number),Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol)
    
    cursor.execute("""SELECT * FROM food""")
    cursor.execute("""INSERT INTO food (id, name, fat, carbohydrate, sugars, fiber, protein, alcohol) 
        VALUES (%s,%s,%s,%s,%s,%s,%s,%s)""",(str(next_number),Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol))
    
    
def open_file():
    file_open = open("real.out","r").readlines()
    for lines in file_open:
        entry = lines.split("%")
        writing(entry[0],entry[1],entry[2],entry[3],entry[4],entry[5],entry[6])
        
open_file()
cursor.close()
conn.commit()
conn.close()
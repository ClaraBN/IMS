#!/usr/bin/env python

#import MySQLdb
import mysql.connector


def writing(data):
    conn = mysql.connector.connect(host="127.0.0.1",port=3306,user="root",passwd="",db="ims_project_check",buffered=True)
    #conn.autocommit(True)
    cursor = conn.cursor()
    
    input_line = ""
    Name = data["Name"]
    try:
        Fat = data["Total Fat"]
    except:
        Fat = "0"
        
    try:
        Carbohydrate = data["Total Carbohydrate"]
    except:
        Carbohydrate = "0"
        
    try:
        Dietary_Fiber = data["Dietary Fiber"]
    except:
        Dietary_Fiber = "0"
        
    try:
        Sugars = data["Sugars"]
    except:
        Sugars = "0"

    try:
        Protein = data["Protein"]
    except:
        Protein = "0"
    
    try:
        Alcohol = data["Alcohol"]
    except:
        Alcohol = "0"
    

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
    
    present_names = cursor.execute("""SELECT name FROM food""")
    name_records = cursor.fetchall()
    for entry in name_records:
        if Name in entry:
            print ("Name present")
            return (None)
    print (str(next_number),Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol)
    cursor.execute("""SELECT * FROM food""")
    cursor.execute("""INSERT INTO food (id, name, fat, carbohydrate, sugars, fiber, protein, alcohol) 
        VALUES (%s,%s,%s,%s,%s,%s,%s,%s)""",(str(next_number),Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol))
    #print ((str(next_number),Name,Fat,Carbohydrate,Sugars,Dietary_Fiber,Protein,Alcohol))
    cursor.close()
    conn.commit()
    conn.close()



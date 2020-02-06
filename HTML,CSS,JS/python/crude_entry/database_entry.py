#!/usr/bin/env python

#import MySQLdb
import mysql.connector


def writing(data):
    output_file = open("real.out","a")
    #conn = mysql.connector.connect(host="back.db1.course.it.uu.se",port=3306,user="spring20_ims_1",passwd="5LUrVPtV",db="spring20_ims_1",buffered=True)
    #conn.autocommit(True)
    #cursor = conn.cursor()
    #print (data)
    input_line = ""
    Name = data["Name"]
    try:
        Fat = '"' + str(data["Total Fat"]) + '"'
    except:
        Fat = '"' + str(0) + '"'
        
    try:
        Carbohydrate = '"' + str(data["Total Carbohydrate"]) + '"'
    except:
        Carbohydrate = '"' + str(0) + '"'
        
    try:
        Dietary_Fiber = '"' + str(data["Dietary Fiber"]) + '"'
    except:
        Dietary_Fiber = '"' + str(0) + '"'
        
    try:
        Sugars = '"' + str(data["Sugars"]) + '"'
    except:
        Sugars = '"' + str(0) + '"'

    try:
        Protein = '"' + str(data["Protein"]) + '"'
    except:
        Protein = '"' + str(0) + '"'
    
    try:
        Alcohol = '"' + str(data["Alcohol"]) + '"'
    except:
        Alcohol = '"' + str(0) + '"'
    
    print (Name+"%"+Fat+"%"+Carbohydrate+"%"+Dietary_Fiber+"%"+Sugars+"%"+Protein+"%"+Alcohol)
    output_file.write(Name+"%"+Fat+"%"+Carbohydrate+"%"+Dietary_Fiber+"%"+Sugars+"%"+Protein+"%"+Alcohol+"\n")
    output_file.close()
    '''
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
    conn.close()'''



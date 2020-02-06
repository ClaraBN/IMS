import random
import mysql.connector

conn = mysql.connector.connect(host="back.db1.course.it.uu.se",port=3306,user="spring20_ims_1",passwd="5LUrVPtV",db="spring20_ims_1",buffered=True)
cursor = conn.cursor()

times = ["09:00:00","13:00:00","19:00:00","23:00:00"]

n = 1
for patient in range(1,51):
    print(n)
    for day in range(1,30):
        date =  "2020:02:" + str(day)
        food_per_day_times = random.randint(1, 4)
        for number_of_times in range(food_per_day_times):
            time = times[number_of_times]
            food_id = random.randint(1, 236)
            quantity = random.randint(1,5)
            
            #print ("INSERT INTO food_intake (date,time,patient_id,food_id) VALUES (%s,%s,%s,%s)",(date,time,patient,food_id))
            cursor.execute("""INSERT INTO food_intake (date,time,patient_id,food_id,quantity) VALUES (%s,%s,%s,%s,%s)""",(date,time,patient,food_id,quantity))
    n += 1

#cursor.execute("""INSERT INTO food_intake (date,time,patient_id,food_id) VALUES (%s,%s,%s,%s)""",('2020:02:25', '09:00:00', '1', '132'))
cursor.close()
conn.commit()
conn.close()
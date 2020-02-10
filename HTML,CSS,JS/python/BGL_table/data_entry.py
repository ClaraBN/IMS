import random
import mysql.connector

conn = mysql.connector.connect(host="back.db1.course.it.uu.se",port=3306,user="spring20_ims_1",passwd="5LUrVPtV",db="spring20_ims_1",buffered=True)
cursor = conn.cursor()

times = ["09:01:01","13:20:30","19:12:04","23:05:06"]

n = 1
for patient in range(1,51):
    print(n)
    for day in range(1,30):
        date =  "2020:02:" + str(day)
        readings_per_day_times = random.randint(2, 4)
        print (readings_per_day_times)
        for number_of_times in range(readings_per_day_times):
            time = times[number_of_times]
            bgl = random.randint(80, 400)
            print (time)
            print ('INSERT INTO readings (time,date,bgl,patient_id) VALUES (%s,%s,%s,%s)',(time,date,bgl,patient))
            #print ("INSERT INTO food_intake (date,time,patient_id,food_id) VALUES (%s,%s,%s,%s)",(date,time,patient,food_id))
            cursor.execute("""INSERT INTO readings (time,date,bgl,patient_id) VALUES (%s,%s,%s,%s)""",(time,date,bgl,patient))
            
    n += 1

#cursor.execute("""INSERT INTO food_intake (date,time,patient_id,food_id) VALUES (%s,%s,%s,%s)""",('2020:02:25', '09:00:00', '1', '132'))
cursor.close()
conn.commit()
conn.close()
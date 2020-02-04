import os
import sys
from requests import get
from bs4 import BeautifulSoup

#Custom script
import database_entry as de

search_url = "https://www.calorieking.com/us/en/foods/search?keywords="
website_url = "https://www.calorieking.com"
needed_list = ["Total Fat","Total Carbohydrate","Dietary Fiber","Sugars","Protein","Alcohol"]

item_fetched = []

try:
    output_file = open("outfile.txt","r")
    output_file.close()
    os.system("mv outfile.txt outfile_backup.txt")
except:
    None

output_file = open("outfile.txt","w")

output_header = '"Name"%'
for entry in needed_list:
    output_header += '"' + entry + '"%'
output_file.write(output_header[:-1] + "\n")

def receive_input():
    all_arguments  = ""
    
    n = 1
    while n < len(sys.argv):
        if n + 1 == len(sys.argv):
            all_arguments +=  str(sys.argv[n])
        else:
            all_arguments +=  str(sys.argv[n]) + "+"
        n += 1
    
    filename = all_arguments
    
    if "." in filename and len(sys.argv) == 2:
        file_open = open(filename,"r").read().split()
        for names in file_open:
            open_url(names)
    else:
        item_name = filename
        open_url(item_name)

def convet_to_float(value):
    float_value = ""
    for letters in value:
        if letters.isdigit():
            float_value += letters
        elif letters == ".":
            float_value += letters
        else:
            None
    return (float_value)
    
def get_item_information(link,item):
    webpage = get(website_url  + link)
    #print (webpage,website_url  + link)
    soup = BeautifulSoup(webpage.text[:], 'html.parser')
    tables = soup.body.find_all('table', attrs={'class': 'MuiTable-root'})
    #print (len(tables))
    for count,entry in enumerate(tables,1):
        #print (entry)
        if count == 2:
            table = entry
    #print (table,1433241)
    table_tbody_content = table.find("tbody", attrs={'class': 'MuiTableBody-root'})
    table_content = table_tbody_content.find_all("tr")
    #print (table_content)
    properties = {}
    properties["Name"] = item
    #print (item)
    for contents in table_content:
        #print (item)
        try:
            #print (contents,contents.find("a",href=True))
            item_name = contents.find("a",href=True).text
            #print (item_name)
            if item_name in needed_list:
                content_value = contents.find("td").text
                #print (item_name,content_value)
                properties[item_name] = convet_to_float(content_value)
        except:
            None
    
    return (properties)
    
def open_url(item):
    webpage = get(search_url  + item)
    #print (webpage,search_url  + item)
    soup = BeautifulSoup(webpage.text[:], 'html.parser')
    try:
        code_block = soup.body.find('div', attrs={'class': 'MuiList-root MuiList-dense MuiList-padding'})
        
        item_link = []
        for link in code_block.find_all('a', href=True):
            #print (link['href'])
            item_link.append(link['href'])
        
        item_list = {}
        n = 0
        for names in code_block.findAll('span',text=True):
            item_name = names.text
            #print (names.text)
            if item_name != "Show More":
                item_list[item_name] = item_link[n]
                n += 1
        
        for item in item_list:
            #print (item_list[item],item,1)
            out_dict = get_item_information(item_list[item],item)
            #print (out_dict,2)
            item_fetched.append(out_dict)
            
            length = 1
            for entry in out_dict:
                if length == len(out_dict):
                    output_file.write('"' + out_dict[entry] + '"\n')
                else:
                    output_file.write('"' + out_dict[entry] + '"%')
                length += 1
    except:
        None
        
receive_input()
#print (item_fetched)
def enter_into_database(item_fetched):
    for data in item_fetched:
        de.writing(data)
        
enter_into_database(item_fetched)

import os
import sys
from requests import get
from bs4 import BeautifulSoup



search_url = "https://www.calorieking.com/us/en/foods/search?keywords="
website_url = "https://www.calorieking.com"
needed_list = ["Total Fat","Total Carbohydrate","Dietary Fiber","Sugars","Protein","Alcohol","Iron"]

item_fetched = []

try:
    output_file = open("outfile.txt","r")
    output_file.close()
    os.system("mv outfile.csv outfile_backup.txt")
    #output_file.close()
    #output_file = open("outfile.csv","a")
except:
	None

output_file = open("outfile.txt","w")

output_header = '"Name"%'
for entry in needed_list:
    output_header += '"' + entry + '"%'
output_file.write(output_header[:-1] + "\n")

def receive_input():
    filename = sys.argv[1]
    
    print (filename)
    if "." in filename:
        file_open = open(filename,"r").read().split()
        for names in file_open:
            open_url(names)
    else:
        print (1)
        item_name = filename
        open_url(item_name)
        
def get_item_information(link,item):
    webpage = get(website_url  + link)
    soup = BeautifulSoup(webpage.text[:], 'html.parser')
    table = soup.body.find('table', attrs={'class': 'MuiTable-root jss465'})
    table_content = table.find_all("tr")
    
    properties = {}
    properties["Name"] = item
    for contents in table_content:
        #print (contents,"\n\n\n\n\n")
        #if contents in needed_list:
        try:
            item_name = contents.find("a",href=True).text
            if item_name in needed_list:
                content_value = contents.find("td",attrs={'class':"MuiTableCell-root jss471 MuiTableCell-body MuiTableCell-alignRight MuiTableCell-sizeSmall"}).text
                properties[item_name] = content_value
        except:
            None
    
    return (properties)
    
def open_url(item):
    webpage = get(search_url  + item)
    soup = BeautifulSoup(webpage.text[:], 'html.parser')
    try:
        code_block = soup.body.find('div', attrs={'class': 'MuiList-root MuiList-dense MuiList-padding'})
        
        item_link = []
        for link in code_block.find_all('a', href=True):
            item_link.append(link['href'])
        
        item_list = {}
        n = 0
        for names in code_block.findAll('span',text=True):
            item_name = names.text
            if item_name != "Show More":
                item_list[item_name] = item_link[n]
                n += 1
        
        for item in item_list:
            out_dict = get_item_information(item_list[item],item)
            item_fetched.append(out_dict)
            
            length = 1
            for entry in out_dict:
                if length == len(out_dict):
                    output_file.write('"' + out_dict[entry] + '"\n')
                else:
                    output_file.write('"' + out_dict[entry] + '"%')
                length += 1
                    
        #print (len(item_fetched))
    except:
        None
        
receive_input()
print (item_fetched)

# importing libraries
from bs4 import BeautifulSoup
import requests
  
def main(URL):
    # openning our output file in append mode
    File = open("out.csv", "a")
  
    #Specify header user agent to retrieve, render and facilitate end-user interaction with Web content.
    #Script acting as browser to gain information
    header = ({'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64 AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36', 'Accept-Language': 'en-US, en;q=0.5'})
  
    # Making the HTTP Request
    webpage = requests.get(URL, headers=header)
  
    # Creating the Soup Object containing all data
    soup = BeautifulSoup(webpage.content, "lxml")
  
    # Extract data from website start

    #Look for <span id="productTitle">
    try:
        title = soup.find("span", 
                          attrs={"id": 'productTitle'})
        
        title_value = title.string
  

        title_string = title_value.strip().replace(',', '')
  
    except AttributeError:
        title_string = "NA"
    print("product Title = ", title_string)
  
    # Write file 
    File.write(f"{title_string},")
    File.write(f",,,,,,,,,,")
  
    # retreiving price
    try:
        price = soup.find(
            "span", attrs={'id': 'priceblock_ourprice'}).string.strip().replace(',', '')
    except AttributeError:
        price = "NA"
    print("Products price = ", price)
  
    # Write file
    File.write(f"{price},")
  
    # closing the file
    File.close()
  
  
if __name__ == '__main__':
  # openning our url file to access URLs
    file = open("url.txt", "r")

    for links in file.readlines():
        main(links)

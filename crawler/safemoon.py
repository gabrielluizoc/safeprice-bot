from bs4 import BeautifulSoup
import requests

base_url = 'https://coinmarketcap.com/en/currencies/safemoon/social/'
page = requests.get(base_url)
soup = BeautifulSoup(page.content, 'html.parser')

price = soup.select('div.priceValue___11gHJ')[0]
percent = soup.select('span.sc-15yy2pl-0.feeyND')[0]
arrow = soup.select('span.icon-Caret-down')[0]
low = soup.select('span.highLowValue___GfyK7')[0]
high = soup.select('span.highLowValue___GfyK7')[1]
market_cap = soup.select('div.statsValue___2iaoZ')[0]
fully_diluted_market_cap = soup.select('div.statsValue___2iaoZ')[1]
volume_24h = soup.select('div.statsValue___2iaoZ')[2]
circulating_supply = soup.select('div.statsValue___2iaoZ')[3]

print(
    '\n',
    'Price: ' + str(price.get_text()) + '\n',
    'Low: ' + str(low.get_text()) + '\n',
    'High: ' + str(high.get_text()) + '\n',
    'Market Cap: ' + str(market_cap.get_text()) + '\n',
    'Fully Diluted Market Cap: ' + str(fully_diluted_market_cap.get_text()) + '\n',
    'Volume 24h: ' + str(volume_24h.get_text()) + '\n',
    'Circulating Supply: ' + str(circulating_supply.get_text()) + '\n'
)

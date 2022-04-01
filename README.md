# PriceChecker
## About
PriceCheck allows you to semi-automatic track prices in your competitive online stores. It is an application written in OOP PHP but use also jQuery with AJAX, dataTables, Select2, PHP Simple HTML DOM Parser, Bulma and Vanilla JS.
- AJAX for live execute PHP script
- dataTables for managment large tables
- Select2 for fun and simple validation
- Bulma for Front end
- PHP Simple HTML DOM Parser for easy extract prices
- Vanilla JS for simple helpers 
## How it works?
Simple enough. Add product, Add rival, Add URL to track. It's all. Simple, right?
## Technicaly?
Also simple :) Basically scrapping website and save data. We have SQLite database which one store info about product, rival and tracking URL. With cURL geting rival site content and extracting price with Simple HTML DOM Parser and save it in db. Default trying get price from micro data. Anyone ecom website should use micro data for example for SEO. All with PHP OOP in mind.
## But my rival don't use micro data
Think it's no problem. You can add yours recipies to PriceChecker. Go to models > ExtractingPrice.php and extends extractingPrice class
```
class WooCommerce extends extractingPrice {

  public function extractPrice($html){

    $item = $html->find(".woocommerce-Price-amount bdi", 0)->plaintext;

    if(isset($item)) {
      //echo $item;
      return parent::beautifyPrice($item);
    }
    else {
      return null;
    }

  }

}
```
Just replace selector to proper for current rivals:
```
$item = $html->find("em[class='main-price']", 0)->plaintext;
```
You can read more about finding selector content it this place [PHP Simple HTML DOM Parser](https://simplehtmldom.sourceforge.io/).
## Question to you!
What do you think. is it enough to become Junior PHP or Junior Full Stack?

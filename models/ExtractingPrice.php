<?php

abstract class ExtractingPrice {

  abstract public function extractPrice($html);
  //abstract public function returnPrice($item);

  public function beautifyPrice($extractedPrice) {

      $itemWithReplacedComma = str_replace(',', '.', $extractedPrice); // should be dot, not coma for decimal presentation but no trust rivals
      $beautyPrice = preg_replace('/[^0-9,.]+/', '', $itemWithReplacedComma); // remove all without numbers

      return $beautyPrice;

  }

}

class MicroData extends extractingPrice {

  public function extractPrice($html){

    $item = $html->find("span[itemprop='price']", 0)->plaintext;

    if(!isset($item)) {
      $item = $html->find("meta[property='product:price:amount']", 0)->content;
    }

    if(isset($item)) {
      //echo $item;
      return parent::beautifyPrice($item);
    }
    else {
      return null;
    }

  }

}

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

class Shoper extends extractingPrice {

	public function extractPrice($html){

    $item = $html->find("em[class='main-price']", 0)->plaintext;

    if(isset($item)) {
      //echo $item;
      return parent::beautifyPrice($item);
    }
    else {
      return null;
    }

  }


}
/*
class Klubben extends extractingPrice {

  public function extractPrice($html){

    $item = $html->find("p[id='poduct_price']", 0)->plaintext;

    if(isset($item)) {
      //echo $item;
      return parent::beautifyPrice($item);
    }
    else {
      return null;
    }

  }

}
*/
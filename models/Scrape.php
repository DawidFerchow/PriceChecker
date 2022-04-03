<?php

class Scrape {

  //private $urls = null;
  //private $site = null;
  //private $proxy = null;

/*
	public function __construct()
	{
		$this->urls = $urls;
		$this->site = $site;
		$this->proxy = $proxy;
	}
*/
  public function prepareURLs($urls) {

    foreach($urls as $key => $value) {
      foreach ($value as $key2 => $value2) {
        foreach ($value2 as $key3 => $value3 ) {
          $values[] = $value3;
        }
      }
    }

    $i = 0;

    do {
     $ended[$values[$i]] = $values [$i + 1];
     $i = $i + 2;
    } while ($i < count($values));

    echo json_encode($ended);
  }

  public function getWebsite($site, $proxy = null, $proxyCredentials = null) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $site);
    //proxy can be but not must
    if ($proxy != null) {
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
    }
    //also credential but if credential are definiet
    //proxy also must
    if ($proxyCredentials != null && $proxy != null) {
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyCredentials);
    }
    // 301 is popular in eCommerce so want follow redirect
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $html = curl_exec($ch);
    curl_close($ch);

    return $html;

  }

}
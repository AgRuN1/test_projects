<?php
require_once('geo.php');
 
$geoplugin = new geoPlugin();
//locate the IP
$geoplugin->locate();
// думаю нижеследующий блок не нуждается в пояснениях, из его кода видно какие значения возвращает нам скрипт
echo "Geolocation results for {$geoplugin->ip}: <br />\n".
    "City: {$geoplugin->city} <br />\n".
    "Region: {$geoplugin->region} <br />\n".
    "Area Code: {$geoplugin->areaCode} <br />\n".
    "DMA Code: {$geoplugin->dmaCode} <br />\n".
    "Country Name: {$geoplugin->countryName} <br />\n".
    "Country Code: {$geoplugin->countryCode} <br />\n".
    "Longitude: {$geoplugin->longitude} <br />\n".
    "Latitude: {$geoplugin->latitude} <br />\n".
    "Currency Code: {$geoplugin->currencyCode} <br />\n".
    "Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
    "Exchange Rate: {$geoplugin->currencyConverter} <br />\n";
	?>
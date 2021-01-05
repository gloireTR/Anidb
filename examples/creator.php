<?php

/**
 * This example shows get creator (or seiyuu) data from anidb using anidb parser
 */

require_once "vendor/autoload.php";

//Init Curl
$ch = curl_init();

//Create a new AniDB Parser instance
$anidb = new AniDB\Creators\Creators;

//Set Creator Id
$anidb->setCreatorId(1);

//Set Curl
curl_setopt_array($ch, [
    CURLOPT_URL => $anidb->url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_REFERER => $anidb::REFERER,
    CURLOPT_USERAGENT => $anidb::USER_AGENT
]);

//Getting HTML
$source = curl_exec($ch);

curl_close($ch);


//İmport HTML
$anidb->setHTML($source);

//Control Character. İf exist return character name
$creator['title'] = $anidb->controlAndGetTitle();

//Get Creator Image
$creator['image'] = $anidb->getImage();

//Get Creator Info
$creator['info'] = $anidb->getInfo();

//Get Creator Animes
$creator['animes'] = $anidb->getAnimes();

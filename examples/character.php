<?php

/**
 * This example shows get character data from anidb using anidb parser
 */

require_once "vendor/autoload.php";

//Init Curl
$ch = curl_init();

//Create a new AniDB Parser instance
$anidb = new AniDB\Characters\Characters;

//Set Character Id
$anidb->setCharacterId(1);

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
$char['title'] = $anidb->controlAndGetTitle();

//Get Image
$char['image'] = $anidb->getImage();

//Get Character Info
$char['info'] = $anidb->getInfo();

//Get Character Creator (or seiyuu)
$char['creator'] = $anidb->getCreator();

//Get Character's Related Animes
$char['related'] = $anidb->getRelatedAnimes();


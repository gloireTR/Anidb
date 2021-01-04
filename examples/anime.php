<?php

/**
 * This example shows get anime data from anidb using anidb parser
 */

require_once "vendor/autoload.php";

//İnit Curl
$ch = curl_init();

//Create a new AniDB Parser instance
$anidb = new \AniDB\Anime\Anime;

//Set Cloudinary CDN
$anidb->setCloudinary('cloud_name','key','secret');

//Set Anime ID
$anidb->setAnimeID(1);

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


//Control Anime. İf exist return anime name
$anime['title'] = $anidb->controlAndGetTitle();

//Get Anime Image
$anime['image'] = $anidb->getImage();


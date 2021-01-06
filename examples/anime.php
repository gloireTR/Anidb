<?php

/**
 * This example shows get anime data from anidb using anidb parser
 */

require_once "vendor/autoload.php";

//Init Curl
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

//Get Episode Count
$anime['episode'] = $anidb->getEpisode();

//Get Tags
$anime['tags'] = $anidb->getTags();

//Get Start Date
$anime['start_date'] = $anidb->getStartDate();

//Get End Date
$anime['end_date'] = $anidb->getEndDate();

//Get Anime Rating
$anime['rating'] = $anidb->getRating();

//Get Anime Description
$anime['desc'] = $anidb->getDescription();

//Get Favourites Count
$anime['favourites'] = $anidb->getFavourites();

//Get Anime Rank
$anime['rank'] = $anidb->getRank();

//Get Completed Count
$anime['completed'] = $anidb->getCompleted();

//Get Watching Count
$anime['watching'] = $anidb->getWatching();

//Get Plan Count
$anime['plan'] = $anidb->getPlan();

//Get Drop Count
$anime['drop'] = $anidb->getDrop();

//Get Directly Related Animes
$anime['directly'] = $anidb->getDirectlyRelatedAnimes();

//Get Similar Animes
$anime['similar'] = $anidb->getSimilarAnimes();

//Get Cast
$anime['cast'] = $anidb->getCast();

//Get Staff
$anime['staff'] = $anidb->getStaff();

//Get Characters
$anime['characters'] = $anidb->getCharacters();

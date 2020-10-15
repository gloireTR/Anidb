<?php
/**
 * Class Anidb Creators Options
 * @brief Variables
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.0
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace AniDB\Creators;
require __DIR__ . '/patterns.php';

class Options extends Patterns{
    /**
     * @brief Main Character URL
     */
    const CREATOR_URL = 'https://anidb.net/creator/';

    /**
     * @brief Referer URL for CURL | CURL için referans linki
     */
    const REFERER = 'https://anidb.net';

    /**
     * @brief USER_AGENT | Tarayıcı Bilgisi
     */
    const USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0';

    /** Variables Options */

    /**
     * @var Integer
     * @brief Creator ID
     * @brief  ID
     */
    protected $creator_id;

    /**
     * @var String
     * @brief Url
     */
    protected $url;

    /**
     * @var String
     * @brief HTML Collection
     */
    protected $html;

    /**
     * @var String
     * @brief Creator Title
     */
    protected $title;

    /**
     * @var String
     * @brief Creator Image
     * @brief Resim
     */
    protected $image;

    /**
     * @var String
     * @brief Creator Description
     * @brief Açıklama
     */
    protected $desc;

    /**
     * @var Array
     * @brief Creator info tab
     * @brief bilgi tablosu
     */
    protected $info;

    /**
     * @var Array
     * @brief Creator animes
     * @brief Çalışılan animeler
     */
    protected $animes;
}
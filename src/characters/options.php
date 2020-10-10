<?php
/**
 * Class AnidbAnime
 * @brief Variables
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.0
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace AniDB\Characters;
require __DIR__ . '/patterns.php';
class Options extends Patterns{
    /**
     * @brief Main Character URL
     */
    const CHAR_URL = 'https://anidb.net/character/';

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
     * @brief Character ID
     * @brief Karakter ID
     */
    protected $char_id;

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
     * @brief Character Title
     * @brief Karakter Adı 
     */
    protected $title;

    /**
     * @var String
     * @brief Character Image URL
     * @brief Karakterin Resim Linki
     */
    protected $image;

    /**
     * @var Array
     * @brief Character Info (Main name, Age, Gender etc.)
     * @brief Karakter Bilgileri
     */
    protected $info;

    /**
     * @var Array
     * @brief Character Creator (seiyuu etc.)
     * @brief Karakteri Seslendiren
     */
    protected $creator;

    /**
     * @var Array
     * @brief Character Related Animes
     * @brief Karakterin Bağlantılı Animeleri
     */
    protected $related_animes;
}

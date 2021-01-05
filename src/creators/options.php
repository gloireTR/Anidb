<?php
/**
 * Class Anidb Creators Options
 * @brief Options
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.3
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
     * @var $creator_id
     * @brief Creator ID
     * @brief  ID
     */
    protected $creator_id;

    /**
     * @var $url
     * @brief Url
     */
    public $url;

    /**
     * @var $html
     * @brief HTML Collection
     */
    protected $html;

    /**
     * @var $title
     * @brief Creator Title
     */
    protected $title;

    /**
     * @var $image
     * @brief Creator Image
     * @brief Resim
     */
    protected $image;

    /**
     * @var $desc
     * @brief Creator Description
     * @brief Açıklama
     */
    protected $desc;

    /**
     * @var $info
     * @brief Creator info tab
     * @brief bilgi tablosu
     */
    protected $info;

    /**
     * @var $animes
     * @brief Creator animes
     * @brief Çalışılan animeler
     */
    protected $animes;
}

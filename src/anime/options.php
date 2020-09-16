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
namespace AniDB\Anime;
require_once __DIR__ . '\patterns.php';
require_once "vendor/autoload.php";

\Cloudinary::config(array(
    "cloud_name" => "name",
    "api_key" => "key",
    "api_secret" => "secret",
    "secure" => true
));

class Options extends Patterns{
    //Options
    /**
     * @brief Main URL | Ana link
     */
    const MAIN_URL = 'https://anidb.net';

    /**
     * @brief Referer URL for CURL | CURL için referans linki
     */
    const REFERER = 'https://anidb.net/anime/?adb.search=tokyo&do.update=Search&noalias=1';

    /**
     * @brief USER_AGENT | Tarayıcı Bilgisi
     */
    const USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0';
    //Options end
    /**
     * @var string
     * @brief unset url
     * @brief düzenlenmemiş url
     */
    public string $url;
    /**
     * @var string
     * @brief Anime ID
     * @brief Anime ID
     */
    protected string $aid;

    /**
     * @var string
     * @brief HTML
     */
    protected string $html;
    /**
     * @var string
     * @brief Anime Title
     * @brief Anime Adı
     */
    public string $title;

    /**
     * @var string
     * @brief Anime Image
     * @brief Anime Kapak Resmi
     */
    public string $image;

    /**
     * @var mixed
     * @brief Episode Count
     * @brief Bölüm Sayısı
     */
    public $episode;

    /**
     * @var array
     * @brief Tags
     * @brief Türler
     */
    public array $tags;

    /**
     * @var string $startDate   Starting Date to Anime | Animenin başlama tarihi
     * @var string $endDate     Ending Date            | Animenin bitiş tarihi
     */
    public string $startDate, $endDate;

    /**
     * @var mixed
     * @brief Anime Rating | Anime puanı
     */
    public $rating;

    /**
     * @var string
     * @brief Anime Description | Anime açıklaması
     */
    public string $description;

    /**
     * @var mixed
     * @brief Favourite count | Favori sayısı
     */
    public $favourites;

    /**
     * @var mixed
     * @brief Anime Rank | Anime Sıralaması
     */
    public $rank;

    /**
     * @var mixed $completed Complete count | Tamamlayanların sayısı
     * @var mixed $watching  Watching count | Şu an izleyenlerin sayısı
     * @var mixed $plan      Planning count | İzlemeyi düşünenlerin sayısı
     * @var mixed $drop      Dropped  count | İzlemeyi bırakanların sayısı
     */
    public $completed, $watching, $plan, $drop;

    /**
     * @var array
     * @brief Directly Related Animes | Bağlantılı Animeler
     */
    public array $directylyRelatedAnime;

    /**
     * @var array
     * @brief Similar Animes | Benzer Animeler
     */
    public array $similarAnimes;

    /**
     * @var array
     * @brief Cast | Seslendirenler
     */
    public array $cast;

    /**
     * @var array
     * @brief Staff | Yapım Ekibi
     */
    public array $staff;

    /**
     * @var array
     * @brief Anime Characters | Anime Karakterleri
     */
    public array $characters;
}

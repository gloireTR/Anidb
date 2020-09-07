<?php
/**
 * Class AnidbAnime
 * @brief Patterns
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.0
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Anidb\Anime\Patterns;

class Patterns{
    /**
     * @brief Pattern for Anime Title | Anime Adı için Desen
     */
     const PATTERN_TITLE = '@<h1 class="anime">(.*?)</h1>@si';

    /**
     * @brief Pattern for Anime Image | Anime Resmi için Desen
     */
    const PATTERN_IMAGE = '@<img alt="(.*?)" src="(.*?)"@si';

    /**
     * @brief Pattern for Episode Count | Bölüm Sayısı için Desen
     */
    const PATTERN_EPISODE = '@<span itemprop="numberOfEpisodes">(.*?)</span>@si';

    /**
     * @brief Pattern for Anime Tags | Anime Türleri için Desen
     */
    const PATTERN_TAGS = '@<th class="field"><a href="/tag">Tags</a></th>(.*?)<span itemprop="genre" class="tagname">(.*?)</span>(.*?)</tr>@si';

    /**
     * @brief Pattern for Anime Starting Date | Animenin Başlama Tarihi için Desen
     */
    const PATTERN_START_DATE = '@<span itemprop="startDate" content="(.*?)">(.*?)</span>@si';

    /**
     * @brief Pattern for Anime Ending Date | Animenin Bitiş Tarihi için Desen
     */
    const PATTERN_END_DATE = '@<span itemprop="endDate" content="(.*?)">(.*?)</span>@si';

    /**
     * @brief Pattern for Anime Rating | Anime Puanı
     */
    const PATTERN_RATING = '@<span class="value" itemprop="ratingValue">(.*?)</span>@si';

    /**
     * @brief Pattern for Anime Description | Anime Açıklaması için Desen
     */
    const PATTERN_DESCRIPTION = '@<div class="g_bubble g_section desc resized" itemprop="description">(.*?)</div>@si';

    /**
     * @brief Pattern for Anime Rank | Anime Sıralaması için Desen
     */
    const PATTERN_RANK = '@<a href="/anime/\?orderby.rank\_popularity=0.1">(.*?)</a>@si';

    /**
     * @brief Pattern for Anime Favourites Count | Animenin Favorilere Eklenme Sayısı için Desen
     */
    const PATTERN_FAVOURITES = '@<a href="/anime/\?orderby.rank\_favourites=0.1">(.*?)</a>@si';

    /**
     * @brief Pattern for Anime Completed Count | Animenin Tamamlanma Sayısı için Desen
     */
    const PATTERN_COMPLETED = '@title="All user with mylist state completed."(.*?)<div class="val">(.*?)</div>@si';

    /**
     * @brief Pattern for Anime Watching Count | Şu an Animeyi İzleyenlerin Sayısı için Desen
     */
    const PATTERN_WATCHING = '@title="All user with mylist state watching and stalled."(.*?)<div class="val">(.*?)</div>@si';

    /**
     * @brief Pattern for Anime Planning Count | Animeyi İzlemeyi Planlayanların Sayısı için Desen
     */
    const PATTERN_PLAN = '@title="All user with wishlist state to get and to watch and mylist state collecting."(.*?)<div class="val">(.*?)</div>@si';

    /**
     * @brief Pattern for Dropping Anime | Animeyi İzlemeyi Bırakanların Sayısı için Desen
     */
    const PATTERN_DROP = '@title="All user with mylist state dropped and wishlist state blacklisted."(.*?)<div class="val">(.*?)</div>@si';

    /**
     * @brief Pattern for Second Tag Operation | Tür Alma Sırasında Gereken İkinci Desen
     */
    const PATTERN_SECOND_TAG = '@<span itemprop="genre" class="tagname">(.*?)</span>@si';

    /**
     * @brief Pattern for Directly Related Animes | Bağlantılı Animeler için Desen
     */
    const PATTERN_DIRECTLY_RELATED = '@<div class="g_section relations direct" id="relations_direct">(.*?)(<a class="name-colored" href="(.*?)">(.*?)</a>)+(.*?)<div class="g_section similaranime resized" id="similaranime">@si';

    /**
     * @brief Pattern for When First Query is Empty | İlk Desenin Sonucu Boş Dönerse Kullanılacak İkinci Desen
     */
    const PATTERN_CONTROL_DIRECTLY_RELATED = '@<div class="g_section relations direct" id="relations_direct">(.*?)(<a class="name-colored" href="(.*?)">(.*?)</a>)+(.*?)<div id="tab_main_1_2_pane" class="pane hide indirectly_related">@si';

    /**
     * @brief Second Pattern for When First is Work | İlk Desen Çalıştığında Kullanılacak İkinci Desen
     */
    const PATTERN_SECOND_DIRECTLY_RELATED = '@<a class="name-colored" href="(.*?)">(.*?)</a>@si';

    /**
     * @brief Pattern for Similar Animes | Benzer Animeler için Desen
     */
    const PATTERN_SIMILAR = '@<div class="g_section similaranime resized" id="similaranime">(.*?)<div class="name">(.*?)<a class="name-colored" href="(.*?)">(.*?)</a>(.*?)<div id="tabbed_pane_main_2" class="tabbed_pane resized g_section tabbed_pane_main">@si';

    /**
     * @brief Second Pattern for Similar Animes | Benzer Animeler için Kullanılacak İkinci Desen
     */
    const PATTERN_SECOND_SIMILAR = '@<div class="name">(.*?)<a class="name-colored" href="(.*?)">(.*?)</a>@si';

    /**
     * @brief Pattern for Cast | Seslendirme Ekibi için Desen
     */
    const PATTERN_CAST = '@<div class="g_section g_bubble cast">(.*?)<td class="name creator"><a href="/creator/(.*?)">(.*?)</a>(.*?)<td class="name char character"><a href="/character/(.*?)">(.*?)</a>(.*?)<div class="g_section g_bubble staff">@si';

    /**
     * @brief Second Pattern for Cast | Seslendirme Ekibi için Kullanılcak İkinci Desen
     */
    const PATTERN_SECOND_CAST = '@(.*?)<td class="name creator"><a href="/creator/(.*?)">(.*?)</a>(.*?)<td class="name char character"><a href="/character/(.*?)">(.*?)</a>(.*?)@si';

    /**
     * @brief Pattern for Staff | Yapım Ekibi için Desen
     */
    const PATTERN_STAFF = '@<td class="credit"><a href="/creator/\?credit=(.*?)">(.*?)</a>(.*?)<div class="g_bubble g_section desc resized"@si';

    /**
     * @brief Second Pattern for Staff | Yapım Ekibi için Kullanılacak İkinci Desen
     */
    const PATTERN_SECOND_STAFF = '@<td class="credit"><a href="/creator/\?credit=(.*?)">(.*?)</a>@si';

    /**
     * @brief Patternf for Directors Staff | Direktör Ekibi için Kullanılacak Desen
     */
    const PATTERN_STAFF_DIRECTORS = '@<td class="name creator">(.*?)<a itemprop="director" itemscope itemtype="http://schema.org/Person"  href="/creator/(.*?)"><span class="hide" itemprop="url" content="https://anidb.net/cr(.*?)"></span><span itemprop="name">(.*?)</span></a>(.*?)<div class="g_bubble g_section desc resized" itemprop="description">@si';

    /**
     * @brief Second Pattern for Directors Staff | Direktör Ekibi için Kullanılacak İkinci Desen
     */
    const PATTERN_SECOND_DIRECTORS = '@<a itemprop="director" itemscope itemtype="http://schema.org/Person"  href="/creator/(.*?)"><span class="hide" itemprop="url" content="https://anidb.net/cr(.*?)"></span><span itemprop="name">(.*?)</span></a>@si';

    /**
     * @brief Pattern for Main Staff | Ana Yapım Ekibi için Desen
     */
    const PATTERN_MAIN_STAFF = '@<td class="credit">(.*?)<td class="name creator"><a href="/creator/(.*?)">(.*?)</a>(.*?)<div class="g_bubble g_section desc resized"@si';

    /**
     * @brief Second Pattern for Main Staff | Ana Yapım Ekibi için İkinci Desen
     */
    const PATTERN_SECOND_MAIN_STAFF = '@<td class="name creator"><a href="/creator/(.*?)">(.*?)</a>@si';

    /**
     * @brief Pattern for Characters | Karakterler için Desen
     */
    const PATTERN_CHARACTERS = '@<div class="g_section main character">(.*?)<img alt="(.*?)" src="(.*?)" class="g_image g_bubble thumbcrop"/>(.*?)</strong>(.*?)</span>(.*?)href="/character/(.*?)"><span itemprop="name">(.*?)</span></a>(.*?)<span class="g_bubble text">(.*?)</span>(.*?)title="primary voiceover" href="/creator/(.*?)" itemprop="url"><span itemprop="name">(.*?)</span>(.*?)<div class="g_section groups resized">@si';

    /**
     * @brief Second Pattern for Characters | Karakterler için Kullanılacak İkinci Desen
     */
    const PATTERN_SECOND_CHARACTERS = '@<img alt="(.*?)" src="(.*?)" class="g_image g_bubble thumbcrop"/>(.*?)</strong>(.*?)</span>(.*?)href="/character/(.*?)"><span itemprop="name">(.*?)</span></a>(.*?)<span class="g_bubble text">(.*?)</span>(.*?)title="primary voiceover" href="/creator/(.*?)" itemprop="url"><span itemprop="name">(.*?)</span>@si';

    /**
     * @param string $pattern The Pattern
     * @param string $html    HTML Text
     * @return array|string[]
     */
    final public function patternMaker($pattern, $html){
        $arr = [];
        preg_match($pattern, $html, $arr);
        if (empty($arr)){
            return ['-', '-', '-', '-', '-', '-'];
        }else{
            return $arr;
        }
    }
}

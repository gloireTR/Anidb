<?php
/**
 * Class Anidb Creators Patterns
 * @brief Variables
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.0
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace AniDB\Creators;

class Patterns{
    /**
     * @brief Pattern title
     */
    const PATTERN_CREATOR_TITLE = '@<h1 class="creator">Person: (.*?)</h1>@si';

    /**
     * @brief Second pattern for title
     */
    const PATTERN_SECOND_CREATOR_TITLE = '@<h1 class="creator">(.*?)</h1>@si';

    /**
     * @brief Pattern for creator description
     */
    const PATTERN_CREATOR_DESC = '@<div class="g_bubble g_section desc resized" itemprop="description">(.*?)</div>@si';

    /**
     * @brief Pattern for creator info
     */
    const PATTERN_CREATOR_INFO = '@<div class="g_definitionlist">(.*?)</tbody>@si';

    /**
     * @brief Pattern for creator animes
     */
    const PATTERN_CREATOR_ANIMES = '@<table id="characterlist_';

    /**
     * @brief Second pattern for creator animes
     */
    const PATTERN_SECOND_CREATOR_ANIMES = '" class="characterlist">(.*?)</thead>(.*?)</table>@si';

    /**
     * @brief Third pattern for creator animes
     */
    const PATTERN_THIRD_CREATOR_ANIMES_ONE = '@<table id="stafflist_major_';

    /**
     * @brief Third-two pattern for creator animes
     */
    const PATTERN_THIRD_CREATOR_ANIMES_TWO = '" class="stafflist">(.*?)</thead>(.*?)</table>@si';

    /**
     * @brief  pattern for creator animes
     */
    const PATTERN_FOURTH_CREATOR_ANIMES = '@<table id="stafflist_minor_';
}

<?php
/**
 * Class AnidbAnime
 * @brief Patterns
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.3
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace AniDB\Characters;

class Patterns{
    /**
     * @brief Pattern for character title
     */
    const PATTERN_CHAR_TITLE = '@<h1 class="character">Character: (.*?)</h1>@si';

    /**
     * @brief Second pattern for character title
     */
    const PATTERN_SECOND_CHAR_TITLE = '@<h1 class="character">(.*?)</h1>@si';

    /**
     * @brief Pattern for info table
     */
    const PATTERN_CHAR_INFO = '@<div class="g_definitionlist">(.*?)</tbody>@si';

    /**
     * @brief Pattern for seiyuu
     */
    const PATTERN_CHAR_CREATOR = '@<div class="g_section seiyuu resized">(.*?)<tbody>(.*?)<div id="tabbed_pane_main_2"@si';

    /**
     * @brief Second pattern for seiyuu
     */
    const PATTERN_SECOND_CHAR_CREATOR = '@<img alt="(.*?)" src="(.*?)"(.*?)/>@si';

    /**
     * @brief Pattern for related animes
     */
    const PATTERN_CHAR_RELATED = '@<div id="tab_main_1_2_1_pane" class="pane anime_appearance">(.*?)</thead>(.*?)</table>@si';

    /**
     * @brief Second pattern for related
     */
    const PATTERN_SECOND_CHAR_RELATED = '@<div id="tab_main_1_1_pane" class="pane anime_appearance">(.*?)</thead>(.*?)</table>@si';
    
     /**
     * @brief Third pattern for related
     */
    const PATTERN_THIRD_CHAR_RELATED = '@<div id="tab_main_2_1_pane" class="pane anime_appearance">(.*?)</thead>(.*?)</table>@si';
}

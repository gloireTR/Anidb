<?php
/**
 * Class Anidb Creators
 * @brief Variables
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.0
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace AniDB\Creators;

use DOMDocument;
require_once __DIR__ . '/options.php';

class Creators extends Options{
    public function setCreatorId($id)
    {
        $this->creator_id = $id;
        $this->setUrl();
    }

    public function setUrl()
    {
        $this->url = parent::CREATOR_URL . $this->creator_id;
    }

    public function setHTML($data)
    {
        $this->html = $data;
    }
    public function controlAndGetTitle(){
        preg_match_all(parent::PATTERN_CREATOR_TITLE, $this->html, $title);
        if(isset($title[1][0]) || !empty($title[1][0])){
            $title = $title[1][0];
        }else{
            preg_match_all(parent::PATTERN_SECOND_CREATOR_TITLE, $this->html, $title);
            if (isset($title[1][0]) || !empty($title[1][0])){
                $title = $title[1][0];
            }else{
                $title = 'creator not found.';
            }
        }
        return $title;
    }

    public function getImage(){
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($this->html);
        libxml_clear_errors();
        return $dom->getElementsByTagName('img')->item(0)->getAttribute('src');
    }

    public function getDescription(){
        preg_match_all(self::PATTERN_CREATOR_DESC, $this->html, $desc);
        if (isset($desc[1][0])){
            return $desc[1][0];
        }else{
            return 'null';
        }
    }

    public function getInfo(){
        preg_match_all(parent::PATTERN_CREATOR_INFO, $this->html, $arr);
        if (!isset($arr[0][0]) || empty($arr[0][0])){
            return 'null';
        }else{
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($arr[0][0]);
            libxml_clear_errors();;
            $tr = $dom->getElementsByTagName('tr');
            $th = $dom->getElementsByTagName('th');
            $td = $dom->getElementsByTagName('td');
            $keys = [];
            $values = [];
            foreach ($tr as $t){
                $test = $t->childNodes;
                foreach ($test as $ts){
                    if ($ts->nodeName == 'th'){
                        array_push($keys, strtolower($ts->nodeValue));
                    }
                    if ($ts->nodeName == 'td') {
                        $child = $ts->childNodes;
                        foreach ($child as $span){
                            if ($span->nodeName == 'span' && $span->getAttribute('class') == 'g_tag'){
                                $newA = $span->childNodes->item(0);
                                $tagName = $newA->childNodes->item(0);
                                $wrapper = $newA->childNodes->item(1);
                                $text = $wrapper->childNodes->item(0);
                                array_push($values, $tagName->nodeValue . ', ' . $text->nodeValue);
                                break;
                            }else{
                                array_push($values, $ts->nodeValue);
                                break;
                            }
                        }
                    }
                }
            }
            return array_combine(array_values($keys), $values);
        }
    }

    public function getAnimes(){
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $control = '';
        preg_match_all(parent::PATTERN_CREATOR_ANIMES, $this->html, $arr);
        if(!isset($arr[2][0])){
            preg_match_all(parent::PATTERN_SECOND_CREATOR_ANIMES, $this->html);
            if (isset($arr[2][0])){
                $dom->loadHTML($arr[2][0]);
            }else{
                preg_match_all(parent::PATTERN_THIRD_CREATOR_ANIMES_ONE . $this->creator_id . parent::PATTERN_THIRD_CREATOR_ANIMES_TWO, $this->html, $arr);
                if (isset($arr[2][0])){
                    $dom->loadHTML($arr[2][0]);
                }else{
                    $control = 'null';
                }
            }
        }else{
            $dom->loadHTML($arr[2][0]);
        }
        $tr = $dom->getElementsByTagName('tr');
        $animes = [];
        $keys = [];
        foreach ($tr as $t){
            $arr_c;
            $before_anime = '';
            $before_id = '';
            if ($t->getAttribute('class') == 'rowspan'){
                continue;
            }
            foreach ($t->childNodes as $td){
                if ($td->nodeName == 'td'){
                    if ($td->getAttribute('class') == 'thumb' || $td->getAttribute('class') == 'thumb image'){
                        if ($td->childNodes->item(0)->nodeName == 'a'){
                            $arr_c['image'] = $td->childNodes->item(0)->childNodes->item(1)->childNodes->item(0)->getAttribute('src');
                        }else{
                            $arr_c['image'] = 'null';
                        }
                    }else if ($td->getAttribute('class') == 'comment'){
                        continue;
                    }else if ($td->getAttribute('class') == 'name anime'){
                        if ($before_anime == $td->nodeValue){
                            array_push($keys, $before_id);
                            $arr_c[$td->getAttribute('class')] = $td->nodeValue;
                            $before_anime = $td->nodeValue;
                        }else{
                            $id = explode('/', $td->childNodes->item(0)->getAttribute('href'));
                            $before_id = $id;
                            array_push($keys, end($id));
                            $arr_c[$td->getAttribute('class')] = $td->nodeValue;
                            $before_anime = $td->nodeValue;
                        }
                    }else{
                        if ($td->getAttribute('class') == 'block'){
                            continue;
                        }
                        $arr_c[$td->getAttribute('class')] = $td->nodeValue;
                    }
                }
            }
            array_push($animes, $arr_c);
        }
        if ($control != 'null'){
            return array_combine(array_values($keys), $animes);
        }else{
            return $control;
        }
    }
}

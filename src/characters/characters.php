<?php
/**
 * Class AnidbCharacters
 * @brief Variables
 * @author gloire
 * @author libero1i
 * @link https://anisekai.com
 * @version 1.0
 * @since September 2020
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace AniDB\Characters;

use DOMDocument;

require_once __DIR__ . '/options.php';

final class Characters extends Options
{
    public function setCharacterId($id)
    {
        $this->char_id = $id;
        $this->setUrl();
    }

    public function setUrl()
    {
        $this->url = parent::CHAR_URL . $this->char_id;
    }

    public function setHTML($data)
    {
        $this->html = $data;
    }

    public function controlAndGetTitle()
    {
        preg_match_all(parent::PATTERN_CHAR_TITLE, $this->html, $titleArr);
        if (isset($titleArr[1][0]) || !empty($titleArr[1][0])) {
            return $titleArr[1][0];
        } else {
            preg_match_all(parent::PATTERN_SECOND_CHAR_TITLE, $html, $titleArr);
            if (isset($titleArr[1][0]) || !empty($titleArr[1][0])) {
                return $titleArr[1][0];
            } else {
                return 'CHARACTER NOT FOUND';
            }
        }
    }

    public function getImage()
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($this->html);
        libxml_clear_errors();
        return $dom->getElementsByTagName('img')->item(0)->getAttribute('src');
    }

    public function getInfo()
    {
        preg_match_all(parent::PATTERN_CHAR_INFO, $this->html, $arr);
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($arr[0][0]);
        libxml_clear_errors();

        $tr = $dom->getElementsByTagName('tr');
        $keys = [];
        $values = [];
        foreach ($tr as $t) {
            $childTr = $t->childNodes;
            foreach ($childTr as $ts) {
                if ($ts->nodeName == 'th') {
                    array_push($keys, strtolower($ts->nodeValue));
                }
                if ($ts->nodeName == 'td') {
                    $child = $ts->childNodes;
                    foreach ($child as $span) {
                        if ($span->nodeName == 'span' && $span->getAttribute('class') == 'g_tag') {
                            //a tag
                            $newA = $span->childNodes->item(0);
                            $tagName = $newA->childNodes->item(0);
                            $wrapper = $newA->childNodes->item(1);
                            $text = $wrapper->childNodes->item(0);
                            array_push($values, $tagName->nodeValue . ', ' . $text->nodeValue);
                            break;
                        } else {
                            array_push($values, $ts->nodeValue);
                            break;
                        }
                    }
                }
            }
        }
        return array_combine(array_values($keys), $values);
    }

    public function getCreator()
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($this->html);
        libxml_clear_errors();

        preg_match_all(parent::PATTERN_CHAR_CREATOR, $this->html, $arr);
        if (isset($arr[2][0])) {
            $dom->loadHTML($arr[2][0]);
            preg_match_all(parent::PATTERN_SECOND_CHAR_CREATOR, $arr[2][0], $img);
            $creator_img = $img[2][0];
            $creator_name = '';
            $creator_id = '';
            $chars_z = [];
            $values = [];
            $tr = $dom->getElementsByTagName('tr');
            foreach ($tr as $t) {
                $td = $t->childNodes;
                $arr = [];
                $items = [];
                $keys = [];
                foreach ($td as $item) {
                    if ($item->nodeName == 'td') {
                        $anime_id = '';

                        if ($item->getAttribute('class') == 'thumb image') {

                        } elseif ($item->getAttribute('class') == 'name creator') {
                            $id = explode('/', $item->childNodes->item(0)->getAttribute('href'));
                            $creator_id = end($id);
                            $creator_name = $item->nodeValue;
                        } elseif ($item->getAttribute('class') == 'name anime ') {
                            $id = explode('/', $item->childNodes->item(0)->getAttribute('href'));
                            $anime_id = end($id);
                            array_push($keys, $anime_id);
                            $items['name'] = $item->nodeValue;
                        } else {
                            if ($item->getAttribute('class') == 'type ') {
                                $items['type'] = $item->nodeValue;
                            } else if ($item->getAttribute('class') == 'ismainseiyuu ') {
                                $items['ismainseiyuu'] = $item->nodeValue;
                            }
                        }

                    }
                }
                array_push($arr, $items);
                $arr = array_filter($arr);
                $char = array_combine(array_values($keys), array_values($arr));
                array_push($chars_z, $char);
            }
            return [
                'creator' => [
                    'name' => $creator_name,
                    'id' => $creator_id,
                    'img' => $creator_img,
                    'animes' => array_values($chars_z)
                ]
            ];
        } else {
            return null;
        }
    }
    public function getRelatedAnimes(){
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        preg_match_all(parent::PATTERN_CHAR_RELATED, $this->html, $arr);
        if (!isset($arr[2][0])){
            preg_match_all(parent::PATTERN_SECOND_CHAR_RELATED, $this->html, $arr);
            $dom->loadHTML($arr[2][0]);
            libxml_clear_errors();
        }else{
            $dom->loadHTML($arr[2][0]);
            libxml_clear_errors();
        }
        $tr = $dom->getElementsByTagName('tr');
        $relatedAnimes = [];
        $keys = [];
        foreach($tr as $t){
            $td = $t->childNodes;
            $arr = [];
            foreach($td as $x){
                if($x->nodeName == 'td'){
                    if($x->getAttribute('class') == 'thumb image'){
                        $id = explode('/', $x->childNodes->item(0)->getAttribute('href'));
                        array_push($keys, end($id));
                        $arr['image'] = $x->childNodes->item(0)->childNodes->item(1)->childNodes->item(1)->getAttribute('src');
                    }else if($x->getAttribute('class') == 'eprange' && empty($x->nodeValue)){
                        $arr[$x->getAttribute('class')] = ' ';
                    }else if($x->getAttribute('class') != 'action'){
                        $arr[$x->getAttribute('class')] = $x->nodeValue;
                    }
                }
            }
            array_push($relatedAnimes, $arr);
        }
        return array_combine(array_values($keys), array_values($relatedAnimes));
    }
}
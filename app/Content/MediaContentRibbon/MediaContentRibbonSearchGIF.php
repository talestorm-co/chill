<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Content\MediaContentRibbon;

/**
 * Description of MediaContentRibbonSearchGIF
 *
 * @author eve
 * @property string $file_version
 * @property MediaContentRibbonItem[] $items
 */
class MediaContentRibbonSearchGIF implements \common_accessors\IMarshall, \Countable, \Iterator {

    use \common_accessors\TCommonAccess,
        \common_accessors\TDefaultMarshaller,
        \common_accessors\TIterator;

    protected static $_file_version;

    public static function get_file_version() {
        if (!static::$_file_version) {
            static::$_file_version = md5(implode("-", [__FILE__, filemtime(__FILE__)]));
        }
        return static::$_file_version;
    }

    /** @var string */
    protected $file_version;

    /** @var MediaContentRibbonItem[] */
    protected $items;

    /** @return string */
    protected function __get__file_version() {
        return $this->file_version;
    }

    /** @return MediaContentRibbonItem[] */
    protected function __get__items() {
        return $this->items;
    }

    protected function __construct(string $search_query, int $offset, int $perpage, \Language\LanguageItem $language, \Language\LanguageItem $default_language) {
        $this->file_version = static::get_file_version();
        $this->items = [];
        $this->load($search_query, $offset, $perpage, $language, $default_language);
        $this->cache($search_query, $offset, $perpage, $language);
    }

    protected function cache(string $search, int $offset, int $perpage, \Language\LanguageItem $language) {
        $cache = \Cache\FileCache::F();
        $cache_key = static::mk_cache_key($search, $offset, $perpage, $language);
        //
    }

    protected static function mk_cache_key(string $search, int $offset, int $perpage, \Language\LanguageItem $language) {
        return implode("---", [__CLASS__, $search, $offset, $perpage, $language->id]);
    }

    protected function load(string $search_query, int $offset, int $perpage, \Language\LanguageItem $language, \Language\LanguageItem $default_language) {
        $query = "
            SELECT A.id,A.id content_id,A.ctype content_type,A.enabled,
            ATAG.tag_id, COALESCE(TAGSTR1.name,TAGSTR2.name) tag_name,
            COALESCE(GIFSTRINGS1.name,GIFSTRINGS2.name) name,
            'media_content_poster' image_context,                           
            A.id image_owner,
            GIFLINK.default_poster image,
            -- выборка характеристик GIF
            GIFLINK.cdn_url  gif_cdn_url,
            GIFLINK.target  gif_target_url,
            CASE WHEN RTT.qty = 0 OR RTT.qty IS NULL THEN 0 ELSE ROUND(COALESCE(RTT.average,0) / COALESCE(RTT.qty,1)) END  ratestars,
            A.track_language, COALESCE(TL1.name,TL2.name)track_language_name,
            MCGL.genre_id genre_id, COALESCE(MCGS1.name,MCGS2.name) genre_name,
            MCO.country_id origin_country_id, COALESCE(MCOS1.name,MCOS2.name) origin_country_name,
            A.series_count,A.seasons_count,
            NULL as dmy
            FROM media__content A 
            LEFT JOIN media__content__tag__list ATAG ON(ATAG.media_id=A.id AND ATAG.sort=0)
            LEFT JOIN media__content__tag__strings TAGSTR1 ON(TAGSTR1.id=ATAG.tag_id AND TAGSTR1.language_id='%s')
            LEFT JOIN media__content__tag__strings TAGSTR2 ON(TAGSTR2.id=ATAG.tag_id AND TAGSTR2.language_id='%s')
            -- линки для gif
            JOIN media__content__gif GIFLINK ON(GIFLINK.id=A.id)
            LEFT JOIN media__content__gif__strings GIFSTRINGS1 ON(GIFSTRINGS1.id=GIFLINK.id AND GIFSTRINGS1.language_id='%s')
            LEFT JOIN media__content__gif__strings GIFSTRINGS2 ON(GIFSTRINGS2.id=GIFLINK.id AND GIFSTRINGS2.language_id='%s')
            -- track language
            LEFT JOIN media__content__tracklang__strings TL1 ON(TL1.id=A.track_language AND TL1.language_id='%s')
            LEFT JOIN media__content__tracklang__strings TL2 ON(TL2.id=A.track_language AND TL2.language_id='%s')
            -- genre
            LEFT JOIN media__content__genre_list MCGL ON (MCGL.media_id=A.id AND MCGL.sort = 0)
            LEFT JOIN media__content__genre__strings MCGS1 ON(MCGS1.id=MCGL.genre_id AND MCGS1.language_id='%s')
            LEFT JOIN media__content__genre__strings MCGS2 ON(MCGS2.id=MCGL.genre_id AND MCGS2.language_id='%s')
            -- country
            LEFT JOIN media__content__origin MCO ON(MCO.id=A.id AND MCO.sort = 0)
            LEFT JOIN media__content__origin__country__strings MCOS1 ON(MCOS1.id=MCO.country_id AND MCOS1.language_id='%s')
            LEFT JOIN media__content__origin__country__strings MCOS2 ON(MCOS2.id=MCO.country_id AND MCOS2.language_id='%s')
            -- stars
            LEFT JOIN media__content__review__accumulator RTT ON(RTT.media_id=A.id)
            WHERE A.enabled=1 AND COALESCE(GIFSTRINGS1.name,GIFSTRINGS2.name) LIKE :Q                           
            ORDER BY A.id DESC
            LIMIT {$perpage} OFFSET {$offset};
            ;
            "; //LIMIT 
        $cc = mb_substr_count($query, "%s");
        $cap = [];
        while (count($cap) < $cc) {
            $cap[] = $language;
            $cap[] = $default_language;
        }
        $aquery = call_user_func_array('sprintf', array_merge([$query], $cap));
        $rows = \DB\DB::F()->queryAll($aquery, [":Q" => "%{$search_query}%"]);
        $this->items = [];
        foreach ($rows as $row) {
            try {
                $this->items[] = MediaContentRibbonItem::F($row);
            } catch (\Throwable $e) {
                
            }
        }
    }

    /**
     * 
     * @param string $search_query
     * @param int $offset
     * @param int $perpage
     * @param \Language\LanguageItem $language
     * @param \Language\LanguageItem $default_language
     * @return \static
     */
    public static function F(string $search_query, int $offset, int $perpage, \Language\LanguageItem $language, \Language\LanguageItem $default_language) {
        $cs = static::class;
        $cache = \Cache\FileCache::F();
        $cache_key = static::mk_cache_key($search_query, $offset, $perpage, $language);
        $x = $cache->get($cache_key);
        if ($x && is_object($x) && ($x instanceof $cs) && ($x->file_version === static::get_file_version())) {
            return $x;
        }
        return new static($search_query, $offset, $perpage, $language, $default_language);
    }

    public function marshall() {
        return $this->t_default_marshaller_marshall_array($this->items);
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Content\MediaContent\Listers;

/**
 * Description of SeasonSeasonsLister
 *
 * @author eve
 */
class SeasonSeasonsLister extends \Content\Lister\Lister {

    protected function get_filters(): array {
        return [
            'id' => 'Int:A.id',
            'season_id' => 'Int:B.season_id',
            'common_name' => 'String:B.common_name',
            'name' => 'String:COALESCE(L1.name,L2.name)',
            'num' => 'Int:B.num'
                //'series'
        ];
    }

    protected function get_sort_separator(): string {
        return '|';
    }

    protected function get_sorts(): array {
        return ['id' => 'A.id'];
    }

    protected function create_direct_conditions() {
        $this->filter->addDirectCondition('(A.ctype=\'ctSEASONSEASON\')');
    }

    protected function build_query() {
        $lang = \Language\LanguageList::F()->get_current_language();
        $def_lang = \Language\LanguageList::F()->get_default_language();
        return sprintf("
            SELECT SQL_CALC_FOUND_ROWS A.id,A.enabled,B.default_poster,B.num,B.season_id,
            COALESCE(L1.name,L2.name) name,B.common_name
            FROM media__content A
            JOIN media__content__season__season B ON(B.id=A.id)
            LEFT JOIN media__content__seasonseason__strings__lang_%s L1 ON(A.id=L1.id)
            LEFT JOIN media__content__seasonseason__strings__lang_%s L2 ON(A.id=L2.id)
            %s %s %s %s ;            
            ", $lang, $def_lang, $this->filter->whereWord, $this->where, $this->sort->SQL, $this->limit->MySqlLimit);
    }

}

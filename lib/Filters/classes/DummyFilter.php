<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Filters\classes;

/**
 * фиктивный фильтр - пропускает все 
 */
class DummyFilter extends \Filters\AbstractFilter {
    

    protected function do_apply($input_value, \Filters\IFilterParams $params = null) {
        return $input_value;
    }

}

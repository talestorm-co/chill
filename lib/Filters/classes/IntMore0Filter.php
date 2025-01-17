<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Filters\classes;

class IntMore0Filter extends \Filters\AbstractFilter {

    protected function do_apply($input_value, \Filters\IFilterParams $params = null) {
        return is_numeric($input_value) && intval($input_value) > 0 ? intval($input_value) : \Filters\InvalidValue::F('NonNumericGZ');
    }

}

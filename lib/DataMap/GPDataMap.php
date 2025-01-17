<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DataMap;

class GPDataMap extends AbstractDataMap {

    protected function _data_map_can_rebind(): bool {
        return false;
    }

    protected function _data_map_read_only(): bool {
        return true;
    }

    protected function on_instance_created() {
        $this->rebind($_GET);
        $this->failsafe_data = &$_POST;
    }

    protected static function _data_map_singleton(): bool {
        return true;
    }

}

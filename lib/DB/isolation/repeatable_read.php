<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DB\isolation;

final class repeatable_read extends isolation_level {

    const level = static::LEVEL_REPEATABLE_READ;

}

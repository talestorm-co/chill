<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Backup;

interface IBackupParams extends \DataMap\IDataMap {

    public static function F(string $config_name): IBackupParams;
}

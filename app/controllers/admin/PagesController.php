<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\admin;

class PagesController extends AbstractAdminController{
    
    protected function actionIndex() {
        $this->render_view("admin", "list");
    }

    protected function API_list() {
        \Content\Infopage\InfopageADVTLister::F($this->out)->run();
    }

    protected function API_get(int $p = null) {
        $id = $p?$p:$this->GP->get_filtered('id', ['IntMore0','DefaultNull']);
        $id?false:\Errors\common_error::R("invalid request");
        $cb = \Content\Infopage\Infopage::LI($id);
        $this->out->add('infopage', $cb->marshall());
        
    }

    protected function API_post() {
        $data = $this->GP->get_filtered('data', ['Trim','NEString','JSONString','NEArray','DefaultNull']);
        $data?false:\Errors\common_error::R("invalid request");
        $datamap = \DataMap\CommonDataMap::F()->rebind($data);
        $id = $datamap->get_filtered('id', ['IntMore0','DefaultNull']);
        $cb = null;
        if($id){
            $cb = \Content\Infopage\Infopage::LI($id);
        }else{
            $cb = \Content\Infopage\Infopage::F();
        }
        /* @var $cb \Content\Infopage\Infopage */
        $cb->load_from_datamap($datamap);
        $ret_id = $cb->save();
        $this->API_get($ret_id);
    }

    protected function API_remove() {
        $id_to_remove = $this->GP->get_filtered('id_to_remove',['IntMore0','DefaultNull']);
        $id_to_remove?false:\Errors\common_error::R("invalid request");
        \DB\SQLTools\SQLBuilder::F()->push("DELETE FROM infopage WHERE id=:Pid")->push_param(":Pid", $id_to_remove)->execute_transact();
        \Content\Infopage\Infopage::RESET_CACHE();
        $this->API_list();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 韩小毛
 * Date: 2017/4/21
 * Time: 23:59
 */
class Suggest_model extends CI_Model{
    public function save_suggest($suggestType,$suggestDescription){
        $this ->db ->insert("t_suggest",array(
            "suggest_type"=>$suggestType,
            "suggest_content"=>$suggestDescription,
        ));
        return $this ->db->affected_rows();
    }




}


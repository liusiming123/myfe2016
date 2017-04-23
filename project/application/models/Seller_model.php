<?php
/**
 * Created by PhpStorm.
 * User: 韩小毛
 * Date: 2017/4/21
 * Time: 20:12
 */
class Seller_model extends CI_Model{
    //卖家通过电话登陆
    public function get_by_tel_pwd_seller($tel, $password)
    {
        return $this->db->get_where("t_seller", array(
            "tel" => $tel,
            "password" => $password
        ))->row();
    }
    //卖家通过email登陆
    public function get_by_email_pwd_seller($email, $password)
    {
        return $this->db->get_where("t_seller", array(
            "email" => $email,
            "password" => $password
        ))->row();
    }
    //通过用户名获取信息 验证用户名是否重复
    public function get_by_realname($username){
        return $this -> db ->get_where('t_seller',array(
            'real_name' => $username
        ))->row();
    }
    //注册新用户
    public function save_seller($name,$id,$sellTel,$password){
        $this ->db ->insert("t_seller",array(
            "real_name"=>$name,
            "id"=>$id,
            "tel" =>$sellTel,
            "password"=>$password,
        ));
        return $this ->db->affected_rows();
    }
    //通过id获取卖家信息   修改信息时候用
    public function get_by_seller($sellerId){
        return $this -> db ->get_where('t_seller',array(
            'seller_id' => $sellerId
        ))->row();
    }

    //修改卖家信息
    public function update_seller($sellerId,$files,$selName,$selDescribe,$tel,$sex,$birth,$email){
        $this -> db -> where('seller_id',$sellerId);
        $this -> db -> update('t_seller',array(
            "photo" => $files,
            'sel_name' => $selName,
            'sel_describe' => $selDescribe,
            'tel' => $tel,
            'sex' => $sex,
            'birth' => $birth,
            'email' => $email,
        ));
        return $this -> db -> affected_rows();
    }
    //上传新商品
    public function save_snack($snName,$sellerId,$photo,$snType,$snImport,$price,$memberPrice,$snDescribe){
        $this ->db ->insert("t_snack",array(
            "sn_name"=>$snName,
            "seller_id"=>$sellerId,
            "photo"=>$photo,
            "type_id"=>$snType,
            "import"=>$snImport,
            "price"=>$price,
            "member_price" =>$memberPrice,
            "sn_describe"=>$snDescribe,
        ));
        return $this ->db->affected_rows();
    }
//修改密码时判断旧密码是否正确
    public function get_by_password($sellerId,$password){
        return $this -> db ->get_where('t_seller',array(
            'seller_id' => $sellerId,
            'password' => $password,
        ))->row();
    }
    //修改密码
    public function  update_password($sellerId,$password){
        $this -> db -> where('seller_id',$sellerId);
        $this -> db -> update('t_seller',array(
            "password" => $password,
        ));
        return $this -> db -> affected_rows();
    }
//获取个人卖家所有零食
    public function get_by_snack($sellerId){
        $sql = "select t_snack.* from t_snack where t_snack.seller_id=?";
        return $this -> db -> query($sql,array($sellerId))->result();
    }







}
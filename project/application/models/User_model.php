<?php
    class User_model extends CI_Model
    {
        //买家通过电话登陆
        public function get_by_tel_pwd_user($tel, $password)
        {
            return $this->db->get_where("t_user", array(
                "tel" => $tel,
                "password" => $password
            ))->row();
        }
        //买家通过email登陆
        public function get_by_email_pwd_user($email, $password)
        {
            return $this->db->get_where("t_user", array(
                "email" => $email,
                "password" => $password
            ))->row();
        }
        //通过用户名获取信息 验证用户名是否重复
        public function get_by_username($username){
            return $this -> db ->get_where('t_user',array(
                'name' => $username
            ))->row();
        }
        //通过id获取买家信息   修改信息时候用
        public function get_by_user($userId){
            return $this -> db ->get_where('t_user',array(
                'user_id' => $userId
            ))->row();
        }

        //注册新用户
        public function save_user($username,$password,$tel){
            $this ->db ->insert("t_user",array(
                "name"=>$username,
                "password"=>$password,
                "tel" =>$tel,
            ));
            return $this ->db->affected_rows();
        }
        //修改用户名 照片
        public function update_username($userId,$photo,$username){
            $this -> db -> where('user_id',$userId);
            $this -> db -> update('t_user',array(
                "photo" => $photo,
                'name' => $username,
            ));
            return $this -> db -> affected_rows();
        }
        //修改买家信息
        public function update_user($userId,$member,$realname,$tel,$sex,$birth,$email){
            $this -> db -> where('user_id',$userId);
            $this -> db -> update('t_user',array(
                "member" => $member,
                'realname' => $realname,
                'tel' => $tel,
                'sex' => $sex,
                'birth' => $birth,
                'email' => $email,
            ));
            return $this -> db -> affected_rows();
        }
        //修改密码时判断旧密码是否正确
        public function get_by_password($userId,$password){
            return $this -> db ->get_where('t_user',array(
                'user_id' => $userId,
                'password' => $password,
            ))->row();
        }
        //修改密码
        public function  update_password($userId,$password){
            $this -> db -> where('user_id',$userId);
            $this -> db -> update('t_user',array(
                "password" => $password,
            ));
            return $this -> db -> affected_rows();
        }
        //添加新地址
        public function save_address($userId,$conName,$tel,$prov,$city,$dist,$addressDes)
        {
            $this ->db ->insert("t_address",array(
                "user_id"=>$userId,
                "con_name"=>$conName,
                "tel" =>$tel,
                "prov"=>$prov,
                "city"=>$city,
                "dist"=>$dist,
                "address_des"=>$addressDes,
            ));
            return $this ->db->affected_rows();
        }
        //获取用户的所有地址信息
        public function get_allAddress($userId){
            $sql = "select t_address.* from t_address where t_address.user_id=?";
            return $this -> db -> query($sql,array($userId))->result();
        }
        //删除地址
        public function  delete_address($addressid){
            $this->db->delete("t_address",array(
                "address_id"=>$addressid
            ));
            return $this->db->affected_rows();
        }
        ////得到那一条要修改的地址
        public function get_by_addid($addressId){
            return $this -> db ->get_where('t_address',array(
                'address_id' => $addressId
            ))->row();
        }

        public function  update_address($addressId,$conName,$tel,$prov,$city,$dist,$addressDes){
            $this -> db -> where('address_id',$addressId);
            $this -> db -> update('t_address',array(
                "con_name"=>$conName,
                "tel" =>$tel,
                "prov"=>$prov,
                "city"=>$city,
                "dist"=>$dist,
                "address_des"=>$addressDes,
            ));
            return $this -> db -> affected_rows();
        }

    //获取个人卖家所有零食
    public function get_Allsnack(){
        $sql = "SELECT t_snack.* FROM t_snack";
        return $this -> db -> query($sql,array())->result();
    }
        public function  get_AllImport(){
            $sql = "SELECT t_snack.* FROM t_snack WHERE t_snack.import=1";
            return $this -> db -> query($sql,array())->result();
        }











    }
?>
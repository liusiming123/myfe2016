<?php
    class User_model extends CI_Model
    {
        public function  get_by_username_pwd($username,$password){
            return $this -> db -> get_where("t_user",array(
                "username" => $username,
                "password" => $password
            )) -> row();
//        public function get_by_username_pwd($un, $pwd){
//            return $this -> db -> get_where("t_user", array(
//                "username" => $un,
//                "password" => $pwd
//            )) -> row();
        }
        public function  get_by_username($userid)
        {
            return $this->db->get_where("t_user", array(
                "user_id" => $userid
            ))->row();
        }
        public function save_user($email,$name,$password,$sex,$province,$city){
            $this ->db ->insert("t_user",array(
                "email"=>$email,
                "username"=>$name,
                "password"=>$password,
                "sex" =>$sex,
                "province" => $province,
                "city" => $city
            ));
            return $this ->db->affected_rows();
        }
        public function save_message($message,$senduser,$userid){
            $this -> db -> insert("t_message",array(
                "content" => $message,
                "send_user" => $userid,
                "user_id" => $senduser
            ));
            return $this ->db->affected_rows();
        }
        public function update_mood ($userid,$mood){
            $this -> db -> where('user_id',$userid);
            $this -> db -> update('t_user',array(
                "mood" => $mood
            ));
            return $this -> db -> affected_rows();
        }
        public function update_pwd($userid,$newpwd){
            $this -> db -> where('user_id',$userid);
            $this -> db -> update('t_user',array(
                "password" => $newpwd
            ));
            return $this -> db -> affected_rows();
        }
        public function get_Allmessage($userid){
            $sql = "select t_message.*, t_user.username from t_message, t_user where t_message.send_user=t_user.user_id and t_message.user_id=?order by t_message.creat_time desc";
            return $this->db->query($sql, array($userid))->result();
        }
        public function get_All_sendmessage($userid){
            $sql = "select t_message.* FROM t_message WHERE t_message.send_user=?order by t_message.creat_time desc";
            return $this->db->query($sql, array($userid))->result();
        }
        public function update_user($userid,$username,$sex,$birthDate,$province,$city){
            $this -> db -> where ("user_id",$userid);
            $this -> db -> update("t_user",array(
                "username"  => $username,
                "sex" => $sex,
                "birth_date" => $birthDate,
                "province" => $province,
                "city" => $city
            ));
            return $this->db->affected_rows();
        }
        public function del_message($messid)
        {
            $this -> db -> delete('t_message',array(
                "message_id" => $messid
            ));
            return $this -> db -> affected_rows();
        }














    }
?>
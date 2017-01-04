<?php
 class Blog_model extends CI_Model{


    public function get_Alltype($userid){
        return $this->db ->get_where("t_blog_type",array(
         "user_id"=>$userid
        ))->result();
    }
    public function get_Allblog($userid){
        $sql = "select t_blog.*, t_blog_type.type_name from t_blog, t_blog_type where t_blog.type_id=t_blog_type.type_id and t_blog.user_id=? order by t_blog.creat_time desc";
        return $this->db->query($sql, array($userid))->result();
    }
     public function get_Allcomm($userid){
         $sql = "select t_blog.*, t_comm.*,t_user.username from t_blog, t_comm,t_user where t_blog.blog_id=t_comm.blog_id and t_comm.user_id=t_user.user_id and t_blog.user_id=?";
         return $this->db->query($sql, array($userid))->result();
     }
     public function delete_blog($blogid){
         $arr=explode(",",$blogid);
         $this->db->where_in("blog_id",$arr);
         $this->db->delete("t_blog");
         return $this->db->affected_rows();
     }
     public function delete_comm($commid){
         $this->db->delete("t_comm",array(
            "comm_id"=>$commid
         ));
         return $this->db->affected_rows();
     }
     public function save_blog($userid,$title,$typeid,$content){
          $this -> db -> insert("t_blog",array(
             "title"=>$title,
             "content" =>$content,
             "user_id" =>$userid,
             "type_id" =>$typeid
         ));
         return $this->db->affected_rows();
     }
    public function save_type($userid,$typename){
        $this ->db -> insert("t_blog_type",array(
            "type_name" =>$typename,
            "user_id" => $userid
        ));
        return $this ->db -> affected_rows();
    }
     public function update_type($typename,$typeid){
         $this -> db -> where('type_id',$typeid);
         $this -> db ->update('t_blog_type',array(
             "type_name" => $typename
         ));
         return $this->db->affected_rows();
//         $this->db->where('user_id', $id);
//         $this->db->update('t_user', array(
//             "username" => $un,
//             "password" => $pwd
//         ));
//         return $this->db->affected_rows();
     }
     public function del_type($typeid){
         $this -> db -> delete('t_blog_type',array(
             "type_id" => $typeid
         ));
         return $this -> db -> affected_rows();
//         $this->db->delete('t_user', array('user_id' => $id));
//         return $this->db->affected_rows();
     }














 }
?>
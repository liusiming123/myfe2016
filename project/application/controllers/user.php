<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this -> load ->model("user_model");
		$this -> load ->model("seller_model");
		$this -> load ->model("suggest_model");

	}

	public function text()
	{
		$config['upload_path'] = './uploads/';//上传图片的路径
		$config['allowed_types'] = 'gif|jpg|png';//上传图片的类型
//        $config['file_name']=data('YmdHis').'_'.rand(10000.99999);//文件名，因为文件名有可能重复。
		$config['max_size'] = '30760';//最大大小，以kb为单位
		$config['max_width'] = '10200';//最大宽度
		$config['max_height'] = '7680';//最大高度
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('userfile')) {

		}

	}
	//首页
	public function index()
	{
	//		$this -> session -> unset_userdata('userinfo');
		$this->load->view('index');
	}
	//所有零食
	public function all_goods()
	{
		$row = $this -> user_model -> get_Allsnack();
		$this->load->view('allGoods',array(
			'snacks'=>$row
		));
	}
	//进口零食
	public function import(){
		$row = $this -> user_model -> get_AllImport();
		$this->load->view('import',array(
			'snacks'=>$row
		));
	}
	//联系我们页面
	public function suggest(){
		$this->load->view('suggest');
	}
	//提交建议
	public function save_suggest(){
		$suggestType = $this -> input ->get("suggest-type");
		$suggestDescription = $this -> input ->get("suggest-description");
		$rows = $this -> suggest_model -> save_suggest($suggestType,$suggestDescription);
		if($rows>0){
			redirect('user/index');
		}else{
			redirect('user/suggest');
		}
	}
	//登陆页面
	public function login()
	{
		$this -> session -> unset_userdata('userinfo');
		$image = $this->captcha();
		$this->load->view('login', array('image'=>$image));
	}
	//确认登陆
	public function check_login()
	{
		$tel = $this -> input -> get('tel');
		$email = $this -> input -> get('email');
		$password = $this -> input -> get('password');
		$status = $this -> input -> get('status');
		$this->session->set_userdata("status",$status);
		if($tel){
			if($status == "0"){
				$row = $this -> user_model -> get_by_tel_pwd_user($tel,$password);

			}else{
				$row = $this -> seller_model -> get_by_tel_pwd_seller($tel,$password);
			}
		}else if($email){
			if($status == "0"){
				$row = $this -> user_model -> get_by_email_pwd_user($email,$password);

			}else{
				$row = $this -> seller_model -> get_by_email_pwd_seller($email,$password);
			}
		}
		if($row){
				$this -> session -> set_userdata(array(
					'userinfo' => $row  //将当前用户存入一个会话中
				));
				echo "success";
		}else{
			echo "fail";
		}
	}
	//注册页面
	public function register()
	{
		$image = $this->captcha();
		$this->load->view('register', array('image'=>$image));
	}
	//买家注册
	public function reg_user()
	{
		$username = $this -> input ->get("username");
		$password = $this -> input ->get("password");
		$tel = $this -> input -> get("tel");
			$rows = $this -> user_model -> save_user($username,$password,$tel);
			if($rows>0){
				echo "success";
			}else{
				echo "fail";
			}
	}
	//点击注销  退出
	public function out(){
		$this -> session -> unset_userdata('userinfo');
	}

	//验证买家用户名是否可用
	public function check_username()
	{
		$username = $this -> input -> get('username');
		$user = $this -> user_model -> get_by_username($username);
		if($user){
			echo "fail";
		}else {
			echo "success";
		}
	}

	//买家的个人中心
	public function information()
	{
		if($this->session->userdata('userinfo')){
			$userId =  $this->session->userdata('userinfo')->user_id;
			$result = $this -> user_model -> get_allAddress($userId);
			$this->load->view('information',array(
				'addres'=>$result
			));
		}

	}
	//买家更新用户名照片
	public function photo_name()
	{
			$userId =  $this->session->userdata('userinfo')->user_id;
			$photo = $this -> input -> post('files');
			$username = $this-> input -> post('username');
			$rows = $this -> user_model -> update_username($userId,$photo,$username);
			$row = $this -> user_model -> get_by_user($userId);
			if($rows){
				$this -> session -> set_userdata(array(
					"userinfo" => $row
				));
				redirect("user/information");
			}else{
				echo "密码修改失败";
			}



	}
	//买家更新各种信息
	public function user()
	{
		$userId =  $this->session->userdata('userinfo')->user_id;
		$member = $this -> input -> post('member');
		$realname = $this-> input -> post('realname');
		$tel = $this-> input -> post('tel');
		$sex = $this-> input -> post('sex');
		$year = $this-> input -> post('year');
		$month = $this-> input -> post('month');
		$day = $this-> input -> post('day');
		$email = $this-> input -> post('email');
		$birth = $year.'-0'.$month.'-'.$day;
		$rows = $this -> user_model -> update_user($userId,$member,$realname,$tel,$sex,$birth,$email);
		$row = $this -> user_model -> get_by_user($userId);
		if($rows){
			$this -> session -> set_userdata(array(
				"userinfo" => $row
			));
			redirect("user/information");
		}else{
			echo "修改失败";
		}
	}
	//判断密码是否正确
	public function check_password()
	{
		$userId =  $this->session->userdata('userinfo')->user_id;
		$password = $this -> input -> get('password');
		$row = $this -> user_model -> get_by_password($userId,$password);
		if($row){
			echo "success";
		}else {
			echo "fail";
		}
	}
		//更改密码
	public function change_password()
	{
		$userId =  $this->session->userdata('userinfo')->user_id;
		$password = $this -> input -> get('password');
		$rows = $this -> user_model -> update_password($userId,$password);
		if($rows){
			redirect("user/login");
		}else{
			redirect("user/information");
		}
	}
	//添加地址
	public function add_address()
	{
		$userId =  $this->session->userdata('userinfo')->user_id;
		$conName = $this -> input ->get("con-name");
		$tel = $this -> input ->get("tel");
		$prov = $this -> input ->get("prov");
		$city = $this -> input -> get("city");
		$dist = $this -> input -> get("dist");
		$addressDes = $this -> input -> get("address-des");
		$rows = $this -> user_model -> save_address($userId,$conName,$tel,$prov,$city,$dist,$addressDes);
		if($rows>0){
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function del_address()
	{
		$addressid = $this->input -> get('addressid');
		$rows =$this->user_model ->delete_address($addressid);
		if($rows){
			redirect('user/information/#address');
		}else{
			echo"fail";
		}
	}
	//得到那一条要修改的地址
	public function get_address()
	{
		$addressId = $this->input->get('address-id');
		$row = $this -> user_model -> get_by_addid($addressId);
		if($row){
			echo $row->con_name,'&'.$row->tel,'&'.$row->prov,'&'.$row->city,'&'.$row->dist,'&'.$row->address_des;
		}else{
			echo "fail";
		}
	}
	//修改地址
	public function change_address()
	{
		$addressId =  $this->input->get('address-id');
		$conName = $this -> input ->get("con-name");
		$tel = $this -> input ->get("tel");
		$prov = $this -> input ->get("prov");
		$city = $this -> input -> get("city");
		$dist = $this -> input -> get("dist");
		$addressDes = $this -> input -> get("address-des");
		$rows = $this -> user_model ->update_address($addressId,$conName,$tel,$prov,$city,$dist,$addressDes);
		if($rows){
			echo 'success';
		}else{
			echo "fail";
		}
	}















	//验证码
	public function captcha()
	{
		$this->load->helper('captcha');
		$vals = array(
			'word' => rand(1000,9999),/*验证码里面数字*/
			'img_path'  => './captcha/',
			'img_url'   => base_url().'/captcha/',
			'font_path' => './system/fonts/texb.ttf',
			'img_width' => '100',
			'img_height'    => 35,
			'expiration'    => 7200,/*验证码图片保存时间*/
			'word_length'   => 8,
			'font_size' => 17,
			'img_id'    => 'Imageid',
			'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			// White background and border, black text and red grid
			'colors'    => array(
				'background' => array(255, 255, 255),
				'border' => array(153,102,102),
				'text' => array(204,153,153),
				'grid' => array(192,192,192)
			)
		);
		$this->session->set_userdata("captcha",$vals['word']);
		$cap = create_captcha($vals);
		return $cap['image'];
	}
	public function show_captcha()
	{
		echo $this->captcha();
	}



}

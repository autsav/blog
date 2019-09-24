<?php 
require_once "database.php";

class Admin extends Database{

	public $id,$name,$email,$phone,$status,$role,$password, $username;
	
	
	function login(){
	 	$sql = "select * from tbl_admin where email='$this->email' and password='$this->password' and status=1";
	 	$adata= $this->select($sql);
	 	print_r($adata);
	 	if (count($adata) == 1){
	 		session_start();
	 		$_SESSION['admin_username'] = $adata[0]->username;
	 		$_SESSION['admin_name'] = $adata[0]->name;
	 		$_SESSION['admin_email'] = $adata[0]->email;
	 		$_SESSION['admin_role'] = $adata[0]->role;
	 		header('location:dashboard.php');
	 	}else{
	 			return "Login Failed";
	 }
	}
	function create(){

	}
	function edit(){

	}
	function remove(){

	}
	function lists(){

	}
	


}

 ?>
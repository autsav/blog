<?php 
require_once "database.php";

class Tag extends Database{

	public $id,$name,$slug ;
	
	function create(){
	$sql = "insert into tbl_tag (name,slug) values 
		('$this->name','$this->slug')";
		$st = $this->insert($sql);
		if (is_integer($st)) {
			return "Tag Inserted with id $st";
		}else{
			echo "Failed to insert tag";
		}
	}
	function edit(){
		$sql = "update tbl_tag set name='$this->name',slug='$this->slug' where id= '$this->id' ";

		$st =	$this->update($sql);
		;
		if ($st) {
			header('location:list_tag.php');
		}else{
			return "Failed to update record";
		}
	}

	function remove(){
		$sql = "delete from tbl_tag where id='$this->id'";
		$status = $this->delete($sql);
		if ($status) {
			header('location:list_tag.php');
		}else{
			return "Can't Delete Record";
		}

	}
	function lists(){
		$sql = "select * from tbl_tag order by name";
		return $this->select($sql);
	}
	function getTagID(){
		$sql = "select * from tbl_tag where id='$this->id' ";
		return $this->select($sql);


	}
}

?>	
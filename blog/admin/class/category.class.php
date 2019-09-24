<?php 
require_once "database.php";

class Category extends Database{

	public $id,$name,$slug,$rank,$status,$created_by,$modified_by,$created_date,$modified_date ;
	
	function create(){
		$sql = "insert into tbl_category (name,slug,rank,status,created_by,modified_by,created_date,modified_date) 
		
		values ('$this->name','$this->slug','$this->rank','$this->status','$this->created_by','$this->modified_by','$this->created_date','$this->modified_date')";
		$st = $this->insert($sql);
		
		if (is_integer($st)) {
			return "Category Inserted with id $st";
		}else{
			echo "Failed to insert category";
		}
	}

	function edit(){
		$sql = "update tbl_category set name='$this->name',rank='$this->rank',status='$this->status',slug='$this->slug',modified_date='$this->modified_date',modified_by='$this->modified_by' where id= '$this->id' ";
		echo $sql;
		$st =	$this->update($sql);
		if ($st) {
			header('location:list_category.php');
		}else{
			return "Failed to update record";
		}
	}
	function remove(){
	echo	$sql = "delete from tbl_category where id='$this->id'";
		$status =	$this->delete($sql);
		if($status){
			header('location:list_category.php');
		}else{
			return "Can't Delete Record";
		}

	}
	function lists(){
		$sql = "select * from tbl_category order by name";
		return $this->select($sql);


	}
	function getCategoryID(){
		$sql = "select * from tbl_category where id='$this->id' ";
		return $this->select($sql);


	}
	function getActiveCategory(){
		$sql = "select * from tbl_category where status=1 order by rank";
		return $this->select($sql);


	}
}
?>	
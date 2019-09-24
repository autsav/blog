<?php 
require_once "database.php";

class Post extends Database{

	public $id,$category_id,$title,$rank,$slug,$status,$bodytext,$image,$created_by,$modified_by,$created_date,$modified_date,$tags ;//tag ko kura sushil lai sodhne kina tala tag narakheko ani rakhda kina error aako//
	
	function create(){
		$sql = "insert into tbl_post (category_id,title,rank,slug,status,bodytext,image,created_by,modified_by,created_date,modified_date) 

		values('$this->category_id','$this->title','$this->rank','$this->slug','$this->status','$this->bodytext','$this->image','$this->created_by','$this->modified_by','$this->created_date','$this->modified_date')";
		
		$st = $this->insert($sql);
		
		if (is_integer($st)) {
			foreach($this->tags as $tag){
				$sql = "insert into tbl_tag_post(post_id,tag_id) values('$st','$tag')";
				$this->insert($sql);
			}
			return "Post Inserted with id $st";
		}else{
			echo "Failed to insert Post";
		}
	}
	
	function edit(){

		$sql = "update tbl_post set category_id='$this->category_id',title='$this->title',rank='$this->rank',slug='$this->slug',status='$this->status',bodytext='$this->bodytext',image='$this->image',tags='$this->tags' where id= '$this->id' ";
		$st =	$this->update($sql);
		if ($st) {
			header('location:list_post.php');
		}else{
			return "Failed to update record";
		}

	}
	function remove(){
			$sql = "delete from tbl_post where id='$this->id'";
		$status = $this->delete($sql);
		if ($status) {
			header('location:list_post.php');
		}else{
			return "Can't Delete Record";
		}
	}
	function lists(){
		$sql = "select p.*, c.name as category_name from tbl_post p join tbl_category c on p.category_id=c.id  order by p.created_date DESC ";
		return $this->select($sql);
	}
	function getPostID(){
		$sql = "select * from tbl_post where id='$this->id' ";
		return $this->select($sql);


	}
	function getLatestPost(){
		$sql = "select p.*, c.name as category_name from tbl_post p join tbl_category c on p.category_id=c.id where p.status=1 order by p.created_date desc limit 4";
		return $this->select($sql);
	}
	function getPostByCategoryId(){
		$sql = "select p.*, c.name as category_name from tbl_post p join tbl_category c on p.category_id=c.id where p.category_id='$this->category_id' order by p.created_date DESC ";
		return $this->select($sql);
	}
	function getDetailPostById(){
		$sql = "select * from `tbl_post` WHERE id= '$this->id' and status='1'";
		return $this->select($sql);
	}

	function getAllPosts(){
		if($this->category_id != ''){
			$sql = "select p.*, c.name as category_name from tbl_post p join tbl_category c on p.category_id=c.id where p.category_id='$this->category_id' order by p.created_date DESC ";
		}else{
			$sql = "select * from `tbl_post` WHERE status='1'";
		}
		return $this->select($sql);
	}
	
}

?>	
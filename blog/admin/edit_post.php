<?php
@session_start(); 
$id	= $_GET['id'];
require_once "class/post.class.php";
$post = new Post();
$postByCategory = $post->getPostByCategoryId();
$post->id = $id;

require_once "class/category.class.php";
$category = new Category();
$catlist = $category->lists();

require_once "class/tag.class.php";
$tag = new Tag();
$taglist = $tag->lists();

if (isset($_POST['btnUpdate'])){
/*    $post->set('id',$_POST['id']); 
*/    $post->set('category_id',$_POST['category_id']);
    $post->set('title',$_POST['title']);
    $post->set('rank',$_POST['rank']);
    $post->set('slug',$_POST['slug']);
    $post->set('status',$_POST['status']);
    $post->set('bodytext',$_POST['bodytext']);
    if($_FILES['image']['error']==0){
            $name = uniqid().'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$name);
                     $post->set('image',$name);
         }
    
    
    $post->set('created_by',$_SESSION['admin_username']);
    $post->set('created_date',date('Y-m-d'));
    $post->set('tags',$_POST['tags']);

    $msg =$post->edit();
}
 $postdata = $post->getPostID();


require_once "header.php"
?>




        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Edit Blog</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Post
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php 
                                      if(isset($msg)){
                                        echo $msg;
                                      }  
                                     ?> 
                                    <form role="form" action="" method="post" id="postform" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input type="hidden" name="id" value="$postdata->id">
                                            <select id="slug" name="category_id" class="form-control" >
                                                <option value="">Select Category</option>
                                                <?php foreach ($catlist as $c) { ?>
                                                    <option value="<?php echo $c->id ?>" <?php if($c->id == $postdata[0]->category_id) echo 'selected' ?>><?php echo $c-> name?></option>
                                               <?php } ?>       
                                            </select>
                                        </div>

                                        <div class="form-group" action="" method="post">
                                            <label>Title</label>
                                            <input class="form-control" name="title" required="" value="<?php echo $postdata[0]->title ?>">
                                            <p class="help-block">Example:Hiking,Travelling,...</p>
                                        </div>
                                        
                                      <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control" value="<?php echo $postdata[0]->slug ?>">
                                        </div>
                                         <div class="form-group">

                                            <label>Status</label>
                                            <?php if($postdata[0]->status == 1){ ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" >Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0" checked>Deactive
                                            </label>
                                    <?php    }else{ ?>
                                        <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" >Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0" checked>Deactive
                                            </label>
                                        <?php } ?>



                                        <div class="form-group">
                                            <label>Rank</label>
                                            <input type="number" class="form-control" name="rank" required="" value="<?php echo $postdata[0]->rank ?>">
                                            
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Body Text</label>
                                            <textarea  class="form-control ckeditor" name="bodytext" rows="3" required="" value="<?php echo $postdata[0]->bodytext ?>"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Feature Image</label>
                                            <input type="file" class="form-control" name="image" value="<?php echo $postdata[0]->image ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tags (Choose multiple)</label>
                                            <div>
                                                <select name="tags[]" class="form-control" multiple value="<?php echo $postdata[0]->tags ?>">
                                                    <?php foreach($taglist as $tag){ ?>
                                                        <option value="<?php echo $tag->id ?>"><?php echo $tag->name ?></option>
                                                    <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                       <div>
                                        <button type="submit" name="btnUpdate" class="btn btn-primary">Update Post</button>
                                        
                                    </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php require_once "footer.php" ?>

<script type="text/javascript" src="validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#postform').validate();
    });
    
</script>

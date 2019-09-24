<?php
@session_start();
if ($_SESSION['admin_role']!='admin') {
    header('location:dashboard.php');
}
$id	= $_GET['id'];
require_once "class/tag.class.php";
$tag = new Tag();
$tag->id = $id;



if (isset($_POST['btnUpdate'])){
    $tag->set('name',$_POST['name']);
    $tag->set('slug',$_POST['slug']);

    $msg =$tag->edit();
}
$tagdata = $tag->getTagID();


require_once "header.php"

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Tag</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update tag
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <?php 
                                if(isset($msg)){
                                    echo $msg;
                                }  
                                ?>  

                                <form role="form" action="" method="post" id="tagform">
                                    <div class="form-group">
                                        <label>Tag Name</label>
                                        <input class="form-control" name="name" required="" value="<?php echo $tagdata[0]->name ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" required="" value="<?php echo $tagdata[0]->slug ?>">
                                    </div>

                                    <div>
                                        <button type="submit" name="btnUpdate" class="btn btn-primary">Update Tag</button>
                                        
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

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
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php require_once "footer.php" ?>

<script type="text/javascript" src="validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tagform').validate();
    });
    
</script>


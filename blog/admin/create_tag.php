<?php 
@session_start();
if ($_SESSION['admin_role']!='admin') {
    header('location:dashboard.php');
}

require_once "header.php";
require_once "class/tag.class.php";
$tag = new Tag();

if (isset($_POST['btnSave'])){
    $tag->set('name',$_POST['name']);
    $tag->set('slug',$_POST['slug']);

    $msg =$tag->create();
}
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tag Category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Tag
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
                                        <input class="form-control" name="name" required="">

                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" required>
                                    </div>

                                    <div>
                                        <button type="submit" name="btnSave" class="btn btn-primary">Save Tag</button>
                                        
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


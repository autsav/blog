<?php 
@session_start();
if ($_SESSION['admin_role']!='admin') {
    header('location:dashboard.php');
}
require_once "header.php";



require_once "class/category.class.php";
$category = new Category();
$err=[];
if (isset($_POST['btnSave'])){
    $category->set('name',$_POST['name']);

  if(isset($_POST['rank']) && !empty($_POST['rank'])){
            if($_POST['rank']>0){
                $category->set('rank',$_POST['rank']);
            }else{
                $err['rank'] = 'Rank should be in positive number';
            }
        }else{
            $err['rank'] = 'enter rank';
        }

    $category->set('slug',$_POST['slug']);
    $category->set('status',$_POST['status']);
    $category->set('created_by',$_SESSION['admin_username']);
    $category->set('created_date',date('Y-M-D'));
    
    if (count($err)==0) {
    $msg =$category->create();
    }

}

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create Category</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <?php 
                                      if(isset($msg)){
                                        echo $msg;
                                      }  
                                     ?>    


                                    <form role="form" action="" method="post" id="categoryform">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" required="">
                                            
                                        </div>
                                          <div class="form-group">
                                            <label>Rank</label>
                                            <input type="number" class="form-control" name="rank" required="">
                                             <?php if(isset($err['rank'])){ ?>
                                            echo $err['rank'];
                                        <?php  } ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input class="form-control" placeholder="Enter text" name="slug">
                                        </div>
                                   <div class="form-group">
                                            <label>Status</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" >Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0" checked>Deactive
                                            </label>
                                          
                                        </div>
                                       <div>
                                        <button type="submit" name="btnSave" class="btn btn-primary">Save Category</button>
                                        <button type="reset" name="" class="btn btn-danger">Clear</button>
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
        $('#categoryform').validate();
    });
    
</script>

   
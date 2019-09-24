<?php require_once "header.php" ?>
<?php 
require_once "class/tag.class.php";
$tag = new Tag();
$data = $tag->lists();


 ?>

<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tag Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tag Listing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="TagTable">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1; foreach ($data as $d) { ?>  
                                    <tr class="odd gradeX">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $d->name ?></td>
                                        <td><?php echo $d->slug ?></td>
                                        <td><a href="edit_tag.php?id=<?php echo $d->id ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i>Edit</a>

                                            <a href="delete_tag.php?id=<?php echo $d->id ?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this record?');"><i class="fa fa-trash"></i>Delete</a></td>
                                        
                                    </tr>
                                    <?php  }?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
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
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#TagTable').DataTable({
            responsive: true
        });
    });
    </script>
   
   
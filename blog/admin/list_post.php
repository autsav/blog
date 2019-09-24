<?php require_once "header.php" ?>
<?php 
require_once "class/post.class.php";
$post = new Post();
$data = $post->lists();
 ?>

<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Post Listing
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="PostTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Rank</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Body Text</th>
                                        <th>Image</th>
                                        <th>Created By</th>
                                        <th>Modified By</th>
                                        <th>Created Date</th>
                                        <th>Modified Date</th>
                                        <th>Tags</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                               <tbody>
                                <?php $i=1; foreach ($data as $d) { ?>
                                   <tr class="odd gradeX">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $d->category_name ?></td>
                                        <td><?php echo $d->title ?></td>
                                        <td><?php echo $d->rank ?></td>
                                        <td><?php echo $d->slug ?></td>
                                        <td class="center"><?php if ($d->status == 1) 
                                                {
                                                    echo "<label class='label label-success'>Active</label>";
                                                }else{
                                                    echo "<label class='label label-danger'>De Active</label>";
                                                                } ?>
                                            
                                        </td>
                                        
                                        <td><?php echo $d->bodytext ?></td>
                                        <td><img src="images/<?php echo $d->image ?>" width="125"> </td>
                                        <td><?php echo $d->created_by ?></td>
                                        <td><?php echo $d->modified_by ?></td>
                                        <td><?php echo $d->created_date ?></td>
                                        <td><?php echo $d->modified_date ?></td>
                                        <td><?php echo $d->tags ?></td>
                                        <td>
                                            <a href="edit_post.php?id=<?php echo $d->id ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i>Edit</a>


                                            <a href="delete_post.php?id=<?php echo $d->id ?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this record?');"><i class="fa fa-trash"></i>Delete</a></td>


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
        $('#PostTable').DataTable({
            responsive: true
        });
    });
    </script>
   
   
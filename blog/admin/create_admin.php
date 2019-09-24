<?php require_once "header.php" ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Admin
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" id="adminform">
                                        <div class="form-group">
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="text" class="form-control" name="fname" placeholder="First name" required="">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="lname" placeholder="Last name" required="">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Admin name</label>
                                            <input class="form-control" name="aname" required="">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email address</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="">
                                                    </div>
                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input class="form-control" placeholder="Enter Phone Number." name="phone_no">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <label class=ss"checkbox-inline">   
                                                <input type="checkbox" name="status"  value="1" >Active
                                            </label>
                                            <label class="checkbox-inline" name="status"  value="0">
                                                <input type="checkbox" checked="">De-Active
                                            </label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <input class="form-control" placeholder="Enter text" name="role" required="">
                                        </div>
                                        <div>
                                            <button type="submit" name="btnSave" class="btn btn-primary">Create Admin</button>

                                        
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
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php require_once "footer.php" ?>

<script type="text/javascript" src="validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#adminform').validate();
    });
    
</script>
   
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Texi Services | Edit Contact</title>
        <?php
        include('./common/style.php')
        ?>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php
            include('./common/menu.php')
            ?>
            <?php
            include('./common/sidebar.php')
            ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Contact</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="contact.php"> Contact</a></li>
                                    <li class="breadcrumb-item active">Edit Contact</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Edit Contact</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <?php
                                                if(isset($_GET['id']))
                                                {
                                                    $user_id=$_GET['id'];
                                                    $upcontact="SELECT * FROM contact WHERE id='".$user_id."' ";
                                                    $upquery=mysqli_query($conn,$upcontact);
                                                    if(mysqli_num_rows($upquery)>0)
                                                    {
                                                    foreach($upquery as $edit)
                                                        {
                                        ?>
                                        <form action="contact_process.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $edit['id'];?>">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Contact</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                       value="<?php echo $edit['contact'];?>" name="editcontact">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                       value="<?php echo $edit['email'];?>" name="editemail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                       value="<?php echo $edit['address'];?>" name="editaddress">
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="<?php echo $edit['ids'];?>">
                                            <!-- /.card-body -->

                                            <div class="card-footer col-md-2">
                                                <button type="submit" class="btn btn-primary" name="editsubmit"
                                                    value="editcon">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                                }
                            }
                        }
                        else
                        {
                            echo "Not Data Found";
                        }
                    ?>
            </div>
            <?php
            include('./common/footer.php')
            ?>
        </div>
        <?php
        include('./common/script.php')
        ?>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>
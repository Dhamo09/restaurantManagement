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
        <title>Texi Services | Edit subcategory</title>
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
                                <h1 class="m-0">subcategory</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="subcategory.php"> subcategory</a></li>
                                    <li class="breadcrumb-item active">Edit subcategory</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add subcategory</h3>
                                            </div>
                                            <?php
                                            extract($_REQUEST);
                                            include_once('include/config.php');
                                            $qry = "SELECT * FROM subcategory WHERE id='" . $id . "'";
                                            $res = mysqli_query($conn, $qry);
                                            $row = mysqli_fetch_assoc($res);
                                            ?>
                                            <form method="post" action="subcategory_process.php" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>select Brand</label>
                                                        <select class="form-control select2" name="categoryid" style="width: 100%;">
                                                            <option disabled>select Brand</option>
                                                            <?php
                                                            include_once('include/config.php');
                                                            $subqry = "SELECT * FROM category";
                                                            $subres = mysqli_query($conn, $subqry);
                                                            while ($subrows = mysqli_fetch_row($subres)) {
                                                            ?>

                                                                <option value="<?php echo $subrows[0]; ?>" <?php 
                                                                if($subrows[0] === $row['categoryid']){
                                                                    echo "selected";
                                                                } else{
                                                                    echo "";
                                                                } ?>><?php echo $subrows[1]; ?>
                                                               </option>
                                                            <?php
                                                                echo $row['categoryid']. "<br>";
                                                                echo $subrows[0];
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <label for="exampleInputEmail1">subcategory name </label>
                                                        <input type="text" value="<?php echo $row["subcategoryname"]; ?>" name="subcategoryname" class="form-control" id="exampleInputEmail1" placeholder="Enter subcategory name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                                        <label for="price">Price </label>
                                                        <input type="text" value="<?php echo $row["price"]; ?>" name="price" class="form-control" id="price" placeholder="Enter Price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">subcategory Image</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="subcategoryimage">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                                    file</label>
                                                            </div>
                                                            <div>
                                                                <img class="image-disp" src="../images/subcategory/<?php echo $row["subcategoryimage"]; ?>" alt="" height="200px " width="200px">
                                                            </div>
                                                        </div>
                                                    </div>


                                                   


                                                    <div class="form-group">
                                                        <input type="hidden" name="description">
                                                        <label for="exampleInputEmail1">Description</label>
                                                        <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter subcategory description"><?php echo $row['description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-footer col-md-2">
                                                    <button type="submit" name="submit" value="edit" class="btn btn-primary col-md-12">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
            <?php
            include('./common/footer.php')
            ?>
        </div>
        <?php
        include('./common/script.php')
        ?>
        <!-- <script>
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
        </script> -->
    </body>

    </html>
<?php
}
?>
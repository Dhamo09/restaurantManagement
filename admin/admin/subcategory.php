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
        <title>Ttexi Services | subcategory</title>
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
                                    <li class="breadcrumb-item active">subcategory</li>
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
                                            <form method="post" action="subcategory_process.php" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>select category</label>
                                                        <select class="form-control select2" name="categoryid" style="width: 100%;">
                                                            <option selected disabled>Select category</option>
                                                            <?php
                                                            include_once('include/config.php');
                                                            $qry = "SELECT * FROM category";
                                                            $res = mysqli_query($conn, $qry);
                                                            while ($row = mysqli_fetch_row($res)) {
                                                            ?>
                                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">subcategory name </label>
                                                        <input type="text" name="subcategoryname" class="form-control" id="exampleInputEmail1" placeholder="Enter subcategory name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">subcategory Image</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="subcategoryimage">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Price </label>
                                                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Description</label>
                                                        <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter subcategory description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" name="submit" value="add" class="btn btn-primary col-md-12">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
                <section>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>category Name</th>
                                        <th>subcategory Name</th>
                                        <th>subcategory Image</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('include/config.php');
                                    $catcount = 1;
                                    $qry = "SELECT * FROM subcategory";
                                    $res = mysqli_query($conn, $qry);
                                    while ($row = mysqli_fetch_assoc($res)) {

                                        $braqry = "SELECT * FROM category WHERE id='" . $row['categoryid'] . "'";
                                        
                                        $brares = mysqli_query($conn, $braqry);
                                        $brarow = mysqli_fetch_row($brares);
                                    ?>
                                        <tr>
                                            <td><?php echo $catcount; ?></td>
                                            <td><?php echo $brarow[1]; ?></td>
                                            <td><?php echo $row['subcategoryname']; ?></td>
                                            <td><a href="<?php echo '../images/subcategory/' . $row['subcategoryimage']; ?>" target="_blank"><img src="<?php echo '../images/subcategory/' . $row['subcategoryimage']; ?>" height="100px" width="100px" alt="image of subcategory"></a></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><a href="subcategory_edit.php?id=<?php echo $row['id']; ?>&val=edit"><i class="fas fa-edit"></i></a></td>
                                            <td><a href="subcategory_process.php?id=<?php echo $row['id']; ?>&val=del"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    <?php
                                        $catcount++;
                                    }
                                    ?>
                                </tbody>
                              
                            </table>
                        </div>
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
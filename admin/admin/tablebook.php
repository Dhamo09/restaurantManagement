<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Texi Services| Contact Us</title>
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
                            <h1 class="m-0">Booked Table</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Booked Table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Person</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('include/config.php');
                                    $catcount = 1;
                                    $qry = "SELECT * FROM tablebook";
                                    $res = mysqli_query($conn, $qry);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $catcount; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['person']; ?></td>
                                            <td><?php echo $row['date']; ?></td>

                                            <!-- <td><a href="contact_edit.php?id=<?php echo $row['ID']; ?>" class="btn btn-info">Edit</a></td> -->
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
</body>

</html>
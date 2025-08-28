<?php
include_once('include/config.php');
if (isset($_POST['submit']) && $_POST['submit'] == "add") {
    extract($_POST);
    $filename = $_FILES['subcategoryimage']['name'];
    $newname = time() . '-' . $filename;
    $path = '../images/subcategory/' . $newname;
    if (move_uploaded_file($_FILES['subcategoryimage']['tmp_name'], $path)) {
        $catqry = "INSERT INTO subcategory (categoryid,subcategoryname,price,subcategoryimage,description) VALUES ('" . $categoryid . "','" . $subcategoryname . "','" . $price . "','" . $newname . "','" . $description . "')";
        mysqli_query($conn, $catqry);
        header("location:subcategory.php");
    }
} 
// else if ($_REQUEST["val"] == 'del') {
//     extract($_REQUEST);
//     $cquery = "SELECT * FROM subcategory WHERE ID='" . $id . "'";
//     $cres = mysqli_query($conn, $cquery);
//     $drow = mysqli_fetch_assoc($cres);
//     $dpath = "../images/subcategory/" . $drow['subcategoryimage'];
//     unlink($dpath);
//     $catqry = "DELETE FROM subcategory WHERE id='" . $id . "'";
//     $res = mysqli_query($conn, $catqry);
//     header("location:subcategory.php");
// } 
else if (isset($_REQUEST["val"]) && $_REQUEST["val"]== 'del') {
    extract($_REQUEST);
    $cquery = "SELECT * FROM subcategory WHERE id='" . $id . "'";
    $cres = mysqli_query($conn, $cquery);
    $drow = mysqli_fetch_assoc($cres);
    $dpath = "../images/subcategory/" . $drow['subcategoryimage'];
    unlink($dpath);
    $qry = "DELETE FROM subcategory WHERE id='" . $id . "'";
    $res = mysqli_query($conn, $qry);
    header("location:subcategory.php");
}

elseif (isset($_POST['submit']) && $_POST['submit'] == "edit") {
    if ($_FILES['subcategoryimage']['name'] == NULL) {
        extract($_POST);
        $catqry = "UPDATE subcategory SET categoryid='" . $categoryid . "',price='" . $price . "',subcategoryname='" . $subcategoryname . "',description='" . $description . "' WHERE id='" . $id . "'";
        $res = mysqli_query($conn, $catqry);
        header("location:subcategory.php");
    } else {
        extract($_POST);
        extract($_FILES);
        print_r($_POST);
        $cquery = "SELECT * FROM subcategory WHERE id='" . $id . "'";
        $cres = mysqli_query($conn, $cquery);
        $drow = mysqli_fetch_assoc($cres);
        $dpath = "../images/subcategory/" . $drow['subcategoryimage'];
        unlink($dpath);
        $filename = $_FILES['subcategoryimage']['name'];
        $newname = time() . '-' . $filename;
        $path = '../images/subcategory/' . $newname;
        if (move_uploaded_file($_FILES['subcategoryimage']['tmp_name'], $path)) {
            $qry = "UPDATE subcategory SET categoryid='" . $categoryid . "',price='" . $price . "',subcategoryname='" . $subcategoryname . "',subcategoryimage='" . $newname . "',description='" . $description . "' WHERE id='" . $id . "'";
            $res = mysqli_query($conn, $qry);
            header("location:subcategory.php");
        }
    }
} else {
    echo "not add";
}

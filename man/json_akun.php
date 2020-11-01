<?php
if ($_POST['id']) {
    include("../system/connect.php");
    $id = $_POST['id'];
    $query = "SELECT * FROM user WHERE id = '$id'";
    $sql = mysqli_query($connection, $query);
    $data = mysqli_fetch_array($sql);
    echo json_encode($data);
}

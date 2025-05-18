<?php
 require_once "../../config/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $conn->query("delete from comment where id = $id");
    header('location: http://localhost/myblog/admin-panel/comments/comments.php');
}else{
    header('location:http://localhost/myblog/404.php');

}
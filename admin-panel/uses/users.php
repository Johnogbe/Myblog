<?php require_once "../../config/config.php";?>
<?php require_once "../layouts/header.php";?>
<?php 
$query = 'select * from users';
$select = $conn->prepare($query);
$select->execute();
$result = $select->fetchAll(PDO::FETCH_ASSOC);
?>
<table class='table table-hover w-75'>
    <thead class='thead-light'>
<tr>
    <th>s/n</th>
    <th>username</th>
    <th>email</th>
</tr>
</thead>
<tbody>
    <?php foreach($result as $row){?>
        <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['username']?></td>
    <td><?php echo $row['email']?></td>
    </tr>
    <?php }?>
    </tbody>
</table>
<?php require_once "../layouts/footer.php";?>

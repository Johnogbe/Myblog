
<?php require_once "includes/header.php" ?>
<?php require_once "config/config.php" ?>
<?php 
if (isset($_POST['search'])) {
    if (empty($_POST['search'])) {

        echo "<div class='alert alert-danger text-center bg-dark'>please type a search keyword</div>";
        header('location: index.php');
    }else{
        $search = $_POST['search'];
        $data = $conn->query("select * from post where title like '%$search%' and status =1");
        $data->execute();
        $rows = $data->fetchAll(PDO::FETCH_ASSOC);
        if ($data->rowCount() == 0) {
           echo "<div class='alert alert-danger text-center bg-dark text-white'>no post with this search for now </div>";
        }
    }
}else{
    header('location: index.php');
}
?>
 <div class="row gx-4 gx-lg-5 justify-content-center">
                <?php// echo $_SESSION['username']?>
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php 
                    if (count($rows) > 0) {
                    ?>
                    <div> Numbers Of Post: <?php echo count($rows)?></div>
                    <?php }?>
                    <?php foreach ($rows as $row){ ?>


                    <div class="post-preview">
                        <a href="http://localhost/myblog/post/post.php?post_id=<?php echo $row['id']?>">
                            <h2 class="post-title"><?php echo $row['title']?></h2>
                            <h3 class="post-subtitle"><?php echo $row['subtitle']?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $row['username']?></a>
                            <?php echo date('M',strtotime( $row['create_at'])).','. date('d',strtotime( $row['create_at'])).','. date('Y',strtotime( $row['create_at']))?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php };?>
                    
                    <!-- Pager-->
           
                </div>
            </div>
<?php require_once "includes/footer.php" ?>
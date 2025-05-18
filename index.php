<?php 
require_once "includes/header.php";
require_once "config/config.php";?>
<?php
    $query = 'select * from post where status = 1 limit 6';
$stmt = $conn->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categories = 'select * from category';
$stmt = $conn->prepare($categories);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);


 ?><div class="row gx-4 gx-lg-5 justify-content-center">
                <?php// echo $_SESSION['username']?>
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
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
            <div class="row gx-4 gx-lg-5 justify-content-center">
            <h3>categories</h3><br><br><br>
            <?php foreach($category as $cat){?>
                <div class="col-md-6">
                <a href="http://localhost/myblog/categories/category.php?cat_id=<?php echo $cat['id']?>">
                <div class="alert alert-dark bg-dark text-center text-white"> <?php echo $cat['name']?></div></a>
                </div>
            <?php } ?> 
            </div>
<?php require_once "includes/footer.php"?>
<?php include_once('./src/layouts/header.php'); ?>
<h1>Blogs</h1>
<div class="row ab-info second pt-lg-4">
<?php
foreach($this->data as $post){
?>
<div class="col-lg-4 col-sm-6 ab-content text-center mt-lg-0 mt-4">
    <div class="ab-content-inner">
        <img src="./src/assets/images/t1.jpg" alt="news image" class="img-fluid">
        <div class="ab-info-con">
            <h4 class="text-team-w3"><?=$post->post_title?></h4>
            <p><?=$post->post_content?></p>
        </div>
    </div>
</div>
<?php } ?>
</div>
<div class="clearfix"></div>
<?php include_once('./src/layouts/footer.php');?>
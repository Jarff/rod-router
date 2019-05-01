<?php include_once('./src/layouts/metas.php');?>
<div class="container">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-push-6 col-md-push-6">
        <form action="./login" method="post">
            <div class="form-group">
                <label for="name">Username</label>
                <input class="form-control" type="email" id="name" name="username">
            </div>
            <div class="form-group">
                <label for="password">PAssword</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <input class="btn btn-large" type="submit" value="Submit">
        </form>
    </div>
</div>
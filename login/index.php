<?php
require_once '../config/config.php';



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('core/public/boostrap/css/bootstrap.css')?>"
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="top: 100px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-lock"></i> Login to Dashboard</div>
                <div class="panel-body">
                             <form action="" method="post">
                                <div class="form-group form-group-sm">
                                  <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="usernmae">

                                 </div>
                                 <div class="form-group form-group-sm">
                                     <label for="password">Password</label>
                                     <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                 </div>
                                 <div class="form-group form-group-sm">
                                     <button class="btn btn-success">Login</button>
                                 </div>
                             </form>
                            </div>
                    </div>
        </div>
    </div>
</div>
</body>

</html>

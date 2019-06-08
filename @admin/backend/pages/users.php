<?php
$query="SELECT * FROM users ORDER BY uid DESC ";
$result=mysqli_query($connection,$query);

//status update=====
if(isset($_POST['active'])){
    $criteria=$_POST['criteria'];
    $status=0;
    $updatestatusquery="UPDATE users SET status='$status' where uid='$criteria'";
    $upresponse=mysqli_query($connection,$updatestatusquery);
    if($upresponse==true){
        $_SESSION['success']='status is inactive';
        redirect_back();
    }
}

if(isset($_POST['inactive'])){
    $criteria=$_POST['criteria'];
    $status=1;
    $updatestatusquery="UPDATE users SET status='$status' where uid='$criteria'";
    $upresponse=mysqli_query($connection,$updatestatusquery);
    if($upresponse==true){
        $_SESSION['success']='status is active';
        redirect_back();
    }
}


//user type update=====
if(isset($_POST['admin'])){
    $criteria=$_POST['criteria'];
    $usertype='user';
    $updatestatusquery="UPDATE users SET user_type='$usertype' where uid='$criteria'";
    $upresponse=mysqli_query($connection,$updatestatusquery);
    if($upresponse==true){
        $_SESSION['success']='user';
        redirect_back();
    }
}

if(isset($_POST['user'])){
    $criteria=$_POST['criteria'];
    $usertype='admin';
    $updatestatusquery="UPDATE users SET user_type='$usertype' where uid='$criteria'";
    $upresponse=mysqli_query($connection,$updatestatusquery);
    if($upresponse==true){
        $_SESSION['success']='admin';
        redirect_back();
    }
}

//=================delete users================
if(isset($_POST['delete_user'])) {
    $criteria = $_POST['criteria'];
    $query = "SELECT * FROM users WHERE uid='$criteria' ";
    $getresponse = mysqli_query($connection, $query);
    $finduserdata = mysqli_fetch_assoc($getresponse);
    $findname = $finduserdata['image'];
    $deletepath = public_path('upload/images/users/' . $findname);
    if (file_exists($deletepath) && is_file($deletepath)) {
        unlink($deletepath);
    }

//=================delete query==============
    $delquery = "DELETE FROM users WHERE uid='$criteria'";
    $delresponse = mysqli_query($connection, $delquery);
    if ($delresponse == true) {
        $_SESSION['success'] = "successfully deleted";
        redirect_back();
    } else {
        $_SESSION['error'] = "There is a problem";
        redirect_back();
    }
}


//==================edit user===============
if(isset($_POST['edit_user'])){
    $criteria=$_POST['criteria'];
    $query = "SELECT * FROM users WHERE uid='$criteria' ";
    $getresponse = mysqli_query($connection, $query);
    $userdata = mysqli_fetch_assoc($getresponse);

}




















?>

<div class="container-fluid">
    //!content
<?php if(isset($_POST['edit_user'])): ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fa fa-edit"></i>Edit user </h1>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="form-group form-group-sm">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?=$userdata['name']?>" placeholder="Enter Name" class="form-control">
                        </div>


                        <div class="form-group form-group-sm">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?=$userdata['username']?>" placeholder="Enter Username" class="form-control">
                        </div>


                        <div class="form-group form-group-sm">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" value="<?=$userdata['email']?>" placeholder="Enter Email" class="form-control">
                        </div>



                        <div class="form-group form-group-sm">
                            <label for="user_type">User Type</label>
                            <select name="user_type" id="user_type" class="form-control" >
                                <option disabled selected ><?=$userdata=['user_type']?></option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>


                        <div class="form-group form-group-sm">
                            <label for="image">Image</label>
                            <input type="file" name="upload" class="btn btn-default">
                        </div>
                    <div class="col-md-12">
                        <div class="form-group form-group-sm">
                            <button class="btn btn-info">Edit User</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <img src="<?=base_url('public/upload/images/users/'.$userdata['image'])?>" class="img-responsive">
            </div>

        </div>
    </div>
    <?php else:?>
    <div class="content">
        <h1 ><i class="fa fa-users"></i>Show User</h1>
        <?=messages();?>
        <hr>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key=>$users ):?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?=$users['name']?></td>
                <td><?=$users['username']?></td>
                <td><?=$users['email']?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="criteria" value="<?=$users['uid']?>">
                            <?php if($users['user_type']=='admin'): ?>
                                <button name="admin" class="btn btn-info btn-xs">Admin</i> </button>
                            <?php else: ?>
                                <button name="user" class="btn btn-danger btn-xs">Users</i> </button>

                            <?php endif;?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" value="<?=$users['uid']?>" name="criteria">
                        <?php if($users['status']==1): ?>
                        <button  name="active"  class="btn btn-info btn-xs"><i class="fa fa-check"></i> </button>
                         <?php else: ?>
                        <button name="inactive" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </button>

                         <?php endif;?>
                    </form>
                </td>
                <td><img src="<?=base_url('core/public/upload/images/users/'.$users['image'])?>" alt="" width="30"></td>
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="criteria" value="<?=$users['uid']?>">
                    <button name="edit_user" class="btn btn-info btn-xs" title="Edit users"><i class="fa fa-edit"></i> </button>
                      <button name="delete_user" class="btn btn-danger btn-xs" title="Delete users"><i class="fa fa-trash"></i> </button>

                  </form>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?php endif;?>
</div>

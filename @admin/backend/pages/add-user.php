<?php

if(!empty($_POST)&& $_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['password_confirm']);
    $usertype = isset($_POST['user_type']) ? $_POST['user_type'] : '';

    if ($password != $cpassword) {
        $_SESSION['error'] = "password not match";
        redirect_back();

    }


//=======file upload=======

    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $ext;
    $tmpName = $_FILES['upload']['tmp_name'];
    $error = $_FILES['upload']['error'];

    $uploadpath = public_path('upload/images/users/');

    

    if ($error == 0) {
        if (!move_uploaded_file($tmpName,$uploadpath . $imageName)) {
            $_SESSION['error'] = 'Image upload error';
        }
        $image = $imageName;
    }

    $query = "INSERT INTO users(name,username,email,password,user_type,image)
        VALUES ('$name','$username','$email','$password','$usertype','$image')";
    $results = mysqli_query($connection, $query);
    if ($results == true) {
        $_SESSION['success'] = 'Data is successfully inserted';
        redirect_to('core/@admin/users');
    } else {
        $_SESSION['error'] = 'There is a problem';
        redirect_back();
    }

}
?>
<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>Add User</h1>
                <hr>
                <?=messages()?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                         <div class="form-group form-group-sm">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter Username" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group form-group-sm">
                             <label for="email">Email</label>
                             <input type="text" id="email" name="email" placeholder="Enter Email" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="password">Password</label>
                                 <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control">
                             </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group form-group-sm">
                                <label for="password_confirm">Password Confirm</label>
                             <input type="password" id="password_confirm" name="password_confirm" placeholder="Password Confirm" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                             <label for="user_type">User Type</label>
                                <select name="user_type" id="user_type" class="form-control">
                                    <option disabled selected>--user type--</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                 </select>
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group form-group-sm">
                             <label for="image">Image</label>
                             <input type="file" name="upload" class="btn btn-default">
                         </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group form-group-sm">
                                <button class="btn btn-info">Add User</button>
                             </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

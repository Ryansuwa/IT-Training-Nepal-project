<div class="nav">
    <div class="nav-top">
        <img src="public_html/Assets/images/faces/1a.png">
        <h4>Alex</h4>
        <p>alex@gmail.com</p>
    </div>

    <div class="navlinks">
        <div class="search-box">
            <form>
                <input type="text" class="search" placeholder="Search">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li><a href="<?=admin_url()?>"><i class="glyphicon glyphicon-cloud"> </i> Dashboard</a></li>

                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  Users</a>
                    <ul>
                        <li><a href="<?=admin_url('add-user')?>"><i class="fa fa-plus"></i> Add User</a></li>
                        <li><a href="<?=admin_url('users')?>"><i class="fa fa-user"></i> Users</a></li>
                    </ul>
                </li>


                <li><a href="<?=admin_url('logout.php')?>"><i class="glyphicon glyphicon-log-out"> </i>  Log Out</a></li>
            </ul>
        </div>
    </div>
</div><!--end of navigation-->

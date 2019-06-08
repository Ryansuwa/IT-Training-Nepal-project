<?php
require_once "config/config.php";

$url=isset($_GET['url']) ? $_GET['url']:'home';
$url=str_replace('.php','', $url);
$url.=".php";

?>
<?php
    require_once root_path('core/frontend/layouts/header.php');
   require_once root_path('core/frontend/layouts/top-header.php');
   require_once root_path('core/frontend/layouts/nav.php');
?>
<?php
$pagepath=root_path('core/frontend/pages/'.$url);

if(file_exists($pagepath)&& is_file($pagepath)){


    require_once $pagepath;
}else{
    require_once root_path('core/public/help/404.php');
}
    ?>
<?php require_once root_path(

    'core/frontend/layouts/footer.php')?>

<?php
require_once "../config/config.php";

// ========require database===========

require_once '../config/database.php';

$url=isset($_GET['url']) ? $_GET['url']:'dashboard';
$url=str_replace('.php','', $url);
$url.=".php";
$title=$url;

?>
<?php
require_once root_path('core/@admin/backend/layout/header.php');
require_once root_path('core/@admin/backend/layout/top-header.php');
require_once root_path('core/@admin/backend/layout/nav.php');
?>
<?php
$pagepath=root_path('core/@admin/backend/pages/'.$url);

if(file_exists($pagepath)&& is_file($pagepath)){


    require_once $pagepath;
}else{
    require_once root_path('core/@admin/public/help/404.php');
}
?>
<?php require_once root_path('core/@admin/backend/layout/footer.php')?>

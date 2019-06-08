 <?php
session_start();
error_reporting(E_ALL);
error_reporting('-1');
if(!function_exists('root_path')){
    function root_path($path=null)

    {
        $docRoot=$_SERVER['DOCUMENT_ROOT'];
        $path=trim($path,'/');
        $documentpath=$docRoot.'/'.$path;
        return $documentpath;
    }
}

if(!function_exists('base_url')){
    function base_url($uri=null)

    {
        $urlpath="http://".$_SERVER['SERVER_NAME'];
        $uri=trim($uri,'/');
        $baseurlpath=$urlpath.'/'.$uri;
        return $baseurlpath;

    }
}

// =================for dashboard==============
if(!function_exists('admin_url')){
    function admin_url($uri=null)

    {

        $uri=trim($uri,'/');
        $baseurlpath=base_url('core/@admin/'.$uri);
        return $baseurlpath;

    }
}


if(!function_exists('redirect_back')){
    function redirect_back(){
        $httpReferer=getallheaders();

        if(isset($httpReferer['REFERER'])){
            header('Location:'.$httpReferer['REFERER']);
            return $this;
        }
        return false;
    }
}



if(!function_exists('redirect_to')){
    function redirect_to($path=null){
       $path=trim($path,'/');
       $path=$path.'/';
       $redirectpath=base_url($path);
       header('Location:'.$redirectpath);
       exit();
    }
}

if(!function_exists('messages')){
    function messages(){
       if(isset($_SESSION['success'])){
          $class="alert alert-success";
            $message=$_SESSION['success'];
           unset($_SESSION['success']);

       }
       if(isset($_SESSION['error'])){
           $class="alert alert-danger";
           $message=$_SESSION['error'];
           unset($_SESSION['error']);
        }

        $output='';
       if(isset($message)){
            $output.="<div class='{$class}'>";
           $output.=$message;
            $output.="</div>";

        }
        return $output;
    }
}


if(!function_exists('public_path')){
    function public_path($path=null){
        $docRoot=$_SERVER['DOCUMENT_ROOT'];
        $publicpath=$docRoot.'/core/public/'.$path;
        return $publicpath;
    }
}





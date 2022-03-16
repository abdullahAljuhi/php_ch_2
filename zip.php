<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> zip </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    Select image to upload:
    <input type="file" name="zip" id="zip">
    <input type="submit" value="Upload zip" name="submit">
</form>
<?php

require 'tree.php';

// check  if submit
if(isset($_POST["submit"])){
    // get file name 
    $file_name=$_FILES['zip']['name'];

    // get seprated filename
    $file_arr = explode(".",$file_name);

    // get extention 
    if($file_arr[count($file_arr)-1]=='zip'){
        $finName=$file_arr[0];

        // enstance of zipArchive
        $zip= new zipArchive();

        if($zip->open($_FILES['zip']["tmp_name"])){

            // create rand name of folder
            $r=time();
            
            $zip->extractTo("./upload/$r");

            $zip->close();
            $path="./upload/$r/";
            // $files=opendir("./upload/$r/");
            // $pathScan="./upload/$r/";
            getDirectory($path); 

        }else{
            echo "this is not zip file";
        }
    }
}

?>
</body>
</html>
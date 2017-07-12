<?php
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("db");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="File not allowed, please choose a DB file.";
    }

    if($file_size > 2097152) {
        $errors[]='File size must be exactly 2 MB';
    }

    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"data/".$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}
?>

<form action = "" method = "POST" enctype = "multipart/form-data">
    <input type = "file" name = "image"/>
    <input type = "submit" value="Upload"/>

    <h2>Backup DB lama bila perlu, DB yang diupload otomatis direplace/overwrite</h2>
    <ul>
        <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
        <li>File size: <?php echo $_FILES['image']['size'];  ?>
        <li>File type: <?php echo $_FILES['image']['type'] ?>
    </ul>

</form>


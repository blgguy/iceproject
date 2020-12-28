<?php

require('admin.config.inc.php');

if(isset($_POST['upload'])){
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $path = "/home/********/public_html/StagConnect/admin/pictures/$image_name";

    if($image_name==''){
    echo "Don't just click! select an image please .";
    exit();
    }
    else{
    move_uploaded_file($image_tmp_name, $path);
    $mysql_path = $path."/".$image_name;
    $query = "INSERT INTO `admin`(`admin_image1`,`path1`) VALUES ('$image_name','$mysql_path') where username = :user";

    $query_params = array(
    ':user' => $_POST['username'],
        ':image_name' => $image_name,
        ':mysql_path' => $path,
        );

    //execute query
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());

        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Database Error. Couldn't Upload Image!";
        die(json_encode($response));
    }

    $response["success"] = 1;
    $response["message"] = "Image Uploaded Succesfully!";
    echo json_encode($response);
   }
    }   
    ?>

<form action="adminProfilePic.php" method="post" enctype="multipart/form-data">
Username: <input type="text" name="username">
<input type="file" name="image" >

<input type="submit" name="upload" value="Submit" >
</form>
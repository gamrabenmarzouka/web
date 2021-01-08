<?php

function generate_filename($size)
{
    // A 65, a 97
    $str = "";
    for ($i = 0; $i < $size; $i++) {
        $tc = rand(0, 2);
        if ($tc == 0) {
            $val = rand(48, 57);
        } else if ($tc == 1) {
            $val = rand(65, 90);
        } else if ($tc == 2) {
            $val = rand(97, 112);
        }
        $str .= chr($val);
    }
    return $str;
}

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagejpeg($dst, $file, 60);
}

function upload_file($target_dir, $name, $tmp_name, $filesize)
{
    $target_file = $target_dir . basename($name);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        $check = getimagesize($tmp_name);
        if ($check === false) {
            throw new Exception("File is not an image.");
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        throw new Exception("Sorry, file already exists.");
    }

    // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 1024 * 1024) {
    if ($filesize > 1024 * 1024) {
        throw new Exception("Sorry, your file is too large.");
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    list($width, $height) = getimagesize($tmp_name);
    resize_image($tmp_name, 600, 480);

    // Check if $uploadOk is set to 0 by an error
    if (!move_uploaded_file($tmp_name, $target_file)) {
        throw new Exception("Sorry, there was an error uploading your file.");
    }
}

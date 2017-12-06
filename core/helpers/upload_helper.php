<?php





function get_extension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return strtolower($ext);
}





function upload_image($newname, $file, $folder = null)
{
    if ($folder == null) {
        $newpath = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
        "uploads/images/" . $newname; //change it ya man
    } else {
        $newpath = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
        "uploads/images/".$folder."/" . $newname; //change it ya man
    }
    

    $thumb = resize_image($newname, $file, 100, 70);
    $thumb2 = resize_image($newname, $file, 144, 221);
    if (@move_uploaded_file($file, $newpath)) {
        $new_main_image = resize_image($newname, $newpath, 600, 600);
        imagejpeg($new_main_image, str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
            "uploads/images/" . $newname, 100);
        imagejpeg($thumb, str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
            "uploads/images/thumb_" . $newname, 100);
        imagejpeg($thumb2, str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
            "uploads/images/thumb2_" . $newname, 100);
    } else {
    } // move_uploaded_file
}

function upload_video($newname, $file)
{
    $newpath = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
        "uploads/videos/" . $newname; //change it ya man

    
    if (@move_uploaded_file($file, $newpath)) {
        return true;
    } else {
        return false;
    } // move_uploaded_file
}
function upload_file($newname, $file)
{
    $newpath = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']) .
        "uploads/files/" . $newname; //change it ya man

    
    if (@move_uploaded_file($file, $newpath)) {
        return true;
    } else {
        return false;
    } // move_uploaded_file
}

// resize image
function resize_image($filename, $tmpname, $xmax, $ymax)
{
    $ext = explode(".", $filename);
    $ext = $ext[count($ext) - 1];

    if ($ext == "jpg" || $ext == "jpeg") {
        $im = imagecreatefromjpeg($tmpname);
    } elseif ($ext == "png") {
        $im = imagecreatefrompng($tmpname);
    } elseif ($ext == "gif") {
        $im = imagecreatefromgif($tmpname);
    }

    $x = imagesx($im);
    $y = imagesy($im);

    if ($x <= $xmax && $y <= $ymax) {
        return $im;
    }

    if ($x >= $y) {
        $newx = $xmax;
        $newy = $newx * $y / $x;
    } else {
        $newy = $ymax;
        $newx = $x / $y * $newy;
    }

    $im2 = imagecreatetruecolor($newx, $newy);
    imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);
    return $im2;
}

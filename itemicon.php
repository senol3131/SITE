<?php


if (isset($_GET['num'])) {

    $num = intval($_GET['num']);

    $img_num =  substr($num,0,1) . "_" . substr($num,1,4) . "_" . substr($num,5,1). "0_0.jpg";

	
    $file = 'theme/fusion/inventory/itemicon/'.$img_num;
    if (file_exists($file)) {
        header('Content-Type: image/jpeg');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }else {
        $file = 'theme/fusion/inventory/itemicon/0.jpg';
        header('Content-Type: image/jpeg');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }
}


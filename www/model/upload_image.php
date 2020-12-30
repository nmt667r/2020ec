<?php

function upload_image($IMG){
    $extension = pathinfo($IMG['img']['name'], PATHINFO_EXTENSION);
    $generate_name = sha1(uniqid(mt_rand(), true)). '.' . $extension;
    move_uploaded_file($IMG['img']['tmp_name'], ITEMS_IMG_DIR . $generate_name);
    return $generate_name;
}


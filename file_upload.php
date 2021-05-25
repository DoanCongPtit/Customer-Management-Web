<?php

function getFileUploaded()
{
    if ($_FILES['img_upload']['error'] > 0) {
        return "Upload lỗi rồi!";
    }
    $destinationPath = 'upload/' . $_FILES['img_upload']['name'];
    move_uploaded_file($_FILES['img_upload']['tmp_name'], '../upload/' . $_FILES['img_upload']['name']);
    $path = $destinationPath;
    return $path;
}

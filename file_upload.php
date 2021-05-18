<?php

function getFileUploaded()
{
    if ($_FILES['img_upload']['error'] > 0) {
        return "Upload lỗi rồi!";
    }
    move_uploaded_file($_FILES['img_upload']['tmp_name'], 'upload/' . $_FILES['img_upload']['name']);
    $path = "upload/" . $_FILES['img_upload']['name'];
    return $path;
}

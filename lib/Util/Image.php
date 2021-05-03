<?php
abstract class Image
{
    public static function save($file)
    {
        $target = "img/prods/" . $file['name'];

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        $fileExtension = explode('.', $file['name']);
        $fileExtension = strtolower(end($fileExtension));

        if ($file['error'] == 0) {
            if ($file['size'] < 7000000) {
                if (in_array($fileExtension, $allowed)) {
                    move_uploaded_file($file['tmp_name'], $target);
                }
            }
        }
    }

    public static function delete($id)
    {

        $prod = Product::selectWhere($id);

        $prodImageName = $prod['prod_image'];

        $filePath = 'img/prods/' . $prodImageName;

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public static function update($id, $file)
    {
        Image::delete($id);

        Image::save($file);
    }
}

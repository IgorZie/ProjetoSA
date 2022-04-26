<?php

require_once "vendor/autoload.php";

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(['driver' => 'gd']);

$image = Image::make($_FILES['imagem']['tmp_name'])->resize(348, 500);

$image->save('Uploads/teste.jpg', 60);

?>
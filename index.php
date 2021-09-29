<?php

$file = "img/imagem.png";

$width = 200;
$height = 200;

list($original_width, $original_height) = getimagesize($file); // obtem tamanho de uma imagem

$ratio = $original_width / $original_height;

if($width/$height > $ratio) {
    $width = $height * $ratio;
} else {
    $height = $width * $ratio;
}

$final_image = imagecreatetruecolor($width, $height);
$original_image = imagecreatefrompng($file);

imagecopyresampled($final_image, $original_image, 
        0, 0, 0, 0,
        $width, $height, $original_width, $original_height);

# imagejpeg($final_image, null, 100); definindo qualidade no terceiro parametro para imagens jpeg

header("Content-Type: imagem/png"); // tratar o arquivo php como uma imagem
imagepng($final_image, null); // mostrar imagem
imagepng($final_image, "mini_img.png"); // salvando imagem

?>
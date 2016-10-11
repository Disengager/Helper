<?php
  /*
  $x_o и $y_o - координаты левого верхнего угла выходного изображения на исходном
  $w_o и h_o - ширина и высота выходного изображения
  */
  function crop($image, $x_o, $y_o, $w_o, $h_o) {
    if (($x_o < 0) || ($y_o < 0) || ($w_o < 0) || ($h_o < 0)) {
      echo "Некорректные входные параметры";
      return false;
    }
    $old = $w_o;

    $src=ImageCreateFromJPEG ($image);
    $size=GetImageSize ($image);
    $iw=$size[0];
    $ih=$size[1];
    for($i = 1; $i < 300; $i++)
    {
      $koe=$iw/$w_o;
      $new_h=ceil ($ih/$koe);
      if($new_h >= $h_o)
        break;
      $w_o++;
    }
    
    $dst=ImageCreateTrueColor ($old, $new_h);
    ImageCopyResampled ($dst, $src, 0, 0, 0, 0, $w_o, $new_h, $iw, $ih);
    ImageJPEG ($dst, $image, 100);

    $w_o = $old;
    
  
  }
  crop("maxresdefault.jpg", 0, 0, 200, 300); // Вызываем функцию
?>
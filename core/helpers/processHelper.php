<?php

function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
	    $rutaImagenOriginal = $ruta.$nombre;
	   
	    if($extension == 'GIF' || $extension == 'gif'){
	        $img_original = imagecreatefromgif($rutaImagenOriginal);
	    }
	    
	    if($extension == 'jpg' || $extension == 'JPG'){
	        $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	    }
	    
	    if($extension == 'png' || $extension == 'PNG'){
	        $img_original = imagecreatefrompng($rutaImagenOriginal);
	    }
	    
	    $max_ancho = $ancho;
	    $max_alto = $alto;
	    
	    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	    
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;
	    
	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
	  	    $ancho_final = $ancho;
			$alto_final = $alto;
		} elseif (($x_ratio * $alto) < $max_alto){
			$alto_final = ceil($x_ratio * $alto);
			$ancho_final = $max_ancho;
		} else{
			$ancho_final = ceil($y_ratio * $ancho);
			$alto_final = $max_alto;
		}

	    $tmp=imagecreatetruecolor($ancho_final,$alto_final);
	    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	    imagedestroy($img_original);
	    $calidad=70;
	    imagejpeg($tmp,$ruta.$nombreN,$calidad);
	}
	

function SizeFile($File)//Calculamos el tamaño de un archivo
	{
        $Max = 800000000;
        if($File > $Max){
          return false;
        } 
        return true;
  	}


function Percentage($cantidad,$porciento){//función para calcular el porcentaje
  		return $cantidad*$porciento/100;
	}

function get_format($df) {// función para diferenciar las fechas y obtener un formato especial
    $str = '';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->y > 0) {
        // years
        $str .= ($df->y > 1) ? $df->y . ' Years ' : $df->y . ' Year ';
    } if ($df->m > 0) {
        // month
        $str .= ($df->m > 1) ? $df->m . ' Months ' : $df->m . ' Month ';
    } if ($df->d > 0) {
        // days
        $str .= ($df->d > 1) ? $df->d . ' Days ' : $df->d . ' Day ';
    } if ($df->h > 0) {
        // hours
        $str .= ($df->h > 1) ? $df->h . ' Hours ' : $df->h . ' Hour ';
    } if ($df->i > 0) {
        // minutes
        $str .= ($df->i > 1) ? $df->i . ' Minutes ' : $df->i . ' Minute ';
    } if ($df->s > 0) {
        // seconds
        $str .= ($df->s > 1) ? $df->s . ' Seconds ' : $df->s . ' Second ';
    }

    echo $str;
}

?>
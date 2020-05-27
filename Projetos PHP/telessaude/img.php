<?php
$p1 = (@$_GET['p1'] ? $_GET['p1'] : 0);
$p2 = (@$_GET['p2'] ? $_GET['p2'] : 0);
$m1 = (@$_GET['m1'] ? $_GET['m1'] : 0);
$m2 = (@$_GET['m2'] ? $_GET['m2'] : 0);
$m3 = (@$_GET['m3'] ? $_GET['m3'] : 0);
$m4 = (@$_GET['m4'] ? $_GET['m4'] : 0);
$m5 = (@$_GET['m5'] ? $_GET['m5'] : 0);
$m6 = (@$_GET['m6'] ? $_GET['m6'] : 0);
$m7 = (@$_GET['m7'] ? $_GET['m7'] : 0);
$m8 = (@$_GET['m8'] ? $_GET['m8'] : 0);
$m9 = (@$_GET['m9'] ? $_GET['m9'] : 0);
$m10 = (@$_GET['m10'] ? $_GET['m10'] : 0);
$m11 = (@$_GET['m11'] ? $_GET['m11'] : 0);
$m12 = (@$_GET['m12'] ? $_GET['m12'] : 0);

$pg = (@$_GET['pg'] ? $_GET['pg'] : null);

function addBox($img, $x, $y, $width, $height, $color=null, $colorBorder=null){
	if(!$color){ //silver
		$color = imagecolorallocate($img, 220, 220, 220);
	}
	if(!$colorBorder){
		$colorBorder = imagecolorallocate($img, 70, 70, 70);
	}

	imagefilledrectangle($img, $x, $y, $width, $height, $color);
	imagerectangle($img, $x, $y, $width, $height, $colorBorder);
}

$meses 		= array('JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ');
$widthBox	= 25;
$widthImg 	= $widthBox * count($meses) + 1;
$img 		= imagecreate($widthImg, 60);
$blue 		= imagecolorallocate( $img, 0, 0, 255 );
$yellow 	= imagecolorallocate( $img, 255, 255, 0 );
$green 		= imagecolorallocate( $img, 128, 255, 0 );
$black 		= imagecolorallocate($img, 0, 0, 0);
$black1		= imagecolorallocate($img, 70, 70, 70);
$white 		= imagecolorallocate($img, 255, 255, 255);
$silver		= imagecolorallocate($img, 200, 200, 200);

imagefill($img, 0, 0, $white);

if($p1 == 0 || $p2 == 0){
	imagestring($img, 2, 34, 25, utf8_decode("Selecione um período válido para o contrato!"), $black1);
}
else{
	for($i=0;$i<count($meses);$i++){
		$color = $white;
		if($p1 <= ($i + 1) && $p2 >= ($i + 1)){
			$color = $silver;	
			$var = 'm'.($i + 1);
			if($$var == 1){
				$color = $green;		
			}			
		}						
		addBox($img, ($i * $widthBox), 0, ($i * $widthBox) + $widthBox, 45, $color);
		imagestring($img, 2, ($i * $widthBox) + 4, 45, $meses[$i], $black1);
	}
}
header( "Content-type: image/png" );
imagepng($img);
imagedestroy($img);
?>
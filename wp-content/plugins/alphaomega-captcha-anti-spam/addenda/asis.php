<?php

$glossaenabubi = ' ';
$glossadiobubi = ' ';
$glossatriabubi = ' ';
$glossateserabubi = ' ';
$glossapentebubi = ' ';
if ( $myoptions['glossa'] === '1' ) {
	$glossaenabubi = ' checked="checked" ';
} elseif ( $myoptions['glossa'] === '2' ) {
	$glossadiobubi = ' checked="checked" ';
} elseif ( $myoptions['glossa'] === '3' ) {
	$glossatriabubi = ' checked="checked" ';
} elseif ( $myoptions['glossa'] === '4' ) {
	$glossateserabubi = ' checked="checked" ';
} elseif ( $myoptions['glossa'] === '5' ) {
	$glossapentebubi = ' checked="checked" ';
}
$tichoenakubi = ' ';
$tichodiokubi = ' ';
$tichotriakubi = ' ';
$tichoteserakubi = ' ';
$tichopentekubi = ' ';
$tichoexikubi = ' ';
$tichoeftakubi = ' ';
$tichoochtokubi = ' ';
$tichoeneakubi = ' ';
$tichodecakubi = ' ';
$tichoendecakubi = ' ';
$tichododecakubi = ' ';
$tichodecatriakubi = ' ';
$tichodecateserakubi = ' ';
$tichodecapentekubi = ' ';
$tichodecaexikubi = ' ';
$tichodecaeftakubi = ' ';
$tichodecaochtokubi = ' ';
$tichodecaeneakubi = ' ';
if ( $myoptions['titichonadixis'] === '1' ) {
	$tichoenakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '2' ) {
	$tichodiokubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '3' ) {
	$tichotriakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '4' ) {
	$tichoteserakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '5' ) {
	$tichopentekubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '6' ) {
	$tichoexikubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '7' ) {
	$tichoeftakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '8' ) {
	$tichoochtokubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '9' ) {
	$tichoeneakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '10' ) {
	$tichodecakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '11' ) {
	$tichoendecakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '12' ) {
	$tichododecakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '13' ) {
	$tichodecatriakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '14' ) {
	$tichodecateserakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '15' ) {
	$tichodecapentekubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '16' ) {
	$tichodecaexikubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '17' ) {
	$tichodecaeftakubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '18' ) {
	$tichodecaochtokubi = ' checked="checked" ';
} elseif ( $myoptions['titichonadixis'] === '19' ) {
	$tichodecaeneakubi = ' checked="checked" ';
}
$tominimatichotopos = ' ';
$tostichiotichotopos = ' ';
if ( $myoptions['dixeminimaticho'] === '1' ) {
	$tominimatichotopos = ' checked="checked" ';
}
if ( $myoptions['dixestichioticho'] === '1' ) {
	$tostichiotichotopos = ' checked="checked" ';
}
$tichotoposepano = ' ';
$tichotoposmesi = ' ';
$tichotoposkato = ' ';
$stichiotoposepano = ' ';
$stichiotoposkato = ' ';
if ( $myoptions['minimatichotopos'] === '1' ) {
	$tichotoposepano = ' checked="checked" ';
} elseif ( $myoptions['minimatichotopos'] === '2' ) {
	$tichotoposmesi = ' checked="checked" ';
} elseif ( $myoptions['minimatichotopos'] === '3' ) {
	$tichotoposkato = ' checked="checked" ';
}
if ( $myoptions['stichiotichotopos'] === '2' ) {
	$stichiotoposkato = ' checked="checked" ';
}
$stragiseonomakubi = ' ';
$stragisediefthinsikubi = ' ';
$stragisehitaftafpikubi = ' ';
$stragiseminimakubi = ' ';
if ( $myoptions['stragiseonoma'] === '1' ) {
	$stragiseonomakubi = ' checked="checked" ';
}
if ( $myoptions['stragisediefthinsi'] === '1' ) {
	$stragisediefthinsikubi = ' checked="checked" ';
}
if ( $myoptions['stragisehataftafpi'] === '1' ) {
	$stragisehitaftafpikubi = ' checked="checked" ';
}
if ( $myoptions['stragiseminima'] === '1' ) {
	$stragiseminimakubi = ' checked="checked" ';
}
if ( $myoptions['stragisekabosaminima'] === '0' ) {
	$tutostragismaparakalo = $myoptions['stragiseklisto'];
} else {
	if ( $myoptions['stragisemedikomas'] === '1' ) {
		$tutostragismaparakalo = str_replace('####', PHP_EOL, $myoptions['dikomasstragisekolona']);
	} else {
		$tutostragismaparakalo = str_replace("\\", "", str_replace('####', PHP_EOL, $myoptions['dikosustragisekolona']));
	}
}
$dikomasustragismaparakalokubipatisma = str_replace("####", "\\n", $myoptions['dikomasstragisekolona']);
if ( $myoptions['dikosustragisekolona'] === '' ) {
	$dixedikosustragismakolonakubipatisma =  $myoptions['dikosustragisekolonadenechitipotaminima'];				
} else {
	$dixedikosustragismakolonakubipatisma =  str_replace("\"", "&quot;", str_replace('####', "\\n", $myoptions['dikosustragisekolona']));
}
if ( $myoptions['nadixisdikomaskakofaniminimaapantisi'] === '1' ) {
	$kakofaniminimaapantasititlo = $myoptions['kakofaniminimaapantasititlo'];
	$kakofaniminimaapantasiminima = $myoptions['kakofaniminimaapantasiminima'];
} else {
	$kakofaniminimaapantasititlo = stripslashes($myoptions['dikosukakofaniminimaapantasititlo']);
	$kakofaniminimaapantasiminima = stripslashes($myoptions['dikosukakofaniminimaapantasiminima']);
}

?>

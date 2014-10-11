<?php
/*
Plugin Name: AlphaOmega Captcha & Anti-Spam Filter
Plugin URI: http://alphaomegaplugins.com
Description: Provides Visually Appealing Captchas to Enhance and Secure your WordPress Comment Forms and Admin Log-In. Fortified with Anti-Spam Filter Protection.
Version: 1.7
Author: AlphaOmega Plugins
Author URI: http://alphaomegaplugins.com
License: GPL2
*/


session_start();



if ( get_option( 'aostichia' ) === FALSE ) {

	include( "addenda/defstichia.php" );
	update_option( 'aostichia', $myoptions );

}

function asphaliaminimadixe () {

session_start();

include( "addenda/retop.php" ); 

if ( $myoptions['dixeminimaticho'] === '1' ) {

	if ( isset($_SESSION['minimakubipatise']) ) {

		if ( $_SESSION['minimakubipatise'] === '0' ) 
	
			$_SESSION['apantisiegrapse'] = '';

	}

	if ( $myoptions['minimatichotopos'] === '1' || $myoptions['minimatichotopos'] === '2' ) {

		echo '<div style="padding-top:15px;padding-bottom:15px;"><label for="author">' . __( $myoptions['tichoaristera'] ) . '</label> &nbsp;<img style="height:30px;vertical-align:middle" src="' . plugins_url( $myoptions['tichomichaniselida'] , __FILE__ ) . '"> &nbsp;<a href="javascript:location.reload()" title="' . $myoptions['tichoxanadixte'] . '" style="text-decoration:none;"><span style="font-size:2.2em;color:#e00000;vertical-align:middle;">&#10226;</span></a> &nbsp;<input id="asphaliakrifo" name="asphaliakrifo" type="text" value="' . $_SESSION['apantisiegrapse'] . '" size="7" style="width:100px;"></div>';

	} else { 

		echo '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" aria-required="true"></textarea></p><div style="padding-top:15px;padding-bottom:15px;"><label for="author">' . __( $myoptions['tichoaristera'] ) . '</label> &nbsp;<img style="height:30px;vertical-align:middle" src="' . plugins_url( $myoptions['tichomichaniselida'] , __FILE__ ) . '"> &nbsp;<a href="javascript:location.reload()" title="' . $myoptions['tichoxanadixte'] . '" style="text-decoration:none;"><span style="font-size:2.2em;color:#e00000;vertical-align:middle;">&#10226;</span></a> &nbsp;<input id="asphaliakrifo" name="asphaliakrifo" type="text" value="' . $_SESSION['apantisiegrapse'] . '" size="7" style="width:100px;"></div>';

		}

if ( isset($_SESSION['minimakubipatise']) ) {

	$_SESSION['minimakubipatise'] = '0';

}

}

}

function asphaliastichiadixe () {

session_start();

include( "addenda/retop.php" );

if ( $myoptions['dixestichioticho'] === '1' ) {

	if ( $myoptions['stichiotichotopos'] === '1' ) {

		echo '<div style="padding-top:15px;padding-bottom:15px;"><label for="author">' . __( $myoptions['tichoaristera'] ) . '</label> &nbsp;<img style="height:30px;vertical-align:middle" src="' . plugins_url( $myoptions['tichomichaniselida'] , __FILE__ ) . '"> &nbsp;<a href="javascript:location.reload()" title="' . $myoptions['tichoxanadixte'] . '" style="text-decoration:none;"><span style="font-size:2.2em;color:#e00000;vertical-align:middle;">&#10226;</span></a> &nbsp;<input id="asphaliakrifo" name="asphaliakrifo" type="text" value="' . $_SESSION['apantisiegrapse'] . '" size="9" style="width:160px;"></div>';

	} else {

		echo '<div style="padding-top:3px;padding-bottom:3px;"><label for="author">' . __( $myoptions['tichoaristera'] ) . '</label></div>
<div style="padding-top:3px;padding-bottom:3px;"><img style="height:30px;vertical-align:middle" src="' . plugins_url( $myoptions['tichomichaniselida'] , __FILE__ ) . '"> &nbsp;<a href="javascript:location.reload()" title="' . $myoptions['tichoxanadixte'] . '" style="text-decoration:none;"><span style="font-size:2.2em;color:#e00000;vertical-align:middle;">&#10226;</span></a></div><div style="padding-top:3px;padding-bottom:3px;"><input id="asphaliakrifo" name="asphaliakrifo" type="text" value="' . $_SESSION['apantisiegrapse'] . '" size="9" style="width:160px;"></div>';

	}

}

}

function asphaliaminimatoposepanomesikato () {

session_start();

include( "addenda/retop.php" );

if ( $myoptions['dixeminimaticho'] === '1' ) {

	if ( $myoptions['minimatichotopos'] === '1' ) {

		add_action( 'comment_form_before_fields', 'asphaliaminimadixe' );

	} elseif ( $myoptions['minimatichotopos'] === '2' ) {

		add_action( 'comment_form_after_fields', 'asphaliaminimadixe' );

	} else {

		add_action( 'comment_form_field_comment', 'asphaliaminimadixe' );

	}

}

}

add_action( 'wp_head', 'asphaliaminimatoposepanomesikato' );

function asphaliastichiatoposepanomesikato () {

session_start();

include( "addenda/retop.php" );

if ( $myoptions['dixestichioticho'] === '1' ) {

	if ( $myoptions['stichiotichotopos'] === '1' ) {

		add_action( 'login_message', 'asphaliastichiadixe' );

	} else {

		add_action( 'login_form', 'asphaliastichiadixe' );

	}

} 

}

add_action( 'login_init', 'asphaliastichiatoposepanomesikato' );

function acpo () {

if ( get_option( 'aostichia' ) === FALSE ) {

	include( "addenda/defstichia.php" );
	update_option( 'aostichia', $myoptions );

}

include_once "addenda/retop.php";

$stichiakubiapantisme = '';

if ( isset($_POST['protastichia']) ) {

	if ( $myoptions['titichonadixis'] === '1' && $myoptions['dixeminimaticho'] === '1' && $myoptions['dixestichioticho'] === '0' && $myoptions['minimatichotopos'] === '3' && $myoptions['stichiotichotopos'] === '2' && $myoptions['tichomichaniselida'] === 'addenda/asphaliadixeena.php' && $myoptions['stragiseonoma'] === '0' && $myoptions['stragisediefthinsi'] === '0' && $myoptions['stragisehataftafpi'] === '0' && $myoptions['stragiseminima'] === '1' && $myoptions['stragisekabosaminima'] === '1' && $myoptions['stragisemedikomas'] === '1' && $myoptions['nadixisdikomaskakofaniminimaapantisi'] === '1' && $myoptions['dikosustragiseklisto'] === '0' && $myoptions['stragisemedikosu'] === '0' ) {

		if ( $myoptions['glossa'] === '1' ) {

			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#x2605;</div></td><td>The default settings are already in place. Please note that your Spam Filter is ON.</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '2' ) {

			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#x2605;</div></td><td>既定の設定は、すでに場所でです。スパムフィルターはアクティブです。</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '3' ) {

			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#x2605;</div></td><td>Οι προεπιλεγμένες ρυθμίσεις έχουν ήδη θεσπιστεί. Το φίλτρο ανεπιθύμητης αλληλογραφίας σας είναι ενεργή.</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '4' ) {

			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#x2605;</div></td><td>기본 설정은 장소에 이미 있습니다. 스팸 방지 필터는 활성.</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '5' ) {

			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#x2605;</div></td><td>預設設置已經到位。您的防垃圾郵件篩選器處於活動狀態。</td></tr></table></left></div></div>';

		}
	
	} else {

		$myoptions['titichonadixis'] = '1';
		$myoptions['dixeminimaticho'] = '1';
		$myoptions['dixestichioticho'] = '0';
		$myoptions['minimatichotopos'] = '3';
		$myoptions['stichiotichotopos'] = '2';
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeena.php';
		$myoptions['stragiseonoma'] = '0';
		$myoptions['stragisediefthinsi'] = '0';
		$myoptions['stragisehataftafpi'] = '0';
		$myoptions['stragiseminima'] = '1';
		$myoptions['stragisekabosaminima'] = '1';
		$myoptions['stragisemedikomas'] = '1';
		$myoptions['nadixisdikomaskakofaniminimaapantisi'] = '1';
		$myoptions['dikosustragiseklisto'] = '0';
		$myoptions['stragisemedikosu'] = '0';


		if ( $myoptions['glossa'] === '1' ) {

			$myoptions['tichoaristera'] = 'Please Enter Security Code';
			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;">
<div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>Good Job! The default settings have been successfully restored. Please note that your Spam Filter is ON.</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '2' ) {

			$myoptions['tichoaristera'] = 'セキュリティ コードを入力して下さい'; 
			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;">
<div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>おめでとうございます！ 既定の設定は正常に復元されています。スパムフィルターはアクティブです。</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '3' ) {

			$myoptions['tichoaristera'] = 'Παρακαλώ εισάγετε κωδικό ασφαλείας'; 
			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;">
<div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>Συγχαρητήρια! Οι προεπιλεγμένες ρυθμίσεις έχουν αποκατασταθεί με επιτυχία. Το φίλτρο ανεπιθύμητης αλληλογραφίας σας είναι ενεργή.</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '4' ) {

			$myoptions['tichoaristera'] = '보안 코드를 입력 하십시오.'; 
			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;">
<div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>축 하! 기본 설정이 복원 되었습니다. 스팸 방지 필터는 활성.</td></tr></table></left></div></div>';

		} elseif ( $myoptions['glossa'] === '5' ) {

			$myoptions['tichoaristera'] = '請輸入安全代碼';
			$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;">
<div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>恭喜！ 已成功恢復預設設置。您的防垃圾郵件篩選器處於活動狀態。</td></tr></table></left></div></div>';

		}
	
		update_option( 'aostichia', $myoptions );

	}

}

if ( isset($_POST['kenuriastichia']) ) {

$myoptions['glossa'] = $_POST['glossa'];
$myoptions['titichonadixis'] = $_POST['titichonadixis'];

if ( isset($_POST['tominimatichotopos']) ) {

	$myoptions['dixeminimaticho'] = '1';

} else {

	$myoptions['dixeminimaticho'] = '0';

}

if ( isset($_POST['tostichiotichotopos']) ) {

	$myoptions['dixestichioticho'] = '1';

} else {

	$myoptions['dixestichioticho'] = '0';

}

$myoptions['minimatichotopos'] = $_POST['toalominimatichotopos'];
$myoptions['stichiotichotopos'] = $_POST['toalostichiotichotopos'];

if ( isset($_POST['stragiseonoma']) ) {

	$myoptions['stragiseonoma'] = '1';

} else {

	$myoptions['stragiseonoma'] = '0';

}

if ( isset($_POST['stragisediefthinsi']) ) {

	$myoptions['stragisediefthinsi'] = '1';

} else {

	$myoptions['stragisediefthinsi'] = '0';

}

if ( isset($_POST['stragisehataftafpi']) ) {

	$myoptions['stragisehataftafpi'] = '1';

} else {

	$myoptions['stragisehataftafpi'] = '0';

}

if ( isset($_POST['stragiseminima']) ) {

	$myoptions['stragiseminima'] = '1';

} else {

	$myoptions['stragiseminima'] = '0';

}

if ( !isset($_POST['stragiseonoma']) && !isset($_POST['stragisediefthinsi']) && !isset($_POST['stragisehataftafpi']) && !isset($_POST['stragiseminima']) || trim($_POST['stragismakolona']) === '' || trim($_POST['stragismakolona']) === $myoptions['stragiseklisto'] ) {

	$myoptions['stragisekabosaminima'] = '0';

	if ( $myoptions['glossa'] === '1' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>Good Job! Your settings have been successfully saved. Please note that your Spam Filter is OFF.</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '2' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>おめでとうございます！ あなたの設定が正常に保存されました。スパムフィルターはアクティブではありません。</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '3' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>Συγχαρητήρια! Αποθηκεύτηκαν με επιτυχία τις ρυθμίσεις σας. Το φίλτρο ανεπιθύμητης αλληλογραφίας σας δεν είναι ενεργή.</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '4' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>축 하! 설정이 성공적으로 저장 되었습니다. 스팸 방지 필터는 활성화 되지 않습니다.</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '5' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>恭喜！ 已成功保存您的設置。您的防垃圾郵件篩選器未處於活動狀態。</td></tr></table></left></div></div>';

	}
			
} else {

	$myoptions['stragisekabosaminima'] = '1';

	if ( $myoptions['glossa'] === '1' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>Good Job! Your settings have been successfully saved. Please note that your Spam Filter is ON.</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '2' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>おめでとうございます！ あなたの設定が正常に保存されました。スパムフィルターはアクティブです。</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '3' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>Συγχαρητήρια! Αποθηκεύτηκαν με επιτυχία τις ρυθμίσεις σας. Το φίλτρο ανεπιθύμητης αλληλογραφίας σας είναι ενεργή.</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '4' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>축 하! 설정이 성공적으로 저장 되었습니다. 스팸 방지 필터는 활성.</td></tr></table></left></div></div>';

	} elseif ( $myoptions['glossa'] === '5' ) {

		$stichiakubiapantisme = '<div style="padding-top:20px;padding-left:40px;padding-right:40px;text-align:left;"><div style="padding:20px;border:solid 1px #e0e0e0;background:#FFF8C6;text-align:left;font-size:1.2em;"><left><table><tr align="left"><td valign="left">
<div style="font-size:3.0em;color:#FF0000;padding-right:10px;">&#10004;</div></td><td>恭喜！ 已成功保存您的設置。您的防垃圾郵件篩選器處於活動狀態。</td></tr></table></left></div></div>';

	}

}

if ( trim($_POST['stragismakolona']) !== '' ) {

	$ftiaxestragismakolonastichio = preg_replace('~\r\n?~', '####', trim($_POST['stragismakolona']));

	if ( $ftiaxestragismakolonastichio === $myoptions['dikomasstragisekolona'] || $ftiaxestragismakolonastichio === $myoptions['dikosustragisekolonadenechitipotaminima'] ) {

		$myoptions['stragisemedikomas'] = '1';
		$myoptions['dikosustragiseklisto'] = '0';

	} else {

		$myoptions['stragisemedikomas'] = '0';
		$myoptions['dikosustragiseklisto'] = '1';

		if ( $ftiaxestragismakolonastichio !== $myoptions['stragiseklisto'] ) {

			$myoptions['dikosustragisekolona'] = $ftiaxestragismakolonastichio;

		}

	}

}

if ( trim($_POST['kakofanititlo']) !== '' && trim($_POST['kakofaniminima']) !== '' ) {

	if ( trim($_POST['kakofanititlo']) !== $myoptions['kakofaniminimaapantasititlo'] ||  trim($_POST['kakofaniminima']) !== $myoptions['kakofaniminimaapantasiminima'] ) {

		$myoptions['dikosukakofaniminimaapantasititlo'] = trim($_POST['kakofanititlo']);
		$myoptions['dikosukakofaniminimaapantasiminima'] = trim($_POST['kakofaniminima']);

		$myoptions['stragisemedikosu'] = '1';
		$myoptions['nadixisdikomaskakofaniminimaapantisi'] = '0';

	} else {

		$myoptions['stragisemedikosu'] = '0';
		$myoptions['nadixisdikomaskakofaniminimaapantisi'] = '1';

	}

}

if ( $myoptions['glossa'] === '1' ) {

	$myoptions['stichiaglossa'] = 'addenda/stichiaglossaena.php';
	$myoptions['stragiseklisto'] ='The Spam Filter is OFF';
	$myoptions['dikosustragisekolonadenechitipotaminima'] = 'Your Custom Spam Filter List Is Empty';
	$myoptions['dikomasstragisekolona'] = 'Lose Weight####Buy This Now####Make Money####Work From Home####XXX####sex';				
	$myoptions['kakofaniminimaapantasititlo'] = 'Comment Needs Modification';
	$myoptions['kakofaniminimaapantasiminima'] = 'Please modify your comment as it may contain inappropriate and possibly spam-related content. Thank you.';

	$myoptions['tichoglossa'] = 'addenda/commlangena.php';

	if ( $myoptions['titichonadixis'] === '1' ) {

		$myoptions['tichoaristera'] = 'Please Enter Security Code'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeena.php';

	} elseif ( $myoptions['titichonadixis'] === '2' ) {

		$myoptions['tichoaristera'] = 'Please Do the Math'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedio.php';

	} elseif ( $myoptions['titichonadixis'] === '3' ) {

		$myoptions['tichoaristera'] = 'Name the Artist'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetria.php';

	} elseif ( $myoptions['titichonadixis'] === '4' ) {

		$myoptions['tichoaristera'] = 'What Film Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetesera.php';

	} elseif ( $myoptions['titichonadixis'] === '5' ) {

		$myoptions['tichoaristera'] = 'Name the Author'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixepente.php';

	} elseif ( $myoptions['titichonadixis'] === '6' ) {

		$myoptions['tichoaristera'] = 'Please Do the Science'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeexi.php';

	} elseif ( $myoptions['titichonadixis'] === '7' ) {

		$myoptions['tichoaristera'] = 'Whom Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeefta.php';

	} elseif ( $myoptions['titichonadixis'] === '8' ) {

		$myoptions['tichoaristera'] = 'What Does This Acronym Stand For?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeochto.php';

	} elseif ( $myoptions['titichonadixis'] === '9' ) {

		$myoptions['tichoaristera'] = 'What Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeenea.php';

	} elseif ( $myoptions['titichonadixis'] === '10' ) {

		$myoptions['tichoaristera'] = 'What City Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedeca.php';

	} elseif ( $myoptions['titichonadixis'] === '11' ) {

		$myoptions['tichoaristera'] = 'How Many?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeendeca.php';

	} elseif ( $myoptions['titichonadixis'] === '12' ) {

		$myoptions['tichoaristera'] = 'Name the Sport'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedodeca.php';

	} elseif ( $myoptions['titichonadixis'] === '13' ) {

		$myoptions['tichoaristera'] = 'Name the Film Director'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatria.php';

	} elseif ( $myoptions['titichonadixis'] === '14' ) {

		$myoptions['tichoaristera'] = 'What Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatesera.php';

	} elseif ( $myoptions['titichonadixis'] === '15' ) {

		$myoptions['tichoaristera'] = 'Country Associated with Currency?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecapente.php';

	} elseif ( $myoptions['titichonadixis'] === '16' ) {

		$myoptions['tichoaristera'] = 'Country of Origin?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaexi.php';

	} elseif ( $myoptions['titichonadixis'] === '17' ) {

		$myoptions['tichoaristera'] = 'What Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaefta.php';

	} elseif ( $myoptions['titichonadixis'] === '18' ) {

		$myoptions['tichoaristera'] = 'What Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaochto.php';

	} elseif ( $myoptions['titichonadixis'] === '19' ) {

		$myoptions['tichoaristera'] = 'What Do You See?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaenea.php';

	}

	$myoptions['tichoxanadixte'] = ' Reload AlphaOmega Captcha ';

} elseif ( $myoptions['glossa'] === '2' ) {

	$myoptions['stichiaglossa'] = 'addenda/stichiaglossadio.php';
	$myoptions['stragiseklisto'] ='スパムフィルターはアクティブではありません';
	$myoptions['dikosustragisekolonadenechitipotaminima'] = 'カスタムスパムフィルター リストが空です';
	$myoptions['dikomasstragisekolona'] = '重量を失う####金持ちになる####アダルト ビデオ####セックス';				
	$myoptions['kakofaniminimaapantasititlo'] = 'コメントの変更が必要';
	$myoptions['kakofaniminimaapantasiminima'] = '不適切なおそらくスパム関連のコンテンツを含めることがあなたのコメントに変更して下さい。';

	$myoptions['tichoglossa'] = 'addenda/commlangdio.php';

	if ( $myoptions['titichonadixis'] === '1' ) {

		$myoptions['tichoaristera'] = 'セキュリティ コードを入力して下さい'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeena.php';

	} elseif ( $myoptions['titichonadixis'] === '2' ) {

		$myoptions['tichoaristera'] = '答えは何ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedio.php';

	} elseif ( $myoptions['titichonadixis'] === '3' ) {

		$myoptions['tichoaristera'] = 'アーティストは誰ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetria.php';

	} elseif ( $myoptions['titichonadixis'] === '4' ) {

		$myoptions['tichoaristera'] = 'どんな映画ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetesera.php';

	} elseif ( $myoptions['titichonadixis'] === '5' ) {

		$myoptions['tichoaristera'] = '作者は誰ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixepente.php';

	} elseif ( $myoptions['titichonadixis'] === '6' ) {

		$myoptions['tichoaristera'] = '答えは何ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeexi.php';

	} elseif ( $myoptions['titichonadixis'] === '7' ) {

		$myoptions['tichoaristera'] = '誰か。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeefta.php';

	} elseif ( $myoptions['titichonadixis'] === '8' ) {

		$myoptions['tichoaristera'] = 'この頭字語はどういう意味ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeochto.php';

	} elseif ( $myoptions['titichonadixis'] === '9' ) {

		$myoptions['tichoaristera'] = '何を見るか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeenea.php';

	} elseif ( $myoptions['titichonadixis'] === '10' ) {

		$myoptions['tichoaristera'] = 'どの都市ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedeca.php';

	} elseif ( $myoptions['titichonadixis'] === '11' ) {

		$myoptions['tichoaristera'] = 'いくつ。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeendeca.php';

	} elseif ( $myoptions['titichonadixis'] === '12' ) {

		$myoptions['tichoaristera'] = 'スポーツは何ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedodeca.php';

	} elseif ( $myoptions['titichonadixis'] === '13' ) {

		$myoptions['tichoaristera'] = '映画監督は誰ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatria.php';

	} elseif ( $myoptions['titichonadixis'] === '14' ) {

		$myoptions['tichoaristera'] = '何を見るか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatesera.php';

	} elseif ( $myoptions['titichonadixis'] === '15' ) {

		$myoptions['tichoaristera'] = 'どの国を使用してこの通貨ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecapente.php';

	} elseif ( $myoptions['titichonadixis'] === '16' ) {

		$myoptions['tichoaristera'] = 'どの国の起源この食品ですか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaexi.php';

	} elseif ( $myoptions['titichonadixis'] === '17' ) {

		$myoptions['tichoaristera'] = '何を見るか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaefta.php';

	} elseif ( $myoptions['titichonadixis'] === '18' ) {

		$myoptions['tichoaristera'] = '何を見るか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaochto.php';

	} elseif ( $myoptions['titichonadixis'] === '19' ) {

		$myoptions['tichoaristera'] = '何を見るか。'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaenea.php';

	}

	$myoptions['tichoxanadixte'] = ' AlphaOmega キャプチャの再読み込み ';

} elseif ( $myoptions['glossa'] === '3' ) {

	$myoptions['stichiaglossa'] = 'addenda/stichiaglossatria.php';
	$myoptions['stragiseklisto'] ='Το φίλτρο ανεπιθύμητης αλληλογραφίας σας δεν είναι ενεργή';
	$myoptions['dikosustragisekolonadenechitipotaminima'] = 'σας προσαρμοσμένη λίστα φίλτρου ανεπιθύμητης αλληλογραφίας είναι κενό';				
	$myoptions['dikomasstragisekolona'] = 'χάσετε βάρος####Αγοράστε τώρα####Γίνετε Πλούσιοι####Ενήλικα Βίντεο';
	$myoptions['kakofaniminimaapantasititlo'] = 'Σχόλιο χρειάζεται τροποποίηση';
	$myoptions['kakofaniminimaapantasiminima'] = 'Τροποποιήστε την παρατήρησή σας, όπως μπορεί να περιέχει περιεχόμενο ακατάλληλη και ενδεχομένως σχετίζονται με ανεπιθύμητη αλληλογραφία.';

	$myoptions['tichoglossa'] = 'addenda/commlangtria.php';

	if ( $myoptions['titichonadixis'] === '1' ) {

		$myoptions['tichoaristera'] = 'Παρακαλώ εισάγετε κωδικό ασφαλείας'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeena.php';

	} elseif ( $myoptions['titichonadixis'] === '2' ) {

		$myoptions['tichoaristera'] = 'Ποια είναι η απάντηση;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedio.php';

	} elseif ( $myoptions['titichonadixis'] === '3' ) {

		$myoptions['tichoaristera'] = 'Ποιος είναι ο καλλιτέχνης;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetria.php';

	} elseif ( $myoptions['titichonadixis'] === '4' ) {

		$myoptions['tichoaristera'] = 'Τι ταινία βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetesera.php';

	} elseif ( $myoptions['titichonadixis'] === '5' ) {

		$myoptions['tichoaristera'] = 'Ποιος είναι ο συντάκτης;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixepente.php';

	} elseif ( $myoptions['titichonadixis'] === '6' ) {

		$myoptions['tichoaristera'] = 'Ποια είναι η απάντηση;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeexi.php';

	} elseif ( $myoptions['titichonadixis'] === '7' ) {

		$myoptions['tichoaristera'] = 'Ποιος είναι;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeefta.php';

	} elseif ( $myoptions['titichonadixis'] === '8' ) {

		$myoptions['tichoaristera'] = 'Τι σημαίνει αυτό το ακρωνύμιο;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeochto.php';

	} elseif ( $myoptions['titichonadixis'] === '9' ) {

		$myoptions['tichoaristera'] = 'Tι βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeenea.php';

	} elseif ( $myoptions['titichonadixis'] === '10' ) {

		$myoptions['tichoaristera'] = 'Τι πόλη βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedeca.php';

	} elseif ( $myoptions['titichonadixis'] === '11' ) {

		$myoptions['tichoaristera'] = 'Πόσα;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeendeca.php';

	} elseif ( $myoptions['titichonadixis'] === '12' ) {

		$myoptions['tichoaristera'] = 'Τι είναι το άθλημα;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedodeca.php';

	} elseif ( $myoptions['titichonadixis'] === '13' ) {

		$myoptions['tichoaristera'] = 'Ποιος είναι ο σκηνοθέτης;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatria.php';

	} elseif ( $myoptions['titichonadixis'] === '14' ) {

		$myoptions['tichoaristera'] = 'Tι βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatesera.php';

	} elseif ( $myoptions['titichonadixis'] === '15' ) {

		$myoptions['tichoaristera'] = 'Ποια χώρα που χρησιμοποιεί αυτό το νόμισμα;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecapente.php';

	} elseif ( $myoptions['titichonadixis'] === '16' ) {

		$myoptions['tichoaristera'] = 'Ποια χώρα προέρχεται αυτή τροφίμων;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaexi.php';

	} elseif ( $myoptions['titichonadixis'] === '17' ) {

		$myoptions['tichoaristera'] = 'Tι βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaefta.php';

	} elseif ( $myoptions['titichonadixis'] === '18' ) {

		$myoptions['tichoaristera'] = 'Tι βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaochto.php';

	} elseif ( $myoptions['titichonadixis'] === '19' ) {

		$myoptions['tichoaristera'] = 'Tι βλέπετε;'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaenea.php';

	}

	$myoptions['tichoxanadixte'] = ' Νέα φόρτωση AlphaOmega Captcha ';

} elseif ( $myoptions['glossa'] === '4' ) {

	$myoptions['stichiaglossa'] = 'addenda/stichiaglossatesera.php';
	$myoptions['stragiseklisto'] ='스팸 방지 필터는 활성화 되지 않습니다';
	$myoptions['dikosustragisekolonadenechitipotaminima'] = '사용자 지정 스팸 필터 목록 비어 있습니다.';
	$myoptions['dikomasstragisekolona'] = '패 무게####지금 구입####부자 되기####섹스';				
	$myoptions['kakofaniminimaapantasititlo'] = '댓글 수정 필요';
	$myoptions['kakofaniminimaapantasiminima'] = '으로 부적절 하 고 아마 스팸 관련 콘텐츠를 포함할 수 있습니다 귀하의 코멘트를 수정 하십시오.';

	$myoptions['tichoglossa'] = 'addenda/commlangtesera.php';

	if ( $myoptions['titichonadixis'] === '1' ) {

		$myoptions['tichoaristera'] = '보안 코드를 입력 하십시오.'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeena.php';

	} elseif ( $myoptions['titichonadixis'] === '2' ) {

		$myoptions['tichoaristera'] = '대답은 무엇입니까?';
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedio.php';

	} elseif ( $myoptions['titichonadixis'] === '3' ) {

		$myoptions['tichoaristera'] = '작가 누구 입니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetria.php';

	} elseif ( $myoptions['titichonadixis'] === '4' ) {

		$myoptions['tichoaristera'] = '당신은 어떤 영화를 봅니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetesera.php';

	} elseif ( $myoptions['titichonadixis'] === '5' ) {

		$myoptions['tichoaristera'] = '저자는 누구 인가.입니다?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixepente.php';

	} elseif ( $myoptions['titichonadixis'] === '6' ) {

		$myoptions['tichoaristera'] = '대답은 무엇입니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeexi.php';

	} elseif ( $myoptions['titichonadixis'] === '7' ) {

		$myoptions['tichoaristera'] = '누가 볼 수 있습니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeefta.php';

	} elseif ( $myoptions['titichonadixis'] === '8' ) {

		$myoptions['tichoaristera'] = '이 약자는 무엇을 의미 합니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeochto.php';

	} elseif ( $myoptions['titichonadixis'] === '9' ) {

		$myoptions['tichoaristera'] = '당신은 무엇을 봅니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeenea.php';

	} elseif ( $myoptions['titichonadixis'] === '10' ) {

		$myoptions['tichoaristera'] = '어떤 도시를 보십니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedeca.php';

	} elseif ( $myoptions['titichonadixis'] === '11' ) {

		$myoptions['tichoaristera'] = '몇 개나요?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeendeca.php';

	} elseif ( $myoptions['titichonadixis'] === '12' ) {

		$myoptions['tichoaristera'] = '스포츠는 무엇 인가.입니다?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedodeca.php';

	} elseif ( $myoptions['titichonadixis'] === '13' ) {

		$myoptions['tichoaristera'] = '누가 영화 감독?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatria.php';

	} elseif ( $myoptions['titichonadixis'] === '14' ) {

		$myoptions['tichoaristera'] = '당신은 무엇을 봅니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatesera.php';

	} elseif ( $myoptions['titichonadixis'] === '15' ) {

		$myoptions['tichoaristera'] = '사용 하 여 어떤 나라가이 통화?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecapente.php';

	} elseif ( $myoptions['titichonadixis'] === '16' ) {

		$myoptions['tichoaristera'] = '어떤 나라의 유래이 음식?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaexi.php';

	} elseif ( $myoptions['titichonadixis'] === '17' ) {

		$myoptions['tichoaristera'] = '당신은 무엇을 봅니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaefta.php';

	} elseif ( $myoptions['titichonadixis'] === '18' ) {

		$myoptions['tichoaristera'] = '당신은 무엇을 봅니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaochto.php';

	} elseif ( $myoptions['titichonadixis'] === '19' ) {

		$myoptions['tichoaristera'] = '당신은 무엇을 봅니까?'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaenea.php';

	}

	$myoptions['tichoxanadixte'] = ' AlphaOmega Captcha를 다시 로드  ';

} elseif ( $myoptions['glossa'] === '5' ) {

	$myoptions['stichiaglossa'] = 'addenda/stichiaglossapente.php';
	$myoptions['stragiseklisto'] ='您的防垃圾郵件篩選器未處於活動狀態';
	$myoptions['dikosustragisekolonadenechitipotaminima'] = '您自訂垃圾郵件篩選器清單是空的';	
	$myoptions['dikomasstragisekolona'] = '減肥####現在買####變得富有####性別';			
	$myoptions['kakofaniminimaapantasititlo'] = '注釋需要改進';
	$myoptions['kakofaniminimaapantasiminima'] = '請修改您的評論，因為它可能包含不適當和可能與垃圾郵件有關的內容。';

	$myoptions['tichoglossa'] = 'addenda/commlangpente.php';

	if ( $myoptions['titichonadixis'] === '1' ) {

		$myoptions['tichoaristera'] = '請輸入安全代碼'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeena.php';

	} elseif ( $myoptions['titichonadixis'] === '2' ) {

		$myoptions['tichoaristera'] = '答案是什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedio.php';

	} elseif ( $myoptions['titichonadixis'] === '3' ) {

		$myoptions['tichoaristera'] = '這位演出者是誰？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetria.php';

	} elseif ( $myoptions['titichonadixis'] === '4' ) {

		$myoptions['tichoaristera'] = '你看見什麼片子？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixetesera.php';

	} elseif ( $myoptions['titichonadixis'] === '5' ) {

		$myoptions['tichoaristera'] = '作者是誰？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixepente.php';

	} elseif ( $myoptions['titichonadixis'] === '6' ) {

		$myoptions['tichoaristera'] = '答案是什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeexi.php';

	} elseif ( $myoptions['titichonadixis'] === '7' ) {

		$myoptions['tichoaristera'] = '你看到了誰？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeefta.php';

	} elseif ( $myoptions['titichonadixis'] === '8' ) {

		$myoptions['tichoaristera'] = '這首字母縮寫詞是什麼意思呢？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeochto.php';

	} elseif ( $myoptions['titichonadixis'] === '9' ) {

		$myoptions['tichoaristera'] = '你看到了什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeenea.php';

	} elseif ( $myoptions['titichonadixis'] === '10' ) {

		$myoptions['tichoaristera'] = '你看見什麼城市？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedeca.php';

	} elseif ( $myoptions['titichonadixis'] === '11' ) {

		$myoptions['tichoaristera'] = '幾個？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixeendeca.php';

	} elseif ( $myoptions['titichonadixis'] === '12' ) {

		$myoptions['tichoaristera'] = '這項運動是什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedodeca.php';

	} elseif ( $myoptions['titichonadixis'] === '13' ) {

		$myoptions['tichoaristera'] = '電影導演是誰？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatria.php';

	} elseif ( $myoptions['titichonadixis'] === '14' ) {

		$myoptions['tichoaristera'] = '你看到了什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecatesera.php';

	} elseif ( $myoptions['titichonadixis'] === '15' ) {

		$myoptions['tichoaristera'] = '哪些國家使用此貨幣嗎？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecapente.php';

	} elseif ( $myoptions['titichonadixis'] === '16' ) {

		$myoptions['tichoaristera'] = '哪些國家起源這種食物呢？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaexi.php';

	} elseif ( $myoptions['titichonadixis'] === '17' ) {

		$myoptions['tichoaristera'] = '你看到了什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaefta.php';

	} elseif ( $myoptions['titichonadixis'] === '18' ) {

		$myoptions['tichoaristera'] = '你看到了什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaochto.php';

	} elseif ( $myoptions['titichonadixis'] === '19' ) {

		$myoptions['tichoaristera'] = '你看到了什麼？'; 
		$myoptions['tichomichaniselida'] = 'addenda/asphaliadixedecaenea.php';

	}

	$myoptions['tichoxanadixte'] = ' AlphaOmega 重新載入驗證碼 ';

}


update_option( 'aostichia', $myoptions );

}

include( "addenda/asis.php" );
include( $myoptions['stichiaglossa'] );
include( "addenda/stichiabase.php" );

}

function aokato ( $kola, $selida ) {

    if ( $selida == plugin_basename(__FILE__) && function_exists( 'admin_url' ) ) {

        $ftiaxe = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=5YMUQTV2LVAW6&item_name=AlphaOmega-Captcha-Anti-Spam-Filter--WordPress--Plugin">' . __('Please Donate') . '</a>';
        array_unshift( $kola, $ftiaxe );
        $ftiaxe = '<a href="' . admin_url( 'plugins.php?page=alphaomega_captcha_and_antispam' ) . '">' . __('Settings') . '</a>';
        array_unshift( $kola, $ftiaxe );

    }

    return $kola;

}

add_filter( 'plugin_action_links', 'aokato', 10, 2 );

function aodexia () {

	add_plugins_page( 'AlphaOmega Captcha & Anti-Spam Filter Settings', 'AlphaOmega Captcha & Anti-Spam Filter Settings', 'manage_options', 'alphaomega_captcha_and_antispam', 'acpo' );

}

add_action( 'admin_menu', 'aodexia' );

function stile_minima_kubi () {

session_start();

include( "addenda/retop.php" );
include( $myoptions['tichoglossa'] );

if ( !isset($_COOKIE["PHPSESSID"]) ) {

	wp_die( __($echimelomakarena) );

}

$_SESSION['minimakubipatise'] = '1';
$_SESSION['apantisiegrapse'] = trim($_POST['asphaliakrifo']);


if ( $myoptions['stragisekabosaminima'] === '1' && (!empty($_POST['author']) || !empty($_POST['email']) || !empty($_POST['url']) || !empty($_POST['comment'])) ) {

	if ( $myoptions['stragisemedikomas'] === '1' ) {

		$ftiaxedikomasstragismakolona = explode("####", strtolower($myoptions['dikomasstragisekolona']));

	} else {

		$ftiaxedikomasstragismakolona = explode("####", strtolower($myoptions['dikosustragisekolona']));

	}

	include( "addenda/oakolaao.php" );

	if ( $myoptions['stragiseonoma'] === '1' ) {

		if ( !empty($_POST['author']) ) 

			$tiegrapseopelatis .= strtolower(trim($_POST['author'])) . $aokolaoa;

	}

	if ( $myoptions['stragisediefthinsi'] === '1' ) {

		if ( !empty($_POST['email']) )

			$tiegrapseopelatis .= strtolower(trim($_POST['email'])) . $aokolaoa;

	}

	if ( $myoptions['stragisehataftafpi'] === '1' ) {

		if ( !empty($_POST['url']) )

			$tiegrapseopelatis .= strtolower(trim($_POST['url'])) . $aokolaoa;

	}

	if ( $myoptions['stragiseminima'] === '1' ) {

		if ( !empty($_POST['comment']) )

			$tiegrapseopelatis .= strtolower(trim($_POST['comment']));

	}

	for ( $ikakofani = 0; $ikakofani < count($ftiaxedikomasstragismakolona); $ikakofani++ ) {

		if ( strpos($tiegrapseopelatis, $ftiaxedikomasstragismakolona[$ikakofani]) !== FALSE ) {

			if ( $myoptions['nadixisdikomaskakofaniminimaapantisi'] === '1' ) {

				wp_die( __('<strong>' . $myoptions['kakofaniminimaapantasititlo'] . ':</strong> ' . $myoptions['kakofaniminimaapantasiminima']) );	

			} else {

				wp_die( __('<strong>' . $myoptions['dikosukakofaniminimaapantasititlo'] . ':</strong> ' . $myoptions['dikosukakofaniminimaapantasiminima']) );

			}		

		}
	}

}

if ( trim($_POST['asphaliakrifo']) === '' ) {

	wp_die( __($opelatesdenapantise) );

} else {

	if ( $_SESSION['aoakrivosidiolexi'] === '1' ) {

		if ( trim($_POST['asphaliakrifo']) !== $_SESSION['aokrifoklidislexi'] ) {

  			wp_die( __($opelatesapantiselathos) );

 		}

	} else {

		if ( strpos($_SESSION['aokrifoklidislexi'], '。。。。') === FALSE ) {

			if ( strtolower(trim($_POST['asphaliakrifo'])) !== strtolower($_SESSION['aokrifoklidislexi']) ) {

				wp_die( __($opelatesapantiselathos) );

			}
		
		} else {

			$toutocolona = explode('。。。。', $_SESSION['aokrifoklidislexi']);
			
			$toutiocolona = 0;

			for ($touitocolona = 0; $touitocolona < count($toutocolona); $touitocolona++) {

				if ( strtolower($toutocolona[$touitocolona]) === strtolower(trim($_POST['asphaliakrifo'])) )

					$toutiocolona = 1;

			}

			if ( $toutiocolona == 0 ) {

				wp_die( __($opelatesapantiselathos) );

			}

		} 

  	}

}

if ( !empty($_POST['author']) && strpos($_POST['email'], '@') !== FALSE && strpos($_POST['email'], '.') !== FALSE ) {

	$_SESSION['minimakubipatise'] = '0';

}

}

add_action('pre_comment_on_post', 'stile_minima_kubi');   
 
function stichiaembros ($url, $username, $password) {

session_start();

include( "addenda/retop.php" );
include( $myoptions['tichoglossa'] );

if ( isset($_POST['wp-submit']) ) {

	if ( !isset($_COOKIE["PHPSESSID"]) ) {

		wp_die( __($echimelomakarena) );

	}

	$tiine = array();

	if ( empty($username) ) {

		array_push($tiine, $stichioonoma);

	} else {

		$userdata = get_user_by('login', $username);

		if ( !$userdata ) {

			array_push($tiine, $stichioonomalathos);

		}

	}

	if ( empty($password) ) {

		array_push($tiine, $stichioklidi);

	} else {

		$userdata = apply_filters('wp_authenticate_user', $userdata, $password);

		if ( !wp_check_password($password, $userdata->user_pass, $userdata->ID) ) {

			array_push($tiine, $stichioklidilathos);

		}

	}



if ( $myoptions['dixestichioticho'] === '1' ) {

	if ( trim($_POST['asphaliakrifo']) === '' ) {

		array_push($tiine, $stichiokliditichograpse);

	} else {

		$_SESSION['apantisiegrapse'] = trim($_POST['asphaliakrifo']);

		if ( $_SESSION['aoakrivosidiolexi'] === '1' ) {

			if ( trim($_POST['asphaliakrifo']) !== $_SESSION['aokrifoklidislexi'] ) {

				array_push($tiine, $stichiokliditicholathos);

			}

		} else {

			if ( strpos($_SESSION['aokrifoklidislexi'], '。。。。') === FALSE ) {

				if ( strtolower(trim($_POST['asphaliakrifo'])) !== strtolower($_SESSION['aokrifoklidislexi']) ) {

					array_push($tiine, $stichiokliditicholathos);

				}
		
			} else {

				$toutocolona = explode('。。。。', $_SESSION['aokrifoklidislexi']);
			
				$toutiocolona = 0;

				for ($touitocolona = 0; $touitocolona < count($toutocolona); $touitocolona++) {

					if ( strtolower($toutocolona[$touitocolona]) === strtolower(trim($_POST['asphaliakrifo'])) )

						$toutiocolona = 1;

				}

				if ( $toutiocolona == 0 ) {

					array_push($tiine, $stichiokliditicholathos);

				}

			} 

		}

	}

}

$thecount = count($tiine);

if ( $thecount > 0 ) {

	switch ( $thecount ) {

		case 1:

		wp_die( __($stichioegrapsedeninearketo .  ' &nbsp;&nbsp;' . $tiine[0]) );
		break;

		case 2:

		wp_die( __($stichioegrapsedeninearketo .  ' &nbsp;&nbsp;' . $tiine[0] . ', &nbsp;&nbsp;' . $tiine[1]) );
		break;

		case 3:

		wp_die( __($stichioegrapsedeninearketo .  ' &nbsp;&nbsp;' . $tiine[0] . ', &nbsp;&nbsp;' . $tiine[1] . ', &nbsp;&nbsp;' . $tiine[2]) );
		break;
	}

}

return $url;

}

}

add_filter( 'authenticate', 'stichiaembros', 10, 3 );

function cdacso () {

if ( get_option( 'aostichia' ) === FALSE ) {

	include( "addenda/defstichia.php" );
	update_option( 'aostichia', $myoptions );

}

}

register_activation_hook( __FILE__, 'cdacso' );

function dacso () {

if ( get_option( 'aostichia' ) !== FALSE ) {

	delete_option( 'aostichia' );

}

}

register_deactivation_hook( __FILE__, 'dacso' );

?>

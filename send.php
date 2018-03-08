<?php

        $comment;$captcha;
		if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          print_r("Zaznacz pole antyspamerskie");
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc2wzMUAAAAAOB1g36Qm_WNeZxhdUrF_xBsJBsk&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
         	print_r("Jesteś spamerem!");
        } else {

	$email_to = "biuro@pollyart.pl";
	$email_subject = "Kontakt";
	$email_from = "biuro@pollyart.pl";

	$imie = $_POST['imie'];
	$email = $_POST['email'];
	$wiadomosc = $_POST['wiadomosc'];


	function clean_string( $string ) {
		$bad = array( "content-type", "bcc:", "to:", "cc:", "href" );
		return str_replace( $bad, "", $string );
	}

	$email_message = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd"><html><head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/> <title>Wiadomość</title> <style>@media only screen and (max-width: 300px){body{width: 218px !important; margin: auto !important;}thead, tbody{width: 100%}.table{width: 195px !important; margin: auto !important;}.logo, .titleblock, .linkbelow, .box, .footer, .space_footer{width: auto !important; display: block !important;}span.title{font-size: 20px !important; line-height: 23px !important}span.subtitle{font-size: 14px !important; line-height: 18px !important; padding-top: 10px !important; display: block !important;}td.box p{font-size: 12px !important; font-weight: bold !important;}.table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr{display: block !important;}.table-recap{width: 200px!important;}.table-recap tr td, .conf_body td{text-align: center !important;}.address{display: block !important; margin-bottom: 10px !important;}.space_address{display: none !important;}}@media only screen and (min-width: 301px) and (max-width: 500px){body{width: 425px!important; margin: auto!important;}thead, tbody{width: 100%}.table{margin: auto!important;}.logo, .titleblock, .linkbelow, .box, .footer, .space_footer{width: auto!important; display: block!important;}.table-recap{width: 295px !important;}.table-recap tr td, .conf_body td{text-align: center !important;}.table-recap tr th{font-size: 10px !important}}@media only screen and (min-width: 501px) and (max-width: 768px){body{width: 478px!important; margin: auto!important;}thead, tbody{width: 100%}.table{margin: auto!important;}.logo, .titleblock, .linkbelow, .box, .footer, .space_footer{width: auto!important; display: block!important;}}@media only screen and (max-device-width: 480px){body{width: 340px!important; margin: auto!important;}thead, tbody{width: 100%}.table{margin: auto!important;}.logo, .titleblock, .linkbelow, .box, .footer, .space_footer{width: auto!important; display: block!important;}.table-recap{width: 295px!important;}.table-recap tr td, .conf_body td{text-align: center!important;}.address{display: block !important; margin-bottom: 10px !important;}.space_address{display: none !important;}}</style></head><body style="-webkit-text-size-adjust:none;background-color:#fff;width:650px;font-family:Open-sans, sans-serif;color:#555454;font-size:13px;line-height:18px;margin:auto"> <table class="table table-mail" style="width:100%;margin-top:10px;-moz-box-shadow:0 0 5px #afafaf;-webkit-box-shadow:0 0 5px #afafaf;-o-box-shadow:0 0 5px #afafaf;box-shadow:0 0 5px #afafaf;filter:progid:DXImageTransform.Microsoft.Shadow(color=#afafaf,Direction=134,Strength=5)"> <tr> <td class="space" style="width:20px;padding:7px 0">&nbsp;</td><td align="center" style="padding:7px 0"> <table class="table" bgcolor="#ffffff" style="width:100%"> <tr> <td align="center" class="titleblock" style="padding:7px 0"> <font size="2" face="Open-sans, sans-serif" color="#555454"> <span class="title" style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px">Wiadomość</span> <br/> </font> </td></tr><tr> <td class="space_footer" style="padding:0!important">&nbsp;</td></tr><tr> <td class="box" style="border:1px solid #D6D4D4;background-color:#f8f8f8;padding:7px 0"> <table class="table" style="width:100%"> <tr> <td width="10" style="padding:7px 0">&nbsp;</td><td style="padding:7px 0"> <font size="2" face="Open-sans, sans-serif" color="#555454"> <p data-html-only="1" style="border-bottom:1px solid #D6D4D4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px"> Treść wiadomości: </p><table>';
	$email_message .='<tr><td style="font-weight: 600; padding-right: 20px;">Imie:</td><td>'.$imie.'</td></tr>';
	$email_message .='<tr><td style="font-weight: 600; padding-right: 20px;">E-mail:</td><td>'.$email.'</td></tr>';
	$email_message .='<tr><td style="font-weight: 600; padding-right: 20px;">Wiadomość:</td><td>'.$wiadomosc.'</td></tr>';
	$email_message .='</table></font> </td><td width="10" style="padding:7px 0">&nbsp;</td></tr></table> </td></tr></table> </td><td class="space" style="width:20px;padding:7px 0">&nbsp;</td></tr></table></body></html>';

	$headers = 'From: ' . $email_from . "\r\n" .
	'Reply-To: ' . $email_from . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	@mail( $email_to, $email_subject, $email_message, $headers );
	
	print_r("Wysłano");
}
?>
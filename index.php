
<?php 
if(true) {
if(false) {echo '
<a style ="font-family: monospace;
  color: #ff0000;
  font-size: 15px;
  font-weight: bolder;
  text-shadow: 1px 0px 0px #ff0000;
  background-color: #000000;
  box-shadow: 0px 0px 0px #000000;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 35px;
  padding-right: 35px;
  border-top: 2px solid #ff0000;
  border-bottom: 2px solid #ff0000;
  border-left: 2px solid #ff0000;
  border-right: 2px solid #ff0000;
  border-radius: 40px;">Captcha Verification Failed</a>'
;
}
else{
$captcha=$_POST['g-recaptcha-response'];
$secret = '6Le2USsdAAAAAGlvgcu2AJHoYKo1TruGX4aVe_ui';
$ulll = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret) .  '&response=' . urlencode($captcha);
$rnn= file_get_contents($ulll);
$r66 = json_decode($rnn,true);
if(true) {
  $num=filter_var($_GET['phone'], FILTER_SANITIZE_NUMBER_INT);
  $pas=strip_tags($_GET['password']);
    $url="https://mobile.vodafone.com.eg/mobile-app/promo/unifiedRedeemPromo";
    $url2="https://mobile.vodafone.com.eg/mobile-app/auth";
    $data='{"channelId":3,"contextualOperationId":0,"contextualPromoId":0,"operationId":0,"param1":"Ramadan","promoId":3336,"triggerId":332,"triggerType":"6","wlistId":3256}';
    $user_pwd=$num.":".$pas;
    function post($url , $user_pwd) {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERPWD, $user_pwd);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=UTF-8") );
      $response =curl_exec($ch);
	  print($response);
      return $response;
      
    }

    function promo($url ,$post,$user_pwd) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $user_pwd);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=UTF-8") );
        $response =curl_exec($ch);
			  print($response);
          return $response;


        }

    $bot = json_decode(post($url2, $user_pwd), true);

   

    @$user=$bot["user"]["firstName"];
    @$eDesc=$bot["eDesc"];

    if ($eDesc=="Success") {
    $bot2 = json_decode(promo($url, $data, $user_pwd), true);
    $eDesc2=$bot2["eDesc"];
    if ($eDesc2=="MAX_PROMO_REDEMPTIONS_REACHED") {echo '
<a style ="  font-family: monospace;
  color: #ffff00;
  font-size: 15px;
  font-weight: bolder;
  text-shadow: 1px 0px 0px #ffff00;
  background-color: #000000;
  box-shadow: 0px 0px 0px #000000;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 35px;
  padding-right: 35px;
  border-top: 2px solid #ffff00;
  border-bottom: 2px solid #ffff00;
  border-left: 2px solid #ffff00;
  border-right: 2px solid #ffff00;
  border-radius: 40px;">You Took 200MB Before</a>
'
;}
else{echo '
<a style ="  font-family: monospace;
  color: #00ff00;
  font-size: 15px;
  font-weight: bolder;
  text-shadow: 1px 0px 0px #00ff00;
  background-color: #000000;
  box-shadow: 0px 0px 0px #000000;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 35px;
  padding-right: 35px;
  border-top: 2px solid #00ff00;
  border-bottom: 2px solid #00ff00;
  border-left: 2px solid #00ff00;
  border-right: 2px solid #00ff00;
  border-radius: 40px;">Done Added 200MB</a>
' 
;}
  }
  
if ($eDesc!="Success") {echo '
<a style ="font-family: monospace;
  color: #ff0000;
  font-size: 15px;
  font-weight: bolder;
  text-shadow: 1px 0px 0px #ff0000;
  background-color: #000000;
  box-shadow: 0px 0px 0px #000000;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 35px;
  padding-right: 35px;
  border-top: 2px solid #ff0000;
  border-bottom: 2px solid #ff0000;
  border-left: 2px solid #ff0000;
  border-right: 2px solid #ff0000;
  border-radius: 40px;">Wrong Number Or Password</a>
'
;}
}
}
}
?>
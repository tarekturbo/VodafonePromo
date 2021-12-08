<?php
	$num=$_GET['phone'];
	$pas=$_GET['password'];
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
      return $response;
    }

    function promo($url ,$post,$user_pwd) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch,CURLOPT_FAILONERROR,1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERPWD, $user_pwd);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=UTF-8") );
		$response =curl_exec($ch);
		return $response;
	}
    $bot = json_decode(post($url2, $user_pwd), true);
    @$user=$bot["user"]["firstName"];
    @$eDesc=$bot["eDesc"];
if ($eDesc=="Success") {
    $bot2 = json_decode(promo($url, $data, $user_pwd), true);
    $eDesc2=$bot2["eDesc"];
    if ($eDesc2=="MAX_PROMO_REDEMPTIONS_REACHED") {
		echo 'taken';
	}
	else{
		echo 'succes';
	}
}
if ($eDesc!="Success") {echo 'error';}
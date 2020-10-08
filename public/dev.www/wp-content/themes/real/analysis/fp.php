<a href='http://smartphone.userlocal.jp/' target='_blank'><img src='http://le.nakanohito.jp/le/1/?id=6011046&h=0cc8&lt=3&guid=ON&eflg=1' alt='スマートフォン解析' height='1' width='1' border='0' /></a>
<?php
if(!function_exists('send_google_analytics')){
	function send_google_analytics(){
		$cid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		// 32 bits for "time_low"
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
		// 16 bits for "time_mid"
		mt_rand( 0, 0xffff ),
		// 16 bits for "time_hi_and_version",
		// four most significant bits holds version number 4
		mt_rand( 0, 0x0fff ) | 0x4000,
		// 16 bits, 8 bits for "clk_seq_hi_res",
		// 8 bits for "clk_seq_low",
		// two most significant bits holds zero and one for variant DCE1.1
		mt_rand( 0, 0x3fff ) | 0x8000,
		// 48 bits for "node"
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
		 
		$data = array( // This is an associative array that will contain all the parameters that we'll send to Google Analytics
		'v' => 1, // The version of the measurement protocol
		'tid' => 'UA-21413048-20',
		'cid' => $cid, // The UUID
		't' => 'pageview', // Hit Type
		);
		$data['uid'] = (isset($_SERVER['HTTP_X_SMAPRO_UID']) ? $_SERVER['HTTP_X_SMAPRO_UID'] : '');
		$data['dh'] = (isset($_SERVER['HTTP_WP_HOST']) ? $_SERVER['HTTP_WP_HOST'] : ""); // The domain of the site that is associated with the Google Analytics ID
		//$data['dl'] = (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ""); // The landing page
		$data['dl'] = (isset($_SERVER['HTTP_WP_HOST'],$_SERVER['REQUEST_URI']) ? 'http://'.$_SERVER['HTTP_WP_HOST'].$_SERVER['REQUEST_URI'] : ""); // The landing page
		$data['dr'] = $_SERVER['HTTP_REFERER']; // The URL of the site that is sending the visit. Format: http%3A%2F%2Fexample.com
		$data['dp'] = (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ""); // The page that will receive the pageview
		$data['dt'] = (isset($_REQUEST['page_title']) ? $_REQUEST['page_title'] : ""); // The title of the page that receives the pageview. In my case, this is a "virtual" page. So, I'm passing the title through the URL.
		//$data['cs'] = (isset($_REQUEST['utm_source']) ? $_REQUEST['utm_source'] : ""); // The source of the visit (e.g. google)
		//$data['cm'] = (isset($_REQUEST['utm_medium']) ? $_REQUEST['utm_medium'] : ""); // The medium (e.g. cpc)
		//$data['cn'] = (isset($_REQUEST['utm_campaign']) ? $_REQUEST['utm_campaign'] : ""); // The name of the campaign
		//$data['ck'] = (isset($_REQUEST['utm_term']) ? $_REQUEST['utm_term'] : ""); // The keyword that the user searched for
		//$data['cc'] = (isset($_REQUEST['utm_content']) ? $_REQUEST['utm_content'] : ""); // Used to differentiate ads or links that point to the same URL.

		$url = 'http://www.google-analytics.com/collect'; // This is the URL to which we'll be sending the post request.
		$content = http_build_query($data); // The body of the post must include exactly 1 URI encoded payload and must be no longer than 8192 bytes. See http_build_query.
		$content = utf8_encode($content); // The payload must be UTF-8 encoded.
		$user_agent = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'LiveRealmadrid/1.0 (http://f.liverealmadrid.jp/)'); // Throwing in a user agent just for good measure.
		//$user_agent = 'LiveRealmadrid/1.0 (http://f.liverealmadrid.jp/)'; // Throwing in a user agent just for good measure.

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-type: application/x-www-form-urlencoded'));
		curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
		curl_setopt($ch,CURLOPT_POST, TRUE);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $content);
		//ヘッダを画面出力しない
		curl_setopt($ch,CURLOPT_HEADER, false);
		//リクエストヘッダ出力設定
		curl_setopt($ch,CURLINFO_HEADER_OUT,true);
		//返り値を画面出力しない
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		//400以上のステータスコードが返ってきた場合取得しない
		curl_setopt($ch,CURLOPT_FAILONERROR,true);

		curl_exec($ch);
		//リクエストヘッダ出力
		echo '<!--';
		echo curl_getinfo($ch,CURLINFO_HEADER_OUT);
		echo '-->';
		curl_close($ch);

		/*
		//echo 'a';
		$url  = 'http://www.google-analytics.com/collect';
		$url .= '?v='.$data['v'];
		$url .= '&tid='.$data['tid'];
		$url .= '&cid='.$data['cid'];
		$url .= '&t='.$data['t'];
		echo '<img src="'.$url.'">';
		*/
	}
	send_google_analytics();
}
?>
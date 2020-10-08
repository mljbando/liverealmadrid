<?php
  
  // 端末別処理切り替え用テンプレート

/*
if(isset($_SERVER['HTTP_WP_HOST'])){
	if (is_device()==="sp"|| is_device()==="tab"){
		// スマートフォンからアクセスされた場合
		echo '<!-- スマートフォンからアクセスされた場合 -->';
	}
	if (is_device()==="mb"){
		// ガラケーからアクセスされた場合
		echo '<!-- ガラケーからアクセスされた場合-->';
	}
}
else{
	if (is_device()==="pc"){
		// PCからアクセスされた場合
		echo '<!-- PCからアクセスされた場合-->';
	}
}
*/
?>
<?php
//----------------------------------------------------
//  デバイス判定
//----------------------------------------------------
function is_device()
{
	$device_info = '';
	// ユーザーエージェントを変数に格納する。
	$ua = $_SERVER['HTTP_USER_AGENT'];
	//  スマートフォンで判定したい端末のUAを配列に入れる
	$spes = array(
			'iPhone',         // Apple iPhone
			'iPod',           // Apple iPod touch
			'Android',        // Android
			'dream',          // Pre 1.5 Android
			'CUPCAKE',        // 1.5+ Android
			'blackberry',     // blackberry
			'webOS',          // Palm Pre Experimental
			'incognito',      // Other iPhone browser
			'webmate'         // Other iPhone browser
		);
	// タブレットで判定したい端末のUAを配列に入れる
	$tabs = array(
			'iPad',
			'Android'
		);
	// ガラケーで判定したい端末のUAを配列に入れる。
	$mbes = array(
			'DoCoMo',
			'KDDI',
			'DDIPOKET',
			'UP.Browser',
			'J-PHONE',
			'Vodafone',
			'SoftBank',
		);
	// デバイス変数が空だったら判定する
	if(empty($device_info))
	{
		// タブレット判定
		foreach($tabs as $tab)
		{
			 $str = "/".$tab."/i";
			 // ユーザーエージェントにstrが含まれていたら実行する
			 if (preg_match($str,$ua))
			{
				// strがAndroidだったらのモバイル判定を行う。
				if ($str === '/Android/i')
				{
					// ユーザーエージェントにMobileが含まれていなかったらタブレット
					if (!preg_match("/Mobile/i", $ua)) {
						$device_info = 'tab';
					}
					// ユーザーエージェントにMobileが含まれていたらスマートフォン
					else
					{
						$device_info = 'sp';
					}
				}
				// Android以外はそのまま結果を返す
				else
				{
					$device_info = 'tab';
				}
			}
		}
	}
	// デバイス変数が空だったら判定する
	if(empty($device_info))
	{
		// スマートフォン判定
		foreach($spes as $sp)
		{
			$str = "/".$sp."/i";
			 // ユーザーエージェントにstrが含まれていたらスマートフォン
			 if (preg_match($str,$ua))
			{
				$device_info = 'sp';
			}
		}
	}
	// デバイス変数が空だったら判定する
	if(empty($device_info))
	{
		// ガラケー判定
		foreach($mbes as $mb)
		{
			$str = "/".$mb."/i";
			 // ユーザーエージェントにstrが含まれていたらガラケー
			 if (preg_match($str,$ua))
			{
				 $device_info = 'mb';
			}
		}
	}
	// どの判定にも引っかからなかった場合はPCとする
	if(empty($device_info))
	{
		$device_info = 'pc';
	}
	return $device_info;
}
/* UAによってHOST切り替え */
add_action('init', 'ua_check', 10);
function ua_check(){
	// wp-adminなどはリダイレクトしない
	if(strpos($_SERVER['REQUEST_URI'],'/wp-')!==0){
		if(!isset($_SERVER['HTTP_WP_HOST'])){
			if (is_device()==="sp"){
				// スマートフォンからアクセスされた場合
				header("${_SERVER['SERVER_PROTOCOL']} 301 Moved Permanently");
		//		header("Location:http://s.liverealmadrid.jp");
				header("Location:http://s.liverealmadrid.jp${_SERVER['REDIRECT_URL']}");
				exit();
			}
			if (is_device()==="mb"){
	//			print_r("Location:http://f.liverealmadrid.jp");
	//			print_r($_SERVER);
				// ガラケーからアクセスされた場合
				header("${_SERVER['SERVER_PROTOCOL']} 301 Moved Permanently");
				header("Location:http://f.liverealmadrid.jp");
	//			header("Location:http://f.liverealmadrid.jp${_SERVER['REDIRECT_URL']}");
				exit();
			}
		}
	}
}
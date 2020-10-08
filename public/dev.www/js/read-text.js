/*read-text
*/


jQuery(function($) {
	$('.read-text').each(function() {
		// 行数
		var row = 10;
		
		var $target = $(this);
		
		// オリジナルの文章を取得する
		var html = $target.html();
		
		var $clone = $target.clone();
		$clone
			.css({
				display: 'none',
				position : 'absolute',
				overflow : 'visible'
			})
			.width($target.width())
			.height('auto');
		
		$target.after($clone);
		
		// 必要な行数の高さを取得。取得した高さ以外は不要。
		var $temp = $clone.clone();
		var _tempStr = "";
		for (var i=0; i<row; i++) {
			_tempStr += "あ<br>";
		}
		$temp.html(_tempStr);
		$target.after($temp);
		var targetHeight = $temp.height();
		$temp.remove();
		
		// 指定した高さになるまで、1文字ずつ消去していく
		while((html.length > 0) && ($clone.height() > targetHeight)) {
			html = html.substr(0, html.length - 1);
			
			// 閉じタグの保管を考慮するためDOMに戻してから入れ直す
			$clone.html($('<span>' + html + '</span>').html() + '･･･');
		}
		
		// 文章を入れ替えて
		$target.html($clone.html());
		
		//複製した要素を削除する
		$clone.remove();
	});
});


jQuery(function($) {
	$('.read-title').each(function() {
		// 行数
		var row = 2;
		
		var $target = $(this);
		
		// オリジナルの文章を取得する
		var html = $target.html();
		
		var $clone = $target.clone();
		$clone
			.css({
				display: 'none',
				position : 'absolute',
				overflow : 'visible'
			})
			.width($target.width())
			.height('auto');
		
		$target.after($clone);
		
		// 必要な行数の高さを取得。取得した高さ以外は不要。
		var $temp = $clone.clone();
		var _tempStr = "";
		for (var i=0; i<row; i++) {
			_tempStr += "あ<br>";
		}
		$temp.html(_tempStr);
		$target.after($temp);
		var targetHeight = $temp.height();
		$temp.remove();
		
		// 指定した高さになるまで、1文字ずつ消去していく
		while((html.length > 0) && ($clone.height() > targetHeight)) {
			html = html.substr(0, html.length - 1);
			
			// 閉じタグの保管を考慮するためDOMに戻してから入れ直す
			$clone.html($('<span>' + html + '</span>').html() + '･･･');
		}
		
		// 文章を入れ替えて
		$target.html($clone.html());
		
		//複製した要素を削除する
		$clone.remove();
	});
});
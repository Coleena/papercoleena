function getCookie(cookieName) {
    var name = cookieName + "=";
    var cookieArray = document.cookie.split(';');
    for(var i=0; i < cookieArray.length; i++) {
        var c = cookieArray[i];
        while (c.charAt(0)==' '){
			c = c.substring(1);
		}
        if (c.indexOf(name) == 0){
			return c.substring(name.length,c.length);
		}
    }
    return "";
}

$(document).ready(function(){
	// Toggle displays based on browser cookies
	if(getCookie("displayJapanese") == "true"){
		$('.hiddenjapanese').css('display', 'inline-block');
		$('.placeholderjapanese').hide();
	}
	if(getCookie("displayRomaji") == "false"){
		$('.romaji').hide();
		$('.placeholderromaji').css('display', 'inline-block');
	}
	if(getCookie("displayCalls") == "true"){
		$('.calls').css('display', 'inline-block');
		$('.placeholdercalls').hide();
	}
	if(getCookie("titlePreference") == "japanese"){
		$('.romajipreference').hide();
		$('.japanesepreference').show();
	}
	
	// Display submenu when settings gear hovered over
	var timer;
	$('#settingsbutton').mouseenter(function(){
			clearTimeout(timer);
			$('#settingsmenu').addClass("active");
		}
	).mouseleave(function(){
		timer = setTimeout(function(){
			$('#settingsmenu').removeClass("active");
		},50)
	});
	$('#settingsmenu').mouseenter(function(){
		clearTimeout(timer);
	});
	$('#settingsmenu').mouseleave(function(){
		timer = setTimeout(function(){
			$('#settingsmenu').removeClass("active");
		},80)
	});
	
	// Set cookies when Japanese toggle clicked (default false)
	$('#japanesetoggle').click(function(){
		if(getCookie("displayJapanese") == ""){
			document.cookie = "displayJapanese=true"
			$('.hiddenjapanese').css('display', 'inline-block');
			$('.placeholderjapanese').hide();
		}
		else{
			document.cookie = "displayJapanese=";
			$('.hiddenjapanese').hide();
			$('.placeholderjapanese').css('display', 'inline-block');
		}
	});
	
	// Set cookies when romaji toggle clicked (default true)
	$('#romajitoggle').click(function(){
		if(getCookie("displayRomaji") == ""){
			document.cookie = "displayRomaji=false";
			$('.romaji').hide();
			$('.placeholderromaji').css('display', 'inline-block');
		}
		else{
			document.cookie = "displayRomaji=";
			$('.romaji').css('display', 'inline-block');
			$('.placeholderromaji').hide();
		}
	});
	
	// Set cookies when calls toggle clicked (default false)
	$('#callstoggle').click(function(){
		if(getCookie("displayCalls") == ""){
			document.cookie = "displayCalls=true";
			$('.calls').css('display', 'inline-block');
			$('.placeholdercalls').hide();
		}
		else{
			document.cookie = "displayCalls=";
			$('.calls').hide();
			$('.placeholdercalls').css('display', 'inline-block');
		}
	});
	
	// Set cookies when title toggle clicked (default romaji)
	$('#preferencetoggle').click(function(){
		if(getCookie("titlePreference") == ""){
			document.cookie = "titlePreference=japanese";
			$('.romajipreference').hide();
			$('.japanesepreference').show();
		}
		else{
			document.cookie = "titlePreference=";
			$('.romajipreference').show();
			$('.japanesepreference').hide();
		}
	});
})
function inputTyping(formNames,kanaElements,keyCode,thisObj){
		var alphabet = new Array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		var kana = new Array(	"ア","イ","ウ","エ","オ",
					"カ","キ","ク","ケ","コ",
					"サ","シ","ス","セ","ソ",
					"タ","チ","ツ","テ","ト",
					"ナ","ニ","ヌ","ネ","ノ",
					"ハ","ヒ","フ","フ","ヘ",
					"マ","ミ","ム","メ","モ",
					"ヤ","ユ","ヨ",
					"ラ","リ","ル","レ","ロ",
					"ワ","ヰ","ヱ","ヲ",
					"ン",
					"イェ",
					"シ","チ","ツ",
					"ファ","フィ","フェ","フォ",
					"ァ","ィ","ゥ","ェ","ォ",
					"ヴァ","ヴィ","ヴ","ヴェ","ヴォ",
					"クァ","クィ","クェ","クォ",
					"ガ","ギ","グ","ゲ","ゴ",
					"ザ","ジ","ジ","ズ","ゼ","ゾ",
					"ダ","ヂ","ヅ","デ","ド",
					"ホ","バ","ビ","ブ","ベ","ボ",
					"パ","ピ","プ","ペ","ポ",
					"ジャ","ジュ","ジョ",
					"キャ","キュ","キョ",
					"ギャ","ギュ","ギョ",
					"シャ","シュ","ショ",
					"シャ","シュ","ショ",
					"ジャ","ジュ","ジョ",
					"チャ","チュ","チョ",
					"ヂャ","ヂュ","ヂョ",
					"チャ","チュ","チョ",
					"ニャ","ニュ","ニョ",
					"ヒャ","ヒュ","ヒョ",
					"ビャ","ビュ","ビョ",
					"ピャ","ピュ","ピョ",
					"ミャ","ミュ","ミョ",
					"リャ","リュ","リョ",
					"シェ","シェ","ジェ","ジェ",
					"チェ","チェ",
					"ツァ","ツェ","ツォ",
					"ティ","ヂ","ヂュ",
					"ヵ","ヶ","ッ",
					"ャ","ュ","ョ","ヮ",
					"ウィ","ヰ","ウェ","ヱ","ウォ",
					"ヴュ","ツィ",
					"クァ","クィ","クェ","クォ","グァ",
					"ジャ","ジュ","ジョ",
					"チャ","チュ","チョ",
					"ティ","ヂ","テュ",
					"トゥ","ドゥ",
					"ファ","フィ","フェ","フォ",
					"フュ","フュ",
					"ンb","ンc","ンd","ンf","ンg","ンh","ンj","ンk","ンl","ンm","ンp","ンq","ンr","ンs","ンt","ンv","ンw","ンx","ンz", 
					"ッb","ッc","ッd","ッf","ッg","ッh","ッj","ッk","ッl","ッm","ッp","ッq","ッr","ッs","ッt","ッv","ッw","ッx","ッy","ッz");
		var roma = new Array(	"a","i","u","e","o",
					"ka","ki","ku","ke","ko",
					"sa","si","su","se","so",
					"ta","ti","tu","te","to",
					"na","ni","nu","ne","no",
					"ha","hi","hu","fu","he",
					"ma","mi","mu","me","mo",
					"ya","yu","yo",
					"ra","ri","ru","re","ro",
					"wa","wyi","wye","wo",
					"nn",
					"ye",
					"shi","chi","tsu",
					"fa","fi","fe","fo",
					"xa","xi","xu","xe","xo",
					"va","vi","vu","ve","vo",
					"qa","qi","qe","qo",
					"ga","gi","gu","ge","go",
					"za","zi","ji","zu","ze","zo",
					"da","di","du","de","do",
					"ho","ba","bi","bu","be","bo",
					"pa","pi","pu","pe","po",
					"ja","ju","jo",
					"kya","kyu","kyo",
					"gya","gyu","gyo",
					"sya","syu","syo",
					"sha","shu","sho",
					"zya","zyu","zyo",
					"tya","tyu","tyo",
					"dya","dyu","dyo",
					"cha","chu","cho",
					"nya","nyu","nyo",
					"hya","hyu","hyo",
					"bya","byu","byo",
					"pya","pyu","pyo",
					"mya","myu","myo",
					"rya","ryu","ryo",
					"sye","she","zye","je",
					"tye","che",
					"tsa","tse","tso",
					"thi","dhi","dhu",
					"xka","xke","xtu",
					"xya","xyu","xyo","xwa",
					"whi","wi","whe","we","who",
					"vyu","tsi",
					"kwa","kwi","kwe","kwo","gwa",
					"jya","jyu","jyo",
					"cya","cyu","cyo",
					"thi","dhi","thu",
					"twu","dwu",
					"hwa","hwi","hwe","hwo",
					"fyu","hwyu",
					"nb","nc","nd","nf","ng","nh","nj","nk","nl","nm","np","nq","nr","ns","nt","nv","nw","nx","nz",
					"bb","cc","dd","ff","gg","hh","jj","kk","ll","mm","pp","qq","rr","ss","tt","vv","ww","xx","yy","zz");
		if(document.forms[formNames].elements[kanaElements].value == document.forms[formNames].elements[kanaElements].defaultValue){
			document.forms[formNames].elements[kanaElements].value = "";
		}
		if(keyCode > 64 && keyCode < 91){
			window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value + alphabet[keyCode - 65];
			for(i=roma.length;i > -1;i--){
				window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value.replace(roma[i],kana[i]);
			}
		}
		else if(keyCode == 8){
			kanavalue = window.document.forms[formNames].elements[kanaElements].value;
			window.document.forms[formNames].elements[kanaElements].value = kanavalue.substring(0,kanavalue.length - 1);
		}
		else if(keyCode == 32){
			//window.document.forms[formNames].elements[kanaElements].value += " ";
		}
		else if(keyCode == 45){
			window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value + "-";
			for(i=roma.length;i > -1;i--){
				window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value.replace(roma[i],kana[i]);
			}
		}
		else if(keyCode == 109 || keyCode == 189){
			window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value + "-";
			for(i=roma.length;i > -1;i--){
				window.document.forms[formNames].elements[kanaElements].value = window.document.forms[formNames].elements[kanaElements].value.replace(roma[i],kana[i]);
			}
		}
		if(thisObj.value == "")
			window.document.forms[formNames].elements[kanaElements].value = "";
		return false;
	}

$(document).ready(function(){
	$('.toTop').click(function(){
		$('body,html').animate({scrollTop:0}, 1000);
		return false;
	});

	var $gal = $(".galBox").hide();
    var gallarybox = $gal.length;
    if( gallarybox <= 12){
    	$('.galBtn').hide();
    }
	$gal.slice(0, 12).show();
    $gal.slice(0, 12).addClass('show');
    var show = $('.show').length;
    var ftext = 'もっと見る（画像';
    var remain = gallarybox - show;
    var ltext = '件）';
    $('.galBtn a').html(ftext + remain + ltext);
    var x = 12,
        start = 0;
    $('.galBtn a').click(function () {
        if (start + x < gallarybox) {
            start += x;
            $gal.slice(start, start + x).show();
            $gal.slice(start, start + x).addClass('show');
            show = $('.show').length;
            remain = gallarybox - show;
            $('.galBtn a').html(ftext + remain + ltext);
            if (remain == 0) {
            	$('.galBtn').hide();
            }
        }
    });

});
$(function() {
	$(window).scroll(function () {
		
	});
});
$(function() {
            $('a[href*="#"]:not([href="#"])').click(function() {
              if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                  $('html, body').animate({
                    scrollTop: target.offset().top
                  }, 1000);
                  return false;
            }
         }
     });
});

$(function(){
 var slider = $('.bxslider').bxSlider({
  mode: 'horizontal',
  options:true,
  speed: 600,
  auto: true,
   
});

$('#reload-slider').click(function(e){
  e.preventDefault();
  slider.reloadSlider({
    mode: 'fade',
    auto: true,
    pause: 1000,
    options:true,
    speed: 500
  });
});
});




                  
if($.type($.material) !== "undefined")
{
$.material.init();
}


    $('a').mouseenter(function(event) {
        $(this).children('.gri').css("color","#009688");
    }).mouseleave(function(event){
        $(this).children('.gri').css("color","#C8C8C8");
    });

$('#loginBtnid').click(function(){
    $.ajax({
        url: '/login/giris',
        type: 'POST',
        dataType: 'json',
        data: {
            email: $('[name="email"]').val(),
            sifre: $('[name="password"]').val() 
        },
    })
    .done(function(data) {
        if(data.Result == "Hata1"){
            var n = noty({
    text: 'Girilen bilgiler yanlış',
    layout: 'topRight',
    type: 'error',
    timeout: '50',
    animation: {
        open: 'animated bounceIn', // Animate.css class names
        close: 'animated bounceOut', // Animate.css class names
    }
    });
        }
        else{
            if(data.active == 1) {
                console.log("active true");
                var n = noty({
    text: 'Giriş Başarılı',
    layout: 'topRight',
    type: 'success',
    timeout: '50',
    animation: {
        open: 'animated bounceIn', // Animate.css class names
        close: 'animated bounceOut', // Animate.css class names
    }
    });
            }
            else{
                // Alert Aktif Değil Fonksiyonu ekle
            }
        }
    })
    .fail(function(data) {
        console.log("error");
    })
    .always(function(data) {
        console.log("complete");
    });
    
});


$('#registerBtnid').click(function(){
$('#registerBtnid').attr( "disabled", "disabled" );
    if ($('[name="sartlarChcBox"]').is(':checked')) {

        if ($('[name="username"]').val().length < 4) {
            $('#registerBtnid').removeAttr( "disabled");
            var n = noty({
                text: 'Username 3 Karakterden Büyük Olmalı',
                layout: 'topRight',
                type: 'error',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
                return false;
        }else if($('[name="password"]').val().length < 6) {
            $('#registerBtnid').removeAttr( "disabled");
            var n = noty({
                text: 'Şifre 5 Karakterden büyük olmalı',
                layout: 'topRight',
                type: 'error',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
                return false;
        }

    $.ajax({
        type: "POST",
        url: url + "register/kayit",
        data: {
            username: $('[name="username"]').val(),
            email: $('[name="email"]').val(),
            password: $('[name="password"]').val()
        },
        dataType: "json",
        error: function(){
            console.log("Error çalıştı");
        },
        success: function(sonuc){
            $('#registerBtnid').removeAttr( "disabled");
            if(sonuc == "Hata2"){
                var n = noty({
                text: 'Girilen Kullanıcı adı daha önceden kullanılmış',
                layout: 'topRight',
                type: 'error',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
            }
            else if(sonuc == "Hata3"){
                $('#registerBtnid').removeAttr( "disabled");
                 var n = noty({
                text: 'Girilen Email daha önceden kullanılmış',
                layout: 'topRight',
                type: 'error',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
            }
            else if(sonuc == "basarili"){
                var n = noty({
                text: 'Kayıt işlemi başarılı. Lütfen Mail adresini kontrol ederek aktivasyonu yapınız.',
                layout: 'top',
                type: 'success',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
              setTimeout(function(){  window.location.href = url; }, 6000); 
            }
        },
        done: function(){
            console.log("ajax post bitti");
        }
    });
}
else{
    $('#registerBtnid').removeAttr( "disabled");
    console.log("kullanım şartları seçilmedi");
     var n = noty({
                text: 'Kayıt olabilmek için öncelikle sitemizin kullanım şartlarını okuyup, onaylamanız gerekmektedir.',
                layout: 'topRight',
                type: 'error',
                animation: {
                    open: 'animated bounceIn', // Animate.css class names
                    close: 'animated bounceOut', // Animate.css class names
                }
                });
}
});

/*
$('[name="aramabtn"]').click(function(){
    $.ajax({
        type: "POST",
        url: url + "search/s/deneme",
        data: {
            veri: "veri"
        },
        dataType: "json",
        done: function(){
            console.log("bitti");
        }
    });
});*/


$('#sorugonderbtn').click(function(){
if($('#questiondetail').val().length < 5){
    var n = noty({
    text: 'Soru başlığı daha uzun olmalı',
    layout: 'topRight',
    type: 'error',
    timeout: '50',
    animation: {
        open: 'animated bounceIn', // Animate.css class names
        close: 'animated bounceOut', // Animate.css class names
    }
    });
console.log("Yetersiz karakter sayısı");
return false;
}

var sycinputsayi = 0;
$('[name="anketsorusu[]"]').each(function(a,b){
   if($(b).val() != "" && $(b).val().trim().length >= 1){
       sycinputsayi++;
   }
 });

console.log(sycinputsayi);
if(sycinputsayi < 2){
    var n = noty({
    text: 'En az 2 seçenek olmalı',
    layout: 'topRight',
    type: 'error',
    timeout: '50',
    animation: {
        open: 'animated bounceIn', // Animate.css class names
        close: 'animated bounceOut', // Animate.css class names
    }
    });
    return false;
}
});


$(function() {

    var questionInput;
    var syc = 2;

    if ($('[name="anketsorusu[]"]').length !== 0){
        $('[name="questionform"]').on('focus', '[name="anketsorusu[]"]:last', function(){
            
            if(this == $('[name="anketsorusu[]"]').last()){
                alert("asd");
            }
            $('#sorugonderbtn').before('<div class="row"><div class="pull-left radio radio-primary"><label><input name="optionsRadios" value="checked'+syc+'" type="radio" /><span class="circle"></span><span class="check"></span></label></div><div class="col-md-9 form-group label-placeholder is-empty"><label for="ip'+syc+'" class="control-label">Seçenek eklemek için tıklayınız</label><input class="form-control" id="ip'+syc+++'" type="text" name="anketsorusu[]" /></div></div>');
        });
    }
});

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '650475058437271',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42442811-10', 'auto');
  ga('send', 'pageview');


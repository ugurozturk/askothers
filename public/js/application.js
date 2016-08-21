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

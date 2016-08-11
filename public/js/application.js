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

        }
        else{
            if(data.active == 1) {
                console.log("active true");
                //#4cdb73 Alert fonksiyonu ekle
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


$(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

    var questionInput;
    var syc = 2;

    if ($('[name="anketsorusu[]"]').length !== 0){
        $('[name="questionform"]').on('click', '[name="anketsorusu[]"]:last', function(){
            console.log(this);
            if(this == $('[name="anketsorusu[]"]').last()){
                alert("asd");
            }
            $('#sorugonderbtn').before('<div class="row"><div class="pull-left radio radio-primary"><label><input name="optionsRadios" value="checked'+syc+'" type="radio" /><span class="circle"></span><span class="check"></span></label></div><div class="col-md-9 form-group label-placeholder is-empty"><label for="ip'+syc+'" class="control-label">Seçenek eklemek için tıklayınız</label><input class="form-control" id="ip'+syc+++'" type="text" name="anketsorusu[]" /></div></div>');
        });
    }
});

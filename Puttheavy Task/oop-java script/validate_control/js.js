//email
function isValidEmailAddress(emailAddress){
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
//url
function validateURL(textval) {
    var url = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|localhost|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
    return url.test(textval);
}
//jquery validate
$(function(){


     //check all field
     $('.mfp_err').hide();
     $('.mfp').on('focusout',function () {
        var mfp =$(this).val();
        if(mfp !=''){
            $(this).next('.mfp_err').hide();
        }else{
            $(this).next('.mfp_err').show();
        }
     });

     //check email field
    $('.mfp_email').on('focusout', function () {
        var mfp_email =$('.mfp_email').val();
        $('.mfp_err_email').hide();
        if(mfp_email ==''){
            $('#error_msg_email').html('Empty Email');
            $('.mfp_err_email').show();
        }else{
            if(!isValidEmailAddress(mfp_email)){
                $('#error_msg_email').html('Invalid Email');
                $('.mfp_err_email').show();
            }
        }
    });
     //check url field
    $('.mfp_url').on('focusout',function () {
       var mfp_url = $('.mfp_url').val();
       $('.mfp_err_url').hide();
       if(mfp_url == ''){
           $('#error_msg_url').html('Empty Url');
           $('.mfp_err_url').show();
       }else{
           if(!validateURL(mfp_url)){
               $('#error_msg_url').html('Invalid Url');
               $('.mfp_err_url').show();

           }
       }
    });


     //verified after click submit
     $('.btn').click(function (e) {

         var error = 0;

         $('.mfp').each(function () {
           if($(this).val() == ''){
               e.preventDefault();
               error ++;
               $('#error_msg').html('invalid');
               $(this).next('.mfp_err').show();
           }
        });
     //    email
         $('.mfp_email').each(function () {
             var mfp_email =$('.mfp_email').val();
             if(mfp_email == ''){
                 e.preventDefault();
                 error ++;
                 $('#error_msg_email').html('Invalid');
                 $('.mfp_err_email').show();
             }
         });
         //url

         if(error - 0 == 0){
         }

     });

//     end function
});
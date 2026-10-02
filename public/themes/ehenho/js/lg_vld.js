$(document).ready(function() {

$("#login_form").validate({
    focusInvalid: false,
    errorElement: 'span',
    invalidHandler: function(form, validator) {     
        if (!validator.numberOfInvalids())                
            return;

        $('html, body').animate({
            scrollTop: $(validator.errorList[0].element).offset().top - $(validator.errorList[0].element).height() - 12 - 50
        }, 1000);   
        var applyFocus = function(){$(validator.errorList[0].element).focus();}; window.setTimeout(applyFocus, 15);
    },
    rules: {
        login: { required: true},
        password: { required: true},
    },
    messages: {
        login: { required: "<div class='well well-sm login-error-well'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Vui lòng nhập địa chỉ email.</div>",
            invalid: "<div class='well well-sm login-error-well'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Vui lòng nhập địa chỉ email hợp lệ.</div>",
            email: "<div class='well well-sm login-error-well'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Vui lòng nhập địa chỉ email hợp lệ.</div>",},
        password: { required: "<div class='well well-sm login-error-well'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Vui lòng nhập mật khẩu.</div>",},
    },
}); 


});


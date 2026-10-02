$(document).ready(function() {
    $("#change_pw_form").validate({
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
            oldpassword: { required: true },
            password1: { required: true, minlength: 6 },
            password2: { required: true, minlength: 6 },
        },
        messages: {
            oldpassword: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập mật khẩu hiện tại của bạn.",},
            password1: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập mật khẩu mới.",
                         minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Mật khẩu quá ngắn. Bạn vui lòng nhập mật khẩu có ít nhất 6 ký tự.",},
            password2: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập mật khẩu mới (nhắc lại).",
                         minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Mật khẩu quá ngắn. Bạn vui lòng nhập mật khẩu có ít nhất 6 ký tự.",},
        },
    });
});


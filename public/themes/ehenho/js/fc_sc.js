$(document).ready(function() {
    $("#signup_form").validate({
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
            email: { required: true, maxlength: 120 },
            password: { required: true, minlength: 6 },
            name: { required: true, minlength: 2, maxlength: 120 },
            headline: { required: true, minlength: 2, maxlength: 120 },
            dob: { required: true },
            master_appearance: { required: true },
            master_interest: { required: true },
            master_personality: { required: true },
            way_of_life: { required: true },
            most_valued: { required: true },
            i_am: { required: true, minlength: 5, maxlength: 3000 },
            my_match: { required: true, minlength: 5, maxlength: 3000 },
        },
        messages: {
            email: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập địa chỉ email của bạn.", 
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Địa chỉ email quá dài. Bạn vui lòng nhập địa chỉ email có nhiều nhất 120 ký tự.",
                    pattern: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Địa chỉ email chưa hợp lệ. Bạn vui lòng kiểm lại."},
            password: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập mật khẩu.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Mật khẩu quá ngắn. Bạn vui lòng nhập mật khẩu có ít nhất 6 ký tự." },
            name: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập tên của bạn.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tên quá ngắn. Bạn vui lòng nhập tên có ít nhất 2 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tên quá dài. Bạn vui lòng nhập tên có nhiều nhất 120 ký tự." },
            headline: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập tiêu đề hồ sơ của bạn.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tiêu đề hồ sơ quá ngắn. Bạn vui lòng nhập tiêu đề hồ sơ có ít nhất 2 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tiêu đề hồ sơ quá dài. Bạn vui lòng nhập tiêu đề hồ sơ có nhiều nhất 120 ký tự." },
            dob: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập ngày sinh của bạn." },
            master_appearance: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn mô tả ngoại hình." },
            master_interest: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn sở thích." },
            master_personality: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn mô tả tính cách." },
            way_of_life: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn lối sống." },
            most_valued: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn thứ qúy giá nhất." },
            i_am: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập nội dung vào ô 'Về tôi'.",
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá ngắn. Bạn vui lòng nhập nội dung có ít nhất 5 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá dài. Bạn vui lòng nhập nội dung có nhiều nhất 3,000 ký tự.", },            
            my_match: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập nội dung vào ô 'Tìm người'.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá ngắn. Bạn vui lòng nhập nội dung có ít nhất 5 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá dài. Bạn vui lòng nhập nội dung có nhiều nhất 3,000 ký tự.", },
        },
        ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
        errorPlacement: function(error, element) {
            if ( $(element).hasClass('selectized') )
                error.insertAfter($(element).nextAll('.selectize-control'));
            else
                error.insertAfter(element);
        }
        

    }); 

    //$('#id_submit').on('click', function() {
    //    $("#signup_form").valid();
    //});
});


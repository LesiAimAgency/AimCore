$(document).ready(function() {
    $("#pe_form").validate({
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
            name: { required: true, minlength: 2, maxlength: 120 },
            dob: { required: true },
            headline: { required: true, minlength: 2, maxlength: 120 },
            master_appearance: { required: true },
            master_interest: { required: true },
            master_personality: { required: true },
            master_way_of_life: { required: true },
            master_most_valued: { required: true },
            i_am: { required: true, minlength: 5, maxlength: 3000 },
            my_match: { required: true, minlength: 5, maxlength: 3000 },
        },
        messages: {
            name: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập tên của bạn.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tên quá ngắn. Bạn vui lòng nhập tên có ít nhất 2 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tên quá dài. Bạn vui lòng nhập tên có nhiều nhất 120 ký tự." },
            dob: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn ngày tháng năm sinh của bạn."},
            headline: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập tiêu đề hồ sơ của bạn.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tiêu đề hồ sơ quá ngắn. Bạn vui lòng nhập tiêu đề hồ sơ có ít nhất 2 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Tiêu đề hồ sơ quá dài. Bạn vui lòng nhập tiêu đề hồ sơ ngắn hơn." },                    
            master_appearance: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn mô tả ngoại hình.",},        
            master_interest: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn sở thích.",},        
            master_personality: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn mô tả tính cách.",},        
            master_way_of_life: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn lối sống.",},        
            master_most_valued: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng chọn thứ qúy giá nhất.",},        
            i_am: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập nội dung vào ô 'Tôi là'.",
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá ngắn. Bạn vui lòng nhập nội dung có ít nhất 5 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá dài. Bạn vui lòng nhập nội dung có nhiều nhất 3,000 ký tự.", },            
            my_match: { required: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Vui lòng nhập nội dung vào ô 'Tìm người'.", 
                    minlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá ngắn. Bạn vui lòng nhập nội dung có ít nhất 5 ký tự.",
                    maxlength: "<span class='glyphicon glyphicon-exclamation-sign glyph-msg' aria-hidden='true'></span> Nội dung quá dài. Bạn vui lòng nhập nội dung có nhiều nhất 3,000 ký tự.", },
        },


    }); 
});


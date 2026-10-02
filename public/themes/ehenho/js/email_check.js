$(document).ready(function() {
        var $email = $('#id_email');
        var $hint = $("#email_hint");
        Mailcheck.defaultTopLevelDomains.push('vn', 'com.vn', 'edu.vn', 'net.vn', 'org.vn', 'gov.vn', 'biz.vn');

        $email.on('blur',function() {
            $hint.css('display', 'none').empty();
            $(this).mailcheck({
                suggested: function(element, suggestion) {
                    if(!$hint.html()) {
                            // First error - fill in/show entire hint element
                            var suggestion = "<span class='glyphicon glyphicon-info-sign' style='color:#B94A48' aria-hidden='true'></span>" +
                            " Ý bạn là <span class='suggestion'>" +
                            "<span class='address'>" + suggestion.address + "</span>"
                            + "@<a href='#' class='domain'>" + suggestion.domain + 
                            "</a></span>?";

                            $hint.html(suggestion).fadeIn(150);                    
                        } else {
                            // Subsequent errors
                            $(".address").html(suggestion.address);
                            $(".domain").html(suggestion.domain);
                            alert("suggestion_else");
                        }
                    },
                });
    });

    $hint.on('click', '.domain', function() {
            // On click, fill in the field with the suggestion and remove the hint
            $email.val($(".suggestion").text());
            $hint.fadeOut(200, function() {
                $(this).empty();
            });
            return false;
        });
});
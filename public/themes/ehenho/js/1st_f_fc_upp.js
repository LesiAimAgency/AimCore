window.onload = function() {
    if ($('#id_setfc_flag').val() == "off") {
        $('#id_setfc_flag').val("on");
        var input = document.getElementById("id_picture").focus();        
        //$('form:not(.filter) :input:visible:enabled:first').focus()
    }
}
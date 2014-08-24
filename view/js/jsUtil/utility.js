function getErrormessage(errorID) {

    return errorMessage;
}
function isEmpty(string) {
    if ($.trim(string) == "")
        return true;
    else
        return false;
}

$(document).ready(function() {
    $(".navs").click(function(e) {
        e.stopImmediatePropagation();
        e.preventDefault();
        var path = 'http://' + window.location.hostname + window.location.pathname + $(this).attr("data-url");
        $(location).attr('href', path);
    });
});
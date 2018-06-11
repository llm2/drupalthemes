
/* requires jQuery */

(function ($) {

$(document).ready(function () {

    checkCookie();

    function setNetID(){
        setCookie("netid",document.getElementById('edit-submitted-netid').value,365)

    }

    function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + ";domain=.nyu.edu;path=/";
    console.log("set cookie:" + cvalue);
    }

    function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
    }

    function checkCookie() {
    var user = getCookie("netid");
        console.log("get cookie:" + user);

        if (user != "") {
            $("#webform-client-form-25").show();
        } else {
            $("#webform-client-form-25").replaceWith("<hr/><H1>You must complete the <a href=\"http://gallatin.nyu.edu/en/utilities/forms/senior_exit.html\">Exit Survey</a> before requesting graduation tickets.</H1><hr/>");
        }
    }


    });



})(jQuery);

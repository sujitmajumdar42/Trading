$(document).ready(function() {
    $("#userLogin").click(function() {
        uname = $("#userName").val();
        pass = $("#userPass").val();
        servType = "UserLogin";
        oprCode = "userLogin";
        if (validate(uname, pass)) {
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {
                    uname: uname,
                    pass: pass,
                    servType: servType,
                    oprCode: oprCode
                },
                success: function(html) {
                    if (html == "ERR100") {
                        $("#loginResponse").show();
                        $("#loginResponse").html("Invalid Username/Password");
                    } else{
                        window.location.replace("index.php?cont=Cont_User_Home");
                    }
                }
            });
        }
    });
});

function validate(uname, pass) {
    if (uname == "" || pass == "") {
        $("#loginResponse").show();
        $("#loginResponse").html("Please Fill all fields.");
        return false;
    } else {
        $("#loginResponse").hide();
        return true;
    }

}
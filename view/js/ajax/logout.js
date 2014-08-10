$(document).ready(function(){
    $("#logout").click(function(){
        servType="LogOut";
        $.ajax({
            type:'POST',
            data:{servType:servType},
            url : "../../../controller/Router.php",
            success:function(html){
                window.location.replace("index.php");
            }
        });
    });
});
$(document).ready(function(){
	$("#err_login").css('display', 'none', 'important');
	 $("#login_submit").click(function(){	
		  username=$("#username").val();
		  password=$("#password").val();
                  servType="UsrLogin";
		  $.ajax({
		   type: "POST",
		   url: "../../../controller/Router.php",
		   data: "username="+username+"&password="+password+"&servType="+servType,
		   success: function(html){
                       alert(html);
			if(html=="true")    {
			  window.location="core/controller/Serv_router.php?route=userHome";
			}
			else    {
				$("#err_login").css('display', 'inline', 'important');
			 	$("#err_login").html("Wrong username or password");
			}
		   },
		   beforeSend:function()
		   {
			$("#err_login").css('display', 'inline', 'important');
			$("#err_login").html("<img src='images/ajax-loader.gif' /> Loading...")
		   }
		  });
		return false;
	});
        $("#userName").mouseenter(function(){
            alert("Hello");
        });
});
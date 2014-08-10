<!DOCTYPE html>
<html>
<head>
<title>ASIM</title>
<link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
<script src="../../js/jquery-1.9.1.min.js"></script>
<script src="../../js/jquery.mobile-1.3.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#err_login").css('display', 'none', 'important');
	 $("#login_submit").click(function(){	
		  username=$("#username").val();
		  password=$("#password").val();
		  $.ajax({
		   type: "POST",
		   url: "core/controller/Serv_Login.php",
			data: "username="+username+"&password="+password,
		   success: function(html){
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
});
</script>
</head>
<body>
<div data-role="page">
<?php require_once 'header.php'; ?>  
<!-- /header -->

<div data-role="content">
  <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Product</li>
      <li><a href="index.php?req=user_Home&user_req=addExpense" data-icon="plus">Add Product</a></li>
      <li><a href="index.php?req=user_Home&user_req=viewExpense">Sell Product</a></li>
      <li><a href="index.php?req=user_Home&user_req=updateExpense">Update Product</a></li>
    </ul>
   <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Trade</li>
      <li><a href="#">New Trade</a></li>
      <li><a href="#">Update Trade</a></li>
      <li><a href="#">Delete Trade</a></li>
   </ul> 
   <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Account</li>
      <li><a href="#">Manage Account</a></li>
      <li><a href="#">Manage Tax</a></li>
      <li><a href="#">Manage Discounts</a></li>
   </ul>
   <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Profile</li>
      <li><a href="#">Update</a></li>
      <li><a href="#">Query To Admin</a></li>
      <li><a href="#">Settings</a></li>
   </ul> 
</div>
<!-- /content -->

<?php require_once 'footer.php' ?>;
</div>
<!-- /page -->
</body>
</html>

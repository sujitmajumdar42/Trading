<script>
    $(document).ready(function() {
        status =
<?php
session_start();
if (isset($_SESSION['uname'])) {
    if ($_SESSION['uname'] == "") {
        echo '"INVALID"';
    } else {
        echo '"Welcome"';
    }
} else {
    echo '"INVALID"';
}
?>;
        if (status == "INVALID") {
            alert(window.location());
            window.location.replace(window.location.pathname);
        } else {
            //alert(window.location.pathname);
        }
    });
</script>    
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Brand Management</li>
    <li><a href="index.php?cont=Cont_Brand_Add">Add New Brand</a></li>
    <li><a href="index.php?cont=Cont_Brand_Update">Update Brand</a></li>
</ul>
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Product Management</li>
    <li><a href="index.php?cont=Cont_Prod_Add">Add New Product</a></li>
    <li><a href="index.php?cont=Cont_Prod_Update">Update New Product</a></li>
    <li><a href="index.php?cont=Cont_Prod_Sell">Sell Product</a></li>
    <li><a href="index.php?cont=Cont_Prod_Account">Product Cost</a></li>
</ul>

<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Trade Management</li>    
    <li><a href="#"></a>Trade In</li>
    <li><a href=""></a>Trade Out</li>
    <li><a href=""></a>View status</li>
</ul>    
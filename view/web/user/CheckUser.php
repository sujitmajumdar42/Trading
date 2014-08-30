<?php
if (isset($_SESSION['uname']) == 1) {
    //echo "Hello " . $_SESSION['uname'];
} else {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<?php require_once("./Navigators.php"); ?>
<?php session_start(); ?>
<html>
    <head>
        <title>ASIM</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        <link rel="stylesheet" href="../../css/main.css" />
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/jsUtil/utility.js"></script>
        <script src="../../js/ajax/messages.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="content">
                <?php
                require_once './header.php';
                if (isset($_GET['cont'])) {
                    $page = $_GET['cont'] . ".php";
                    require_once $page;
                } else {
                    require_once './Cont_Login.php';
                }
                require_once './footer.php';
                ?>
            </div>
        </div>
        <!-- /page -->
    </body>
</html>
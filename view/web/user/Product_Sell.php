<!DOCTYPE html>
<html>
    <head>
        <title>ASIM</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/ajax/brandManagement_update.js"></script>
        <script src="../../js/ajax/ProductManagement_Insert.js"></script>
        <script src="../../js/ajax/SellProduct.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed">
            </div>    
            <!-- /header -->

            <div data-role="content">

                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider">Sell Product</li>
                    <li>
                       <?php require_once '../user/Product_Sell_Cart.php'; ?>
                    </li>
                </ul>
            </div>
            <!-- /content -->
            <div data-role="footer" data-position="fixed">
            </div>
        </div>
        <!-- /page -->
    </body>
</html>

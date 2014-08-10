<!DOCTYPE html>
<html>
    <head>
        <title>AIMS</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/ajax/brandManagement_update.js"></script>
        <script>
           
        </script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed">
                <a href="core/model/logout.php" data-role="button">Logout</a>
                <a href="#popupInfo" data-rel="popup" data-role="button" data-inline="true" data-icon="grid" data-position="right">Today's Budg</a>
                <h1>OMM MAA TRADERS</h1>
            </div>
            <div data-role="popup" id="popupInfo" class="ui-content" data-theme="e" style="max-width:450px;">
                <p style="width:300px">

                <table>
                    <tr>
                        <td><b>Date : </b></td>
                        <td>6th July,2014</td>
                    </tr>
                    <tr>
                        <td><b>Product Sold : </b></td>
                        <td>112</td>
                    </tr>
                    <tr>
                        <td><b>Trade In : </b></td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td><b>Trade Out : </b></td>
                        <td>21</td>
                    </tr>
                </table>
                </p>
            </div>    
            <!-- /header -->

            <div data-role="content">
                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider">Product</li>
                    <li>
                        <form>

                            <a href="#popupLogin" id="add_prod_link" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-theme="a" data-transition="flip">Add</a>

                            <div data-role="popup" id="popupMenu" data-theme="a">
                                <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
                                    <?php
                                    require_once './sell_product_pop.php';
                                    ?>
                                </div>
                            </div>

                            <table class="prod_table" style="width: 100%; padding: 5px;">
                                <thead style="border: 1px solid blue">
                                    <tr>
                                        <td>Prod No.</td>
                                        <td>Vendor</td>
                                        <td>Category</td>
                                        <td>Product</td>
                                        <td>Product Type</td>
                                        <td>Quantity</td>
                                        <td>Cost</td>
                                    </tr>
                                </thead>
                                <tbody id="prod_table_body">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="7"><hr></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">&nbsp;</td>
                                        <td id="total_cost">0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">&nbsp;</td>
                                        <td id="submitlink" style="display: none"><a href="submit" id="submit" data-role="button" data-inline="true" data-theme="a">Proceed to Payment</a></td>
                                    </tr>
                                </tbody>
                            </table>    

                        </form>
                    </li>
            </div>
            <!-- /content -->

            <div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#" class="ui-btn-active ui-state-persist">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /page -->
    </body>
</html>

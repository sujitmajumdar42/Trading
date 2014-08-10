<!DOCTYPE html>
<html>
    <head>
        <title>ASIM</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/ajax/brandManagement_update.js"></script>
        <script src="../../js/ajax/ProductManagement_Insert.js"></script>
        <script src="../../js/ajax/ProductAccountManagement.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed">
            </div>    
            <!-- /header -->

            <div data-role="content">
                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider">Account Management</li>
                    <li>
                        <form name="account_management" action="./" data-ajax="false">
                            <table>
                              <!--  <tr>
                                    <td><label for="brandname">Brand Name : </label></td>
                                    <td id="BrandContainer"></td>
                                </tr>
                                 <tr>
                                    <td>Products : </td>
                                     <td id="productList"></td>
                                </tr>
                                <tr>
                                    <td><label for="prodName">Name : </label></td>
                                    <td><input type="text" id="prodName"></td>
                                    <td id="updateProdResp"></td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="Update" class="ui-btn ui-btn-inline" id="Update"></td>
                                    <td><input type="button" value="Remove" class="ui-btn ui-btn-inline" id="Remove"></td>
                                </tr>-->
                                <tr>
                                    <td id="BrandContainer"></td>
                                    <td id="productList"></td>
                                </tr>
                                <tr>
                                    <td id="getCostID" style="display: none"><input type="button" value="Get Cost" id="getCost"></td>
                                    <td id="costResponse"></td>
                                </tr>
                                <tr>
                                    <td>Basic Cost</td>
                                    <td><input type="text" id="basicCost"></td>
                                </tr>
                                <tr>
                                     <td>VAT</td>
                                     <td><input type="text" id="vat"></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td><input type="text" id="discount"></td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="Update" id="update"></td>
                                    <td><input type="reset" value="Reset" id="reset"></td>
                                </tr>
                            </table>


                        </form> 
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

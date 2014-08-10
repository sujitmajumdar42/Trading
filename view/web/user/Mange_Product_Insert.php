<!DOCTYPE html>
<html>
    <head>
        <title>ASIM</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/ajax/brandManagement_update.js"></script>
        <script src="../../js/ajax/ProductManagement_Insert.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed">
            </div>    
            <!-- /header -->

            <div data-role="content">
                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider">Product Management</li>
                    <li>
                        <form name="brand_management" action="./" data-ajax="false">
                            <table>
                                <tr>
                                    <td><label for="brandname">Brand Name : </label></td>
                                    <td id="BrandContainer"></td>
                                </tr>
                                <tr>
                                    <td>Available Products : </td>
                                     <td id="productList"></td>
                                </tr>
                                <tr>
                                    <td><label for="prodName">Name : </label></td>
                                    <td><input type="text" id="prodName"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="addProdResp"></td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="Add Product" class="ui-btn ui-btn-inline" id="addProd"></td>
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

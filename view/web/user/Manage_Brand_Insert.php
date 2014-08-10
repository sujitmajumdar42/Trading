<!DOCTYPE html>
<html>
    <head>
        <title>ASIM</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/ajax/brandManagement.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-position="fixed">
            </div>    
            <!-- /header -->

            <div data-role="content">

                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider">Brand Management</li>
                    <li>
                        <form name="brand_management" action="./" data-ajax="false">
                            <table>
                                <tr>
                                    <td><label for="brandname">Brand Name:</label></td>
                                    <td><input type="text" name="brandName" id="brandName" value=""/></td>
                                    <td id="checkBrand"></td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="Add Brand" class="ui-btn ui-btn-inline" id="addBrand"></td>
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

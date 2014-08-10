<!DOCTYPE html>
<html>
    <head>
        <title>ASIM</title>
        <link rel="stylesheet" href="../../css/jquery.mobile-1.3.1.css" />
        <script src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../js/jquery.mobile-1.3.1.min.js"></script>
        <script src="../../js/ajax/brandManagement_update.js"></script>
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
                                    <td><label for="brandname">Select Brand:</label></td>
                                    <td id="BrandContainer"></td>
                                </tr>
                                <tr>
                                    <td><input id="updateBrand"></td>
                                    <td id="updateResp"></td>
                                </tr>
                                <tr>
                                    <td><input type="button" id ="update" value="Update"></td>
                                    <td><input type="button" id ="remove" value="Remove"></td>
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

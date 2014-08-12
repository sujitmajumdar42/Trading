<script src="../../js/ajax/brandManagement.js"></script>

<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Brand Management</li>
    <?php getBrandNavs(); ?>
    <li>

        <form name="brand_management" action="./" data-ajax="false">
            <table>
                <tr>

                </tr>
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
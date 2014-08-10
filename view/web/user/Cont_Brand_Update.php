<script src="../../js/ajax/brandManagement_update.js"></script>
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Brand Management</li>
    <?php getBrandNavs(); ?>
    <li>
         
        <form name="brand_management" action="./" data-ajax="false">
            <table>
                <tr>
                    <td><label for="brandname">Select Brand:</label></td>
                    <td id="BrandContainer">
                        <select id="selectBrand" name="select-choice-0">
                            <option value="select">Select</option>
                        </select>
                    </td>
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

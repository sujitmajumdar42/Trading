<script src="../../js/ajax/brandManagement_update.js"></script>
<script src="../../js/ajax/ProductManagement.js"></script>
<script src="../../js/ajax/ProdAccount.js"></script>
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Product Management</li>
    <?php getProductNavs(); ?>
    <li>
        <form name="brand_management" action="./" data-ajax="false">
            <table>
                <tr>
                    <td>Select Brand </td>
                    <td id="BrandContainer">
                        <select id="selectBrand" name="select-choice-0">
                            <option value="select">Select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Product </td>
                    <td id="productList">
                        <select id="prodNames" name="select-choice-0">
                            <option value="select">Select</option>
                        </select>   
                    </td>
                </tr>
                <tr >
                    <td colspan="2" style="display: none" id="costResponse"></td>
                </tr>
                <tr>
                    <td>Cost per piece </td>
                    <td><input type="text" id="costPerPiece"></td>
                </tr>
                <tr id="costPerBoxContainer" style="display: none">
                    <td>Cost per Box </td>
                    <td><input type="text" id="costPerBox"></td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td><input type="text" id="vat"></td>
                </tr>
                <tr>
                    <td><input type="button" value="Update" class="ui-btn ui-btn-inline" id="updateCost"></td>
                </tr>
            </table>
        </form> 
    </li>
</ul>
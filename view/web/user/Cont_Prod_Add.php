<script src="../../js/ajax/brandManagement_update.js"></script>
<script src="../../js/ajax/ProductManagement.js"></script>
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
                    <td>Available Products </td>
                    <td id="productList">
                        <select id="prodNames" name="select-choice-0">
                            <option value="select">Select</option>
                        </select>   
                    </td>
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
<script src="../../js/ajax/brandManagement_update.js"></script>
<script src="../../js/ajax/ProductManagement.js"></script>
<script src="../../js/ajax/Trade_add.js"></script>
<ul data-role="listview" data-inset="true">

    <li data-role="list-divider">Trade Management</li>

    <li>
        <div class="ui-grid-a">
        <div class="ui-block-a">
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
                <tr>
                    <td>Unit </td>
                    <td>
                        <select id="selectUnit" name="select-choice-0">
                            <option value='0'>Select</option>
                            <option value='PAC'>Packet</option>
                            <option value='BOX'>Box</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Quantity : </td>
                    <td><input type="text" id="prodQuantity"></td>
                    <td id="QtyResp"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="button" id="tradeAddBtn" value="Add To Queue"></td>
                </tr>
                <tr>
                    <td colspan="2" id="tradeResponse"></td>
                </tr>
            </table>
        </div>
            <div class="ui-block-b">
                <table style="width: 100%">
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="3"><input type="button" id="processTradeQueue" value="Process Queue"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Brand</td>
                        <td>Product</td>
                        <td>Unit</td>
                        <td>Quantity</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="6"><hr/></td>
                    </tr>
                    <tbody id="tradeRow">
                    </tbody>
                </table>
            </div>
        </div>
    </li>
</ul>    
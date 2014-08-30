<script src="../../js/ajax/brandManagement_update.js"></script>
<script src="../../js/ajax/ProductManagement_Insert.js"></script>
<script src="../../js/ajax/SellProduct.js"></script>
<ul data-role="listview" data-inset="true">
   <li data-role="list-divider">Product Management</li>
    <?php getProductNavs(); ?>
   <li>
        <table>
            <tr>
                <td>Total Product</td>
                <td><input type="text" id="totalProducts" value="0" readonly=""/></td>
                <td>Total Cost</td>
                <td><input type="text" id="totalCost" value="0" readonly="" /></td>
                <td class="transaction" style="display: none" id="amountPaid">Paid : </td>
                <td class="transaction" style="display: none"><input type="text" id="totalPaid" value="0"/></td>
                <td class="transaction" style="display: none" id="amountReturn">Return : </td>
                <td class="transaction" style="display: none" ><input type="text" id="returnAmount" value="0" readonly=""></td>
            </tr>
            <tr>
                <td colspan="2" id="billResponse"></td>
            </tr>
        </table>
    </li>
    <li>
        <?php require_once '../user/Product_Sell_Cart.php'; ?>
    </li>
</ul>


<form>
    <script src="../../js/ajax/brandManagement_update.js"></script>
    <script src="../../js/ajax/ProductManagement.js"></script>
    <?php require_once './sell_product_pop.php'; ?>
    <table class="prod_table" style='width: 100%; padding-left: 10px'>
        <thead style="border: 1px solid blue">
            <tr class="prodRow">
                <td style="width:7%; border-right: 1px solid #b3b3b3">Prod No.</td>
                <td>Brand</td>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Unit</td>
                <td>Rate</td>
                <td>VAT</td>
                <td>Discount</td>
                <td>Total</td>
            </tr>
            <tr>
                <td colspan="9"><hr></td>
            </tr>
        </thead>
        <tbody id="prod_table_body">
        </tbody>
    </table>    
</form> 
<?php require_once './Product_Receipt.php'; ?>
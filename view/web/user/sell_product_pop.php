<table>
    <tr>
        <td>
            <a href="#popupLogin" id="add_prod_link" 
               data-rel="popup" 
               data-position-to="window" 
               data-role="button" 
               data-inline="true" 
               data-theme="a" 
               data-transition="flip">Add</a>
        </td>
        <td id="submitlink" style="display: block">
            <a href="#billingDetail" 
               data-rel="popup" 
               data-position-to="window" 
               data-role="button" 
               data-inline="true" 
               data-theme="a" 
               data-transition="flip"
               id="proceedToPayment">Proceed</a>
        </td>
    </tr>
    <tr>
        <td colspan="2" id="billResponse">

        </td>
    </tr>
</table>
<div data-role="popup" id="popupMenu" data-theme="a">
    <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
        <form>
            <table style="width: 400px">
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
                    <td id="availibilityBox" class="alert availBox"></td>
                    <td id="availibilityPac" class="alert availPac"></td>
                </tr>
                <tr>
                    <td>Select Unit </td>
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
                </tr>
                <tr>
                    <td colspan="2" id="response"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="button" value="ADD" id="addProdToList"></td>
                </tr>
            </table>
        </form>
    </div>
</div>   
<?php require_once './Billing_Detail.php'; ?>

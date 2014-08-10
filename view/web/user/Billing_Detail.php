<div data-role="popup" id="popupMenu" data-theme="a">
    <div data-role="popup" id="billingDetail" data-theme="a" class="ui-corner-all">
        <table>
            <tr>
                <td>Customer Address  </td>
                <td><textarea id="cust_address"></textarea></td>
            </tr>
            <tr>
                <td>Mode Of Dispatch</td>
                <td>
                    <select id="modeOfDispatch" name="select-choice-0">
                        <option value ="select">Select</option>
                        <option value ="road">By Road</option>
                        <option value ="air">By Air</option>
                        <option value ="water">By Sea</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Transporter's Name </td>
                <td><input type="text" id='transpName'></td>
            </tr>
            <tr>
                <td>P.O. Number </td>
                <td><input type="text" id='poNum'></td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td><textarea id="remarks"></textarea></td>
            </tr>
            <tr>
                <td><input type="button" id="submitTrans" value="Submit"></td>
            </tr>
        </table>
    </div>
</div>
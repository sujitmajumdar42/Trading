<script src="../../js/ajax/brandManagement_update.js"></script>
<script src="../../js/ajax/ProductManagement.js"></script>
<script src="../../js/ajax/Manage_Repo.js"></script>
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Repository Management</li>
    <li>
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
            <tbody id="boxBody" style="display: none">
                <tr>
                    <td>Box</td>
                    <td id="boxCont"><input type="text" id="box" value="0"></td>
                    <td id="openBoxCont"><input type="button" id="openBox" value="Open Box"></td>
                </tr>
                <tr>
                    <td>Product per box </td>
                    <td><label id="prodPerBox"></label></td>
                </tr>
            </tbody>
            <tr>
                <td>Packet </td>
                <td id="packetCont"><input type="text" id="packet" value="0"></td>
            </tr>   
            <tr>
                <td colspan="2" id="response"></td>
            </tr>
            <tr>
                <td><input type="button" id="updateRepo" value="Update Repository"></td>
            </tr>
        </table>
    </li>
</ul>
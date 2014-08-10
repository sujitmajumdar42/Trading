<script src="../../js/ajax/User_Login.js"></script>
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Login</li>
    <li>
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" id="userName"></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" id="userPass"></td>
            </tr>
            <tr>
                <td colspan="2"><label id="loginResponse" class="response"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login" id="userLogin"></td>
            </tr>
        </table>
    </li>
</ul>
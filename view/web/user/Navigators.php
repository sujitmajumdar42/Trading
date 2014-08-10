<?php

function getProductNavs() {
?>
    <li>
        <table>
            <tr>
                <td> <a href="index.php?cont=Cont_User_Home" data-role="button">Home</a></td>
                <td> <a href="index.php?cont=Cont_Prod_Add" data-role="button" class="navs" data-url="url:index.php?cont=Cont_Prod_Add">Add Product</a></td>
                <td> <a href="index.php?cont=Cont_Prod_Update" data-role="button" class="navs">Update/Remove Product</a></td>
                <td> <a href="index.php?cont=Cont_Prod_Sell" data-role="button" class="navs">Sell Product</a></td>
            </tr>
        </table>
    </li>
    <?php

}

function getBrandNavs() {
    
}

function getProdAccountNavs() {
    
}

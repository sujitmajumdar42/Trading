<?php

function getProductNavs() {
    ?>
    <li>
        <table>
            <tr>
                <td> <a href="index.php?cont=Cont_User_Home" data-role="button">Home</a></td>
                <td> <a href="index.php?cont=Cont_Prod_Add" data-role="button" class="navs" data-url="?cont=Cont_Prod_Add">Add Product</a></td>
                <td> <a href="index.php?cont=Cont_Prod_Update" data-role="button" class="navs" data-url="?cont=Cont_Prod_Update">Update/Remove Product</a></td>
                <td> <a href="index.php?cont=Cont_Prod_Sell" data-role="button" class="navs" data-url="?cont=Cont_Prod_Sell">Sell Product</a></td>
            </tr>
        </table>
    </li>
    <?php
}

function getBrandNavs() {
    ?> 

    <li>
        <table>
            <tr>
                <td> <a href="index.php?cont=Cont_User_Home" data-role="button" class="navs" data-url="?cont=Cont_User_Home">Home</a></td>
                <td> <a href="index.php?cont=Cont_Brand_Add" data-role="button" class="navs" data-url="?cont=Cont_User_Add">Add Brand</a></td>
                <td> <a href="index.php?cont=Cont_Brand_Update" data-role="button" class="navs" data-url="?cont=Cont_User_Update">Update Brand</a></td>
            </tr>
        </table>
    </li>
    <?php
}

function getProdAccountNavs() {
    
}

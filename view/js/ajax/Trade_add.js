$(document).ready(function() {
    index = 0;
    tradeType = "";
    servTpe = "";
    oprCode = "";
    var prodID = [];
    var prodUnit = [];
    var prodQty = [];
    rowIndex = 0;
    tradesContainer = $("#tradeRow");
    trade_table_size = $('#tradeRow tr').size() + 1;
    
    $("#tradeAddBtn").click(function() {
        index++;
        
        prodID.push($('select[id="prodNames"] option:selected').val());
        prodUnit.push($('select[id="selectUnit"] option:selected').val());
        brand = $('select[id="selectBrand"] option:selected').html();
        prodName = $('select[id="prodNames"] option:selected').html();
        prodQty.push($('#prodQuantity').val());
        row = $('<tr><td>' + index +
                '</td><td>' + brand +
                '</td><td>' + prodName +
                '</td><td>' + prodUnit[rowIndex] +
                '</td><td>' + prodQty[rowIndex] +
                '</td><td><a href="#" id="remProd"><image src="../../images/remove.png"/></a></td></tr>');
        row.hide();
        tradesContainer.append(row);
        row.fadeIn('slow');
        trade_table_size++;  
        rowIndex++;
    });
    $(document).on('click', '#remProd', function() {
        if (trade_table_size > 1) {
            $(this).closest('tr').fadeOut();
            prodID.splice(parseInt($(this).closest('tr').find('td:eq(0)').text())-1,1);
            trade_table_size--;
        }
        return false;
    });
    $("#processTradeQueue").click(function(){
        servType = "TradeManage";
        oprCode = "addTrade";
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data:{
                servType:servType,
                oprCode:oprCode,
                prodID:prodID,
                prodUnit:prodUnit,
                prodQty:prodQty
            },
            success:function(html){
               $("#tradeResponse").html(html);
            }
        });
    });
});
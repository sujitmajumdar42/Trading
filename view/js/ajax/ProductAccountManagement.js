$(document).ready(function() {
    servType = "ProdManage";
    prodID = "";
    prodName = "";
    $("#getCost").click(function() {
        oprCode = "readCost";
        if ($("#prodNames").length == 0) {
            alert("Invalid Choice");
        } else {
            prodID = $('select[id="prodNames"] option:selected').val();
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {servType: servType,
                    oprCode: oprCode,
                    prodID: prodID},
                
                success: function(html) {
                    if (html != " ") {
                        data = $.parseJSON(html);
                        $("#basicCost").val(data.BASIC_COST);
                        $("#vat").val(data.VAT);
                        $("#discount").val(data.DISCOUNT)
                    }
                }
            });
        }
    });
    $("#update").click(function() {
        oprCode = "UpdateCost";
        prodName = $('select[id="prodNames"] option:selected').html();
        basicCost = $("#basicCost").val();
        vat = $("#vat").val();
        discount = $("#discount").val();

        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: {servType: servType,
                oprCode: oprCode,
                prodID: prodID,
                basicCost: basicCost,
                vat: vat,
                discount: discount
            },
            success: function(html) {
                if (html == "")
                    $("#costResponse").html("Updated");
                else
                    $("#costResponse").html(html);
            }
        });
    });
});
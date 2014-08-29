$(document).ready(function() {
    $("#prodNames").change(function() {
        servType = "ProdManage";
        oprCode = "readCost";
        brandID = $('select[id="selectBrand"] option:selected').val();
        prodID = $('select[id="prodNames"] option:selected').val();
        $.ajax({
            type: 'POST',
            url: "../../../controller/Router.php",
            data: {
                servType: servType,
                oprCode: oprCode,
                brandID: brandID,
                prodID: prodID
            },
            success: function(html) {
                if (html == "ERR_PR_12") {
                    prepareMessage(html);
                    $("#costPerPiece").val(0);
                    $("#costPerBox").val(0);
                    $("#vat").val(0);
                } else {
                    prodCostObj = $.parseJSON(html);
                    if (prodCostObj.PROD_BOX_COST != "-1") {
                        $("#costPerBoxContainer").fadeIn("slow");
                        $("#costPerBox").val(prodCostObj.PROD_BOX_COST);
                    } else {
                        $("#costPerBoxContainer").fadeOut("slow");
                    }
                    $("#costPerPiece").val(prodCostObj.PROD_PAC_COST);
                    $("#vat").val(prodCostObj.VAT);
                }
            }
        });
    });
    $("#updateCost").click(function() {
        servType = "ProdManage";
        oprCode = "updateCost";
        brandID = $('select[id="selectBrand"] option:selected').val();
        prodID = $('select[id="prodNames"] option:selected').val();
        costPerPiece = $("#costPerPiece").val();
        if ($("#costPerBox").is(":visible")) {
            costPerBox = $("#costPerBox").val();
        } else {
            costPerBox = -1;
        }
        vat = $("#vat").val();
        $.ajax({
            type: 'POST',
            url: "../../../controller/Router.php",
            data: {
                servType: servType,
                oprCode: oprCode,
                prodID: prodID,
                costPerPiece: costPerPiece,
                costPerBox: costPerBox,
                vat: vat
            },
            success: function(html) {
                prepareMessage(html);
            }
        });
    });
});
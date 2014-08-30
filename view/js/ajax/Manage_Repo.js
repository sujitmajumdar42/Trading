$(document).ready(function() {
    $("#prodNames").change(function() {
        servType = "ProdManage";
        oprCode = "getProdInfo";
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
                data = $.parseJSON(html);
                if (data.PROD_UNIT == "box") {
                    $("#boxBody").fadeIn("slow");
                    $("#prodPerBox").html(data.PROD_IN_BOX);
                    getRepoInfo(servType, "checkAvail", prodID, "box");
                } else {
                    $("#boxBody").fadeOut("slow");
                }
                getRepoInfo(servType, "checkAvail", prodID, "pac");

            }
        });
    });
    $("#openBox").click(function() {
        totalBox = parseInt($("#box").val());
        totalPac = parseInt($("#packet").val());
        prodPerBox = parseInt($("#prodPerBox").html());
        if (totalBox <= 0) {
            prepareMessage("ERR_PR_15");
        } else {
            totalBox--;
            totalPac += prodPerBox;
            $("#box").val(totalBox);
            $("#packet").val(totalPac);
            prepareMessage("INF_PR_09");
        }
    });
    $("#updateRepo").click(function(){
        totalBox = 0;
        totalPac = parseInt($("#packet").val());
        prodID = $('select[id="prodNames"] option:selected').val();
    });
    function getRepoInfo(servType, oprCode, prodID, unit) {
        $.ajax({
            type: 'POST',
            url: "../../../controller/Router.php",
            data: {
                servType: servType,
                oprCode: oprCode,
                prodID: prodID,
                unit: unit
            },
            success: function(html) {
                if (unit == "box") {
                    availBox = html.split('e')[0];
                    $("#box").val(availBox);
                }
                availPac = html.split('e')[1];
                $("#packet").val(availPac);
            }
        });
    }
});

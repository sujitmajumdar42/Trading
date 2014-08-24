$(document).ready(function() {
    $("#prodNames").selectmenu().selectmenu("disable");
    servType = "BrandManage";
    oprCode = "readAll";
    brandID = "";
    brandName = "";
    prodName = "";
    prodID = "";
    $.ajax({
        type: "POST",
        url: "../../../controller/Router.php",
        data: "servType=" + servType + "&oprCode=" + oprCode,
        dataType: "json",
        success: function(html) {

            $('#selectBrand').on({
                change: function(e) {
                    servType = "ProdManage";
                    brandID = $('select[id="selectBrand"] option:selected').val();
                    brandName = $('select[id="selectBrand"] option:selected').html();
                    oprCode = "readByFK";
                    $.ajax({
                        type: "POST",
                        url: "../../../controller/Router.php",
                        data: {servType: servType,
                            oprCode: oprCode,
                            brandID: brandID,
                        },
                        dataType: "json",
                        success: function(html) {
                            if (html == "ERR_PR_01") {
                                prepareMessage(html);
                                $("#prodNames").selectmenu("disable");
                            } else {
                                $("#response").fadeOut("slow");
                                $("#prodNames").selectmenu("enable");
                                $('#prodNames').empty();
                                $("<option></option>", {value: "", text: "Select"}).appendTo('#prodNames');
                                $("#prodNames").selectmenu("refresh", true);
                                $.each(html, function() {
                                    $("<option></option>", {value: this.PROD_ID, text: this.PROD_NAME}).appendTo('#prodNames');
                                });
                                $("#prodNames").stop().change(function() {
                                    prodName = $('select[id="prodNames"] option:selected').html();
                                    prodID = $('select[id="prodNames"] option:selected').val();
                                    if (!$.isEmptyObject("#prodName"))
                                        $("#prodName").val(prodName);
                                    if ($("#getCostID").length > 0)
                                        $("#getCost").click();

                                });
                            }
                        }
                    });
                }
            });

        }
    });
    $("#addProd").click(function() {
        prodName = $("#prodName").val();
        prodUnit = $('select[id="prodUnitType"] option:selected').val();
        if (prodUnit == "box") {
            prodPerBox = $("#prodPerBox").val();
        } else {
            prodPerBox = 0;
        }
        if (brandID == "select") {
            prepareMessage("ERR_PR_02");
        } else if (isEmpty(prodName)) {
            prepareMessage("ERR_PR_03");
        } else {
            servType = "ProdManage";
            oprCode = "Insert";
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {servType: servType,
                    oprCode: oprCode,
                    brandID: brandID,
                    prodName: prodName,
                    prodUnit: prodUnit,
                    prodPerBox: prodPerBox
                },
                success: function(html) {
                    prepareMessage(html);
                }
            });
        }
    });
    $("#Update").click(function() {
        prodNameOld = prodName;
        prodNameNew = $("#prodName").val();
        if (isEmpty(prodNameNew)) {
            prepareMessage("ERR_PR_03");
        } else if (prodNameNew == prodNameOld) {
            prepareMessage("ERR_PR_05");
        } else if (prodNameNew == "Select") {
            prepareMessage("ERR_PR_06");
        } else {
            servType = "ProdManage";
            oprCode = "Update";
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {servType: servType,
                    oprCode: oprCode,
                    brandID: brandID,
                    prodName: prodNameNew,
                    prodAvail: 0,
                    prodID: prodID
                },
                success: function(html) {
                    prepareMessage(html);
                }
            });
        }
    });

    $("#Remove").click(function() {
        servType = "ProdManage";
        oprCode = "Remove";
        prodName = $("#prodName").val();
        if (isEmpty(prodName)) {
            prepareMessage("ERR_PR_03");
        } else {
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {servType: servType,
                    oprCode: oprCode,
                    prodID: prodID
                },
                success: function(html) {
                    prepareMessage(html);
                }
            });
        }
    });
    $("#prodUnitType").change(function() {
        if ($('select[id="prodUnitType"] option:selected').val() == "box") {
            $("#prodPerBoxRow").show();
        } else {
            $("#prodPerBoxRow").hide();
        }
    });
});
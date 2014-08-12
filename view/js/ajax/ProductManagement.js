$(document).ready(function() {
    $(".navs").click(function(e) {
        e.stopImmediatePropagation();
        e.preventDefault();
        var path = 'http://' + window.location.hostname + window.location.pathname + $(this).attr("data-url");
        $(location).attr('href', path);
    });
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
                            if (html == "ERR102") {
                                // $("#productList").html("No Products Found");
                                $("#prodNames").attr('disabled', true);
                            } else {
                                $("#prodNames").attr('disabled', false);
                                $.each(html, function() {
                                    $("<option></option>", {value: this.PROD_ID, text: this.PROD_NAME}).appendTo('#prodNames');
                                });
                                /*if (location.pathname.split('/').slice(-1)[0] == "Product_Sell.php") {
                                 $("#prodNames").stop().attr('size', 1);
                                 }*/
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
        if(prodUnit == "box"){
            prodPerBox = $("#prodPerBox").val();
        } else{
            prodPerBox = 0;
        }
        if (prodName == "")
            $("#addProdResp").html("Can't add Empty Name");
        else {
            servType = "ProdManage";
            oprCode = "Insert";
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {servType: servType,
                    oprCode: oprCode,
                    brandID: brandID,
                    prodName: prodName,
                    prodUnit:prodUnit,
                    prodPerBox:prodPerBox
                },
                success: function(html) {
                    $("#addProdResp").html(html);
                }

            });
        }
    });
    $("#Update").click(function() {
        prodNameOld = prodName;
        prodNameNew = $("#prodName").val();
        if (prodNameOld == prodNameNew) {
            $("#updateProdResp").html("No Change");
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
                    if ($.isEmptyObject(html)) {
                        $("#updateProdResp").html("Updated");
                    } else {
                        $("#updateProdResp").html(html);
                    }
                }
            });
        }
    });

    $("#Remove").click(function() {
        servType = "ProdManage";
        oprCode = "Remove";
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: {servType: servType,
                oprCode: oprCode,
                prodID: prodID
            },
            success: function(html) {
                if ($.isEmptyObject(html)) {
                    $("#updateProdResp").html("Removed");
                } else {
                    $("#updateProdResp").html(html);
                }
            }
        });
    });
    $("#prodUnitType").change(function() {
        if ($('select[id="prodUnitType"] option:selected').val() == "box") {
            $("#prodPerBoxRow").show();
        } else{
            $("#prodPerBoxRow").hide();
        }
    });
});
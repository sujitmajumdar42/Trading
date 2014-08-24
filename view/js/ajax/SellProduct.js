$(document).ready(function() {
    $("#prodNames").selectmenu().selectmenu("disable");
    $("#selectUnit").selectmenu().selectmenu("disable");
    $("#prodNames").change(function() {
        prodName = $('select[id="prodNames"] option:selected').val();
        if (prodName == "" || prodName == "select") {
            $("#selectUnit").selectmenu().selectmenu("disable");
        } else {
            $("#selectUnit").selectmenu().selectmenu("enable");
        }

        servType = "ProdManage";
        oprCode = "checkAvail";
        prodID = $('select[id="prodNames"] option:selected').val();
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: {servType: servType,
                oprCode: oprCode,
                prodID: prodID,
            },
            success: function(html) {
                if ($.isNumeric(html)) {
                    showAvail(html);
                } else {
                    prepareMessage(html);
                }
            }
        });
    });

    $("#selectUnit").change(function() {

    });
});

$(document).ready(function() {
    var prod_table = $("#prod_table_body");
    var prod_table_size = $('#prod_table_body tr').size() + 1;
    var total_cost = parseInt($("#totalCost").val(), 10);
    var total_prod = parseInt($("#totalProducts").val(), 10);
    $(document).clearQueue();
    $('#addProdToList').click(function() {

        servType = "ProdManage";
        oprCode = "readCost";
        prodNo = prod_table_size;
        brandID = $('select[id="selectBrand"] option:selected').val();
        brandName = $('select[id="selectBrand"] option:selected').html();
        prodID = $('select[id="prodNames"] option:selected').val();
        prodName = $('select[id="prodNames"] option:selected').html();
        quantity = parseInt($("#prodQuantity").val());
        availPac = parseInt($("#availibilityPac").text());
        availBox = parseInt($("#availibilityBox").is(':visible') ? $("#availibilityBox").text() : "0");
        unit = $('select[id="selectUnit"] option:selected').val();
        if (isEmpty(brandID) || brandID == "select")
            prepareMessage("ERR_BR_01");
        else if (isEmpty(prodID) || prodID == "select")
            prepareMessage("ERR_PR_03");
        else if ($("#availibilityBox").is(':visible') == false && unit == "BOX")
            prepareMessage("ERR_PR_08");
        else if (isEmpty($("#prodQuantity").val()))
            prepareMessage("ERR_PR_10");
        else if (unit == "BOX" && quantity > availBox || unit == "PAC" && quantity > availPac)
            prepareMessage("ERR_PR_11");
        else {
            basicCost = 0;
            vat = 0;
            discount = 0;
            total = 0;
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: {servType: servType,
                    oprCode: oprCode,
                    prodID: prodID,
                    unit: unit
                },
                success: function(html) {
                    cost = $.parseJSON(html);
                    basicCost = (unit == "BOX") ? parseInt(cost.PROD_BOX_COST) : parseInt(cost.PROD_PAC_COST);
                    vat = parseInt(cost.VAT);
                    discount = parseInt(cost.DISCOUNT);
                    total = basicCost * quantity;
                    total = total + vat;
                    total -= discount;
                    total_prod += parseInt(quantity);
                    prod_table.append('<tr><td>' + prodNo
                            + '</td><td>' + brandName
                            + '</td><td data="' + prodID + '">' + prodName
                            + '</td><td>' + quantity
                            + '</td><td>' + unit
                            + '</td><td>' + basicCost
                            + '</td><td>' + vat
                            + '</td><td>' + discount
                            + '</td><td id = "base_cost">' + total
                            + '</td><td><a href="#" id="remProd"><image src="../../images/remove.png"/></a></td></tr>');
                    prod_table_size++;
                    total_cost += total;
                    $("#totalCost").val(total_cost);
                    $("#totalProducts").val(total_prod);
                    $("#submitlink").show();
                    prepareMessage("INF_PR_04");
                    setTimeout(function() {
                    }, 4000);
                    $("#response").fadeOut("slow");
                }
            });
        }
    });

    $(document).on('click', '#remProd', function() {
        if (prod_table_size > 1) {
            total_cost -= parseInt($(this).closest('tr').find('td:eq(8)').text(), 10);
            total_prod -= parseInt($(this).closest('tr').find('td:eq(3)').text(), 10);
            $("#totalCost").val(total_cost);
            $("#totalProducts").val(total_prod);
            $(this).closest('tr').remove();
            prod_table_size--;

            oprCode = "updateRepo";
            prodID = $(this).closest('tr').find('td:eq(2)').attr('data');
            prodUnit = $(this).closest('tr').find('td:eq(2)').text().toLowerCase();
            prodAvail = $(this).closest('tr').find('td:eq(3)').text();
            updateRepo(prodID, prodUnit, prodAvail);
        }
        return false;
    });
    function updateRepo(prodID, prodUnit, prodAvail) {
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: {servType: "ProdManage",
                oprCode: "updateRepo",
                prodID: prodID,
                prodUnit: prodUnit,
                prodAvail: prodAvail
            },
            success: function(html){
                
            }
        });

    }
    $("#submitTrans").click(function() {
        var table = $("#prod_table_body");
        custAddress = $("#cust_address").val();
        modeOfDispatch = $('select[id="modeOfDispatch"] option:selected').html();
        transpName = $("#transpName").val();
        poNum = $("#poNum").val();
        remarks = $("#remarks").val();

        brands = [];
        productDescs = [];
        prodQtys = [];
        units = [];
        prodRates = [];
        taxes = [];
        prodCosts = [];
        servType = "makeReceipt";
        totalRow = $("#prod_table_body tr").length;

        totalProds = $("#totalProducts").val();
        totalCosts = $("#totalCost").val();

        table.find('tr').each(function(key, val) {
            var $tds = $(this).find('td');
            brands.push($tds.eq(1).text());
            productDescs.push($tds.eq(2).text());
            prodQtys.push($tds.eq(3).text());
            units.push($tds.eq(4).text());
            prodRates.push($tds.eq(5).text());
            taxes.push($tds.eq(6).text());
            prodCosts.push($tds.eq(8).text());
        });

        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: {servType: servType,
                custAddress: custAddress,
                modeOfDispatch: modeOfDispatch,
                transpName: transpName,
                poNum: poNum,
                remarks: remarks,
                brands: brands,
                productDescs: productDescs,
                prodQtys: prodQtys,
                units: units,
                prodRates: prodRates,
                taxes: taxes,
                prodCosts: prodCosts,
                totalRow: totalRow,
                totalProds: totalProds,
                totalCosts: totalCosts
            },
            success: function(html) {
                $("#transaction_resp").show();
                $("#transaction_resp").html("Receipt ID : " + html);
                $("[class=transaction]").show();
            }
        });
    });
    $("#totalPaid").change(function() {
        amountPaid = parseFloat($("#totalPaid").val());
        totalAmount = parseFloat($("#totalCost").val());
        totalReturn = amountPaid - totalAmount;
        $("#returnAmount").val(totalReturn);
    });
});
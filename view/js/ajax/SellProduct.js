$(document).ready(function() {
    $("#prodQuantity").change(function() {
        quantity = $("#prodQuantity").val();
        servType = "ProdManage";
        oprCode = "read";
        prodID = $('select[id="prodNames"] option:selected').val();
        brandID = $('select[id="selectBrand"] option:selected').val();
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: {servType: servType,
                oprCode: oprCode,
                prodID: prodID,
                brandID: brandID,
                quantity: quantity
            },
            success: function(html) {
                if (html == "")
                    $("#QtyResp").html("ok");
                else
                    $("#QtyResp").html(html);
            }
        });
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
        quantity = $("#prodQuantity").val();
        unit = $('select[id="selectUnit"] option:selected').val();
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
                if (html == "")
                    $("#QtyResp").html("Cost can't be retrieved");
                else {
                    cost = $.parseJSON(html);
                    basicCost = parseInt(cost.BASIC_COST);
                    vat = parseInt(cost.VAT);
                    discount = parseInt(cost.DISCOUNT);
                    total = basicCost * quantity;
                    total = total + vat;
                    total -= discount;
                    total_prod += parseInt(quantity);
                    // alert(prod_table.html());
                    prod_table.append('<tr><td>' + prodNo
                            + '</td><td>' + brandName
                            + '</td><td>' + prodName
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
                }
            }
        });
    });

    $(document).on('click', '#remProd', function() {
        if (prod_table_size > 1) {
            total_cost -= parseInt($(this).closest('tr').find('td:eq(8)').text(), 10);
            total_prod -= parseInt($(this).closest('tr').find('td:eq(3)').text(),10);
            $("#totalCost").val(total_cost);
            $("#totalProducts").val(total_prod);
            $(this).closest('tr').remove();
            prod_table_size--;
        }
        return false;
    });

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
                $("#billResponse").html(html);
            }
        });
    });
});
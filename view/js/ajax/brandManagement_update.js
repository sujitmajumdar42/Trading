$(document).ready(function() {
    servType = "BrandManage";
    oprCode = "readAll";
    brandID = "";
    brandName = "";
    $.ajax({
        type: "POST",
        url: "../../../controller/Router.php",
        data: "servType=" + servType + "&oprCode=" + oprCode,
        dataType: "json",
        success: function(html) {
            if ($("#selectBrand").children().length <= 1) {
                brandList = html;
                $.each(brandList, function(index) {
                    $("<option></option>", {value: this.BRAND_ID, text: this.BRAND_NAME}).appendTo('#selectBrand');
                });
                $('#selectBrand').stop().change(function() {
                    brandID = $('select[id="selectBrand"] option:selected').val();
                    brandName = $('select[id="selectBrand"] option:selected').html();
                    $("#updateBrand").val(brandName);
                });
            }
        }
    });
    $("#update").click(function() {
        updatedName = $("#updateBrand").val();
        oprCode = "update";
        if (isEmpty(updatedName)) {
            prepareMessage("ERR_BR_01");
        } else if (brandName == updatedName) {
            prepareMessage("ERR_BR_04");
        } else {
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: "servType=" + servType + "&oprCode=" + oprCode + "&brandID=" + brandID + "&brandName=" + updatedName,
                success: function(html) {
                    prepareMessage(html);
                    setTimeout(function() {
                    }, 4000);
                    prepareMessage("MSG_COM_01");
                    setTimeout(function() {
                        location.reload();
                    }, 4000);
                }
            });
        }
    });

    $("#remove").click(function() {
        oprCode = "delete";
        if (isEmpty($("#updateBrand").val())) {
            prepareMessage("ERR_BR_01");
        } else {
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: "servType=" + servType + "&oprCode=" + oprCode + "&brandID=" + brandID,
                success: function(html) {
                    prepareMessage(html);
                    prepareMessage("MSG_COM_01");
                    setTimeout(function() {
                        location.reload();
                    }, 4000);
                }
            });
        }
    });
});
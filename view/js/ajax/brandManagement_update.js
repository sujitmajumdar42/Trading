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
        if (updatedName == brandName) {
            $("#updateResp").html("No Change");
        } else {
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: "servType=" + servType + "&oprCode=" + oprCode + "&brandID=" + brandID + "&brandName=" + updatedName,
                success: function(html) {
                    if (html == "") {
                        $("#updateResp").html("Updated");
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                    else
                        $("#updateResp").html(html);
                }
            });
        }
    });

    $("#remove").click(function() {
        oprCode = "delete";
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: "servType=" + servType + "&oprCode=" + oprCode + "&brandID=" + brandID,
            success: function(html) {
                if (html == "") {
                    $("#updateResp").html("Deleted");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else
                    $("#updateResp").html(html);
            }
        });
    });

});
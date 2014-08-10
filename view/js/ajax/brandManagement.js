$(document).ready(function() {
    $("#addBrand").click(function() {
        brandName = $("#brandName").val();
        servType = "BrandManage";
        oprCode = "insert";
        $.ajax({
            type: "POST",
            url: "../../../controller/Router.php",
            data: "brandName=" + brandName + "&servType=" + servType + "&oprCode=" + oprCode,
            success: function(html) {
                if ("Brand Name already Exists." == html) {
                    $("#checkBrand").html("Brand name Already Exist");
                } else {
                    $("#checkBrand").html("Added");
                }
            },
            beforeSend: function()
            {

            }
        });
        return false;
    });
});



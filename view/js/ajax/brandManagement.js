$(document).ready(function() {
    $("#addBrand").click(function() {
        brandName = $("#brandName").val();
        servType = "BrandManage";
        oprCode = "insert";
        if (isEmpty($("#brandName").val())) {
            prepareMessage("ERR_BR_01");
        } else {
            $.ajax({
                type: "POST",
                url: "../../../controller/Router.php",
                data: "brandName=" + brandName + "&servType=" + servType + "&oprCode=" + oprCode,
                success: function(html) {
                    prepareMessage(html);
                },
                beforeSend: function()
                {

                }
            });
        }
        return false;
    });
});



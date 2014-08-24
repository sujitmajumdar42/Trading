var message = new Object();

message["ERR_BR_01"] = "Brand name can't be empty.";
message["ERR_BR_02"] = "Brand already exists.";
message["ERR_BR_03"] = "Sorry for inconvenience.Please Try again.";
message["ERR_BR_04"] = "No change in Brand Name.";
message["ERR_BR_05"] = "Brand can't be removed, as products are available.";

message["ERR_PR_01"] = "No products available for this brand.";
message["ERR_PR_02"] = "Please select any brand.";
message["ERR_PR_03"] = "Product name can't be empty.";
message["ERR_PR_04"] = "Product already exists. Try another.";
message["ERR_PR_05"] = "No change in product name.";
message["ERR_PR_06"] = "Please select a product name";
message["ERR_PR_07"] = "Availabe in store, so can't delete.";
message["ERR_PR_08"] = "Select proper unit for this product.";
message["ERR_PR_09"] = "No products available.";
message["ERR_PR_10"] = "Please select quantity."
message["ERR_PR_11"] = "Insufficent quantity in store."

message["MSG_COM_01"] = "Updating inventory.Please wait.";

message["INF_BR_01"] = "Brand is addded successfully.";
message["INF_BR_02"] = "Brand is updated successfully.";
message["INF_BR_03"] = "Brand is removed successfully.";

message["INF_PR_01"] = "Product is added successfully.";
message["INF_PR_02"] = "Product is updated successfully.";
message["INF_PR_03"] = "Product is removed successfully.";
message["INF_PR_04"] = "Product is added to cart.";

function getMessage(msgCode) {
    return message[msgCode];
}

function getMessageType(msgCode) {
    var type = msgCode.slice(0, 3);
    var className = "";
    if (type == "ERR") {
        className = "alert error";
    } else if (type == "INF") {
        className = "alert info";
    } else if (type == "MSG") {
        className = "alert msg";
    }
    return className;
}

function prepareMessage(msgCode, responseID) {
    if ($("#response").is(':visible') == true) {
        $("#response").fadeOut("slow", function() {
            $("#response").html(getMessage(msgCode));
            $("#response").removeClass($("#response").attr('class')).addClass(getMessageType(msgCode));
            $("#response").fadeIn("slow");
        });
    } else {
        $("#response").html(getMessage(msgCode));
        $("#response").removeClass($("#response").attr('class')).addClass(getMessageType(msgCode));
        $("#response").fadeIn("slow");
    }
}

function showAvail(quantity) {
    if (quantity.indexOf("e") >= 0) {
        availBox = quantity.split('e')[0];
        availPac = quantity.split('e')[1];
        showAvailQty(availBox,"availibilityBox");
        showAvailQty(availPac,"availibilityPac");
    } else {
        if($("#availibilityBox").is(':visible')==true){
            $("#availibilityBox").fadeOut("slow");
        }
        showAvailQty(quantity,"availibilityPac");
    }
     
}

function showAvailQty(quantity,type) {
    if ($("#"+type).is(':visible') == true) {
        $("#"+type).fadeOut("slow", function() {
            $("#"+type).html("&nbsp;&nbsp;"+quantity);
            $("#"+type).fadeIn("slow");
        });
    } else {
        $("#"+type).html("&nbsp;&nbsp;"+quantity);
        $("#"+type).fadeIn("slow");
    }
}

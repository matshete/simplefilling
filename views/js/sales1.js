
$(document).ready(function() {
//Add Sale
$(".btnAddSale").click(function(){ 




var idSeller = $("#newSeller").val();
var idCustomer = $("#selectCustomer").val();
var code = $("#newSale").val();
var products = $("#productsList").val();
var tax = $("#newTaxSale").val();
var discount = $("#newDiscTotal").val();
var netPrice = $("#newSubTotal").val();
var totalPrice = $("#newSaleTotal").val();
var paymentMethod = $("#newPaymentMethod").val();
alert(totalPrice);

if (totalPrice=='') {
alert("Insertion Failed Some Fields are Blank....!!");
}else{

$.post("ajax/sales.ajax.php", {
idSeller1:idSeller,
idCustomer1: idCustomer,
code1: code,
products1: products,
tax1:tax,
discount1:discount,
netPrice1:netPrice,
totalPrice1:totalPrice,
paymentMethod1: paymentMethod
}, function() {
alert("successful");

});

}

});

});
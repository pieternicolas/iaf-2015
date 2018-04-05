var seatingTier= new Array();
seatingTier["PLATINUM"]=30;
seatingTier["GOLD"]=25;
seatingTier["SILVER"]=20;

function getSeatingTier()
{
    var tierPrice=0;
    var theForm = document.forms["ticketOrder"];
    var selectedTier = theForm.elements["sTier"];

    tierPrice = seatingTier[selectedTier.value];
 
    return tierPrice;
}

var ticketQuantity= new Array();
ticketQuantity["1"]=1;
ticketQuantity["2"]=2;
ticketQuantity["3"]=3;
ticketQuantity["4"]=4;
ticketQuantity["5"]=5;
ticketQuantity["6"]=6;
ticketQuantity["7"]=7;
ticketQuantity["8"]=8;
ticketQuantity["9"]=9;
ticketQuantity["10"]=10;

function getTicketQuantity()
{
	var quantity=0
	var theForm = document.forms["ticketOrder"];
	var selectedQuantity = theForm.elements["quantity"];
	
	quantity = ticketQuantity[selectedQuantity.value];
	
	return quantity;
}

function getTotal()
{
    var totalPrice = getSeatingTier() * getTicketQuantity() ;
 
    document.getElementById("totalPrice").innerHTML =
    "Total price for your order = SGD "+totalPrice;
}
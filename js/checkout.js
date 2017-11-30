//talies every time the Quantity is updated in itemtotal
function subTotal(price, quantity){
  var subTotal;
  var price = document.getElementById("price").innerHTML;
  var quantity = document.getElementById("quantity").value;

  subTotal = price * quantity;
  console.log(subTotal);
    document.getElementById("subtotal").innerHTML=subTotal;
  return subTotal;
}

//finds the total price per line item then adds to subTotal
function itemTotal(price, quantity){
  var price = document.getElementById("price").innerHTML;

  var quantity = document.getElementById("quantity").value;
  console.log(price);
  console.log(quantity);

  total = price * quantity;
  console.log(total);
  document.getElementById("itemTotal").innerHTML=total;
  subTotal(price, quantity);
  return total;
}

function clearCart(){
  window.location ="../clearcart.php";
}

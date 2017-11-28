function subTotal(price, quantity){
  var subTotal;
  var price = price;
  var quantity = quantity;

  subTotal = price * quantity;
  console.log(subTotal);
  return subTotal;
}

function updateQuantity(price, quantity){
  itemTotal(price, quantity);
}

function itemTotal(price, quantity){
  var price = price;

  var quantity = document.getElementById("quantity").value;
  console.log(price);
  console.log(quantity);

  total = price * quantity;
  console.log(total);
  return total;
}

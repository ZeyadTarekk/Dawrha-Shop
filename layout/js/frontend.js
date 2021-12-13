// Start SignIn
function togglePasswordVisibility() {
  let password = document.getElementById("password");
  if (password.type === "password") {
      password.type = "text";
  } else {
      password.type = "password";
  }
  let eyeIcon = document.getElementById("eyeIcon");
  if (eyeIcon.classList.contains("bi-eye")) {
      eyeIcon.classList.remove("bi-eye");
      eyeIcon.classList.add("bi-eye-slash");
  } else {
      eyeIcon.classList.remove("bi-eye-slash");
      eyeIcon.classList.add("bi-eye");
  }
}
// End SignIn

//counter
let count=0;
let countT=document.getElementById("count");
function plus()
{
  count++;
  countT.value=count;
}
function minus()
{
  if(count>0)
  {
    count--;
    countT.value=count;
  }
}
//end counter


//add item_to cart

document.addEventListener("DOMContentLoaded", function(event) {
  const cartButtons = document.querySelectorAll('.cart-button');
  cartButtons.forEach(button => {
  button.addEventListener('click',cartClick);
  });
  function cartClick(){
  let button =this;
  button.classList.add('clicked');
  }
  });

//end add item_to cart

//Start ReviewItem
//counter to the number of items to add to cart
let amount = document.getElementById("amount");
function ereasing() {
  amount.innerHTML = +amount.innerHTML - 1;
    if (amount.innerHTML < 0) {
      amount.innerHTML = 0;
    }
}
function adding(max) {
  if (amount.innerHTML < max) {
    amount.innerHTML = +amount.innerHTML + 1;
  }
}
//function to change the main image of the item
let thumbArray = document.querySelectorAll(".thumbnails img");
let mainImage = document.querySelector("#screen img");

thumbArray.forEach(element => {
  element.addEventListener("click",function() {
    //change the main image src with this src
    let newsrc = element.getAttribute("src");
    mainImage.setAttribute("src", newsrc);
  });
});
//End ReviewItem



<?php 

$pageTitle = 'the name of the item';
include 'init.php';
?>


<div class="container">
  <div class="gallery">
    <!-- the main image -->
    <div id="screen">
      <!-- remember to put each image in var then swap between them if any of the thumbnails picked -->
      <img src="<?php echo $dataimages . "image-product-1.jpg" ?>" alt="">
    </div>

    <div class="thumbnails">
      <!-- loop to get the number of images of the product -->
      <img src="<?php echo $dataimages . "image-product-2.jpg" ?>" alt="" onclick="toThumb(theImageVar)">
      <img src="<?php echo $dataimages . "image-product-3.jpg" ?>" alt="" onclick="toThumb(theImageVar)">
      <img src="<?php echo $dataimages . "image-product-4.jpg" ?>" alt="" onclick="toThumb(theImageVar)">
    </div>
  </div>

  <div class="product">
    <div class="seller-name">Beshoy Morad</div>
    <div class="item-name">Fucked Shose</div>
    <div class="description">Lorem ipsum dolor sit amet consectetur 
      adipisicing elit. Architecto sunt est reprehenderit dolores. 
      Voluptates animi eligendi ad doloribus similique voluptate in doloremque dolorem veritatis, 
      cumque beatae praesentium nesciunt quam omnis!</div>
    <div class="price">
      <!-- here we need to get the discount then know the new price -->
      <div class="new-price">$125</div>
      <div class="discount">50%</div>
      <div class="old-price">$250</div>
    </div>
    <div class="order-section">
      <div class="counter">
        <span class="left-btn" onclick="ereasing()">-</span>
        <div id="amount">0</div>
        <!-- need to send the max number of items to adding(max) -->
        <span class="right-btn" onclick="adding(5)">+</span>
      </div>
      <button class="add-to-cart-btn">
        <span>Add to cart</span>
      </button>
    </div>
  </div>
</div>







<?php include $tpl . 'footer.php' ?>
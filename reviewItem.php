<?php 

$pageTitle = 'the name of the item';
include 'init.php';
?>

<div class="container">
  <section>
    <div class="gallery">
      <!-- the main image -->
      <div id="screen">
        <!-- remember to put each image in var then swap between them if any of the thumbnails picked -->
        <img src="<?php echo $dataimages . "image-product-1.jpg" ?>" alt="">
      </div>
      <div class="thumbnails">
        <!-- loop to get the number of images of the product -->
        <img src="<?php echo $dataimages . "image-product-1.jpg" ?>" alt="">
        <img src="<?php echo $dataimages . "image-product-2.jpg" ?>" alt="">
        <img src="<?php echo $dataimages . "image-product-3.jpg" ?>" alt="">
        <img src="<?php echo $dataimages . "image-product-4.jpg" ?>" alt="">
      </div>
    </div>
    <div class="product">
      <p class="seller-name">By: Beshoy Morad</p>
      <hr>
      <span class="date-of-item">Added in : 25/1/2002</span>
      <p class="item-name">Fucked Shose</p>
      <p class="description">Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Architecto sunt est reprehenderit dolores. 
        Voluptates animi eligendi ad doloribus similique voluptate in doloremque dolorem veritatis, 
        cumque beatae praesentium nesciunt quam omnis!</p>
      <div class="price">
        <!-- here we need to get the discount then know the new price -->
        <div class="new-price">$125</div>
        <div class="discount">50%</div>
        <div class="old-price">$250</div>
      </div>
      <form action="" class="order-section">
        <div class="counter">
          <span class="left-btn" onclick="ereasing()"><i class="fas fa-minus"></i></span>
          <input type="number" id="amount" max="5">
          <!-- need to send the max number of items to adding(max) -->
          <span class="right-btn" onclick="adding(5)"><i class="fas fa-plus"></i></span>
        </div>
        <button class="add-to-cart-btn">
          <i class="fas fa-shopping-cart"></i>
          <span>Add to cart</span>
        </button>
      </form>
    </div>
  </section>
</div>

<?php include $tpl . 'footer.php' ?>
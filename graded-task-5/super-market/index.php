<?php
global $products, $guard_handler;
include_once 'init.php';
$guard_handler->validate('client');

include_once 'templates/header.php';
$products_data = $products->get_products();
?>
<!--start of products section-->
<?php
function echoProduct($product)
{
    $name = $product['name'];
    $description = $product['description'];
    $price= $product['price'];
    $image = $product['image'];
    $id = $product['id'];
    echo '
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card py-3 d-flex flex-column align-items-center">
            <img src="assets/' . $image . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $name . '</h5>
                <p class="card-text" id="card-desc">' . $description . '</p>
                <p class="card-text"> price: ' . $price . '$</p>
                <form action="request-handler.php?model=orders" method="post">
                    <input type="hidden" name="product_id" value="'.$id.'">
                    <input type="hidden" name="product_price" value="'.$price.'">
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                </form>
                
            </div>
        </div>
    </div>';
}
?>
<section class="main">
    <div class="container">
        <div class="row row-gap-2">
            <?php
                foreach ($products_data as $product){
                    echoProduct($product);
                }
            ?>
        </div>
    </div>
</section>


<?php
include_once 'templates/footer.php';
?>

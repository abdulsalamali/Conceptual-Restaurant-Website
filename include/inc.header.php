<nav class=" navbar-personal pb-4 navbar navbar-expand-md bg-dark navbar-dark d-flex fixed-top justify-content-between" style=" opacity:0.61; z-index: 1;background-color: #281923;">
    <!-- Brand -->
    <img src="projectImages\logo-white.svg" alt="logo" width="100" class="Logo">

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav" style="margin-left: auto; 
            margin-right: 0;">
            <li class="navbar-list"><a href="index.php" class="navbar-anker" media=>Home</a></li>
            <li class="navbar-list"><a href="index.php#menu-section" class="navbar-anker">Menu</a></li>
            <li class="navbar-list"><a href="index.php#Gallery-Section" class="navbar-anker">Gallery</a></li>
            <li class="navbar-list"><a href="index.php#Tetimonials-section" class="navbar-anker">Tetimonials</a></li>
            <li class="navbar-list"><a href="#contact-section" class="navbar-anker">Contact Us</a></li>
            <li class="navbar-list"><a id="red_button" href="" class="navbar-anker">Search</a></li>
            <li class="navbar-list"><a id="red_button" href="" class="navbar-anker">Profile</a></li>
            <li class="navbar-list"><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="red_button" href="php/cart.php" class="navbar-anker">Cart
                    <p style="display:inline; "><mark style="background-color: #ffaa00; padding: 2px; color: #A80E0E" id="cart"><?php "3" ?><?php echo (isset($_COOKIE["cart"])) ?  strlen($_COOKIE["cart"]) / 2 : 0  ?></mark></p>
                    <!-- do we have to link it with home page?-->
                </a></li>
            <!-- add p tage to hold the the number of items inside cart -->
        </ul>
    </div>

</nav>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cart content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="item-div" class="col-md-6 col-sm-6 col-6">Item</div>
                    <div id="price-div" class="col-md-6 col-sm-6 col-6">Price</div>

                    <?php
                    include_once 'php/meal_db.php';
                    include_once 'php/meal.php';

                    $classA = new Meal_db();

                    if (isset($_COOKIE["cart"])) {

                        $total = 0;
                        $id_array = (explode(",", $_COOKIE["cart"]));
                        for ($i = 0; $i < count($id_array) - 1; $i++) :
                            $total = $total +  ((float) $classA->getMealById($id_array[$i])["price"]);
                    ?>
                    

                            <div class="col-md-6 col-sm-6 col-6 "><?php echo $classA->getMealById($id_array[$i])['title']; ?> </div>
                            <div class="col-md-6 col-sm-6 col-6 "><?php echo (float) $classA->getMealById($id_array[$i])['price']; ?> </div>


                        <?php endfor; ?>


                        <div id="total-div" class="col-md-6 col-sm-6 col-6 ">Total</div>
                        <div id="total-div-num" class="col-md-6 col-sm-6 col-6"><?php echo $total ?></div>



                    <?php } ?>


                </div>
            </div>
            <div  class="modal-footer">
                <form  action="php/order.php" method="POST">
                    <button type="button" class="btn btn-secondary bg-danger text-dark rounded-pill p-1" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary bg-warning text-dark rounded-pill ">order now</button>
                </form>
            </div>
        </div>
    </div>
</div>
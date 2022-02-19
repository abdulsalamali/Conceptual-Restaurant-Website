<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="script.js"></script>

    <title>index</title>
</head>

<body>

    <!-- waleed big. -->


    <?php include 'include/inc.header.php';

    // include 'php/cart.php'
    // $previous = $_SERVER['HTTP_REFERER'];
    ?>


    <section class="top-section">
        <div class="content margin">
            <h1>Party time</h1>
            <section class="shape">
                <h3>Buy any 2 burgers and get 1.5L Pepsi Free</h3>
            </section>
        </div>
        <div class="margin">
            <button>Order Now</button>
        </div>
    </section>
    <!-- waleed end. -->

    <?php if (isset($_COOKIE["recent-bought"])) { ?>
        <section id="most-popular">

            <h2 style="margin-top: 3rem;
        padding-top: 5rem;
font-weight: 500;
margin-bottom: 25px;
color: #A80E0E;
width: 100%;
text-align: center;" class=" mt-3">Your Recent Bought Meals</h2>

            <div class="container-fluid gallery-content margin mt-1">
                <div class="row">
                    <?php
                    $id_array = array_values(array_unique(explode(",", $_COOKIE["recent-bought"])));
                    for ($i = 0; $i < count($id_array) - 1; $i++) :
                    ?>
                        <div class="option1 col-md-4 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                            <a href="detail.php?id=<?php echo $classA->getMealById($id_array[$i])['id']; ?>"><img src="<?php echo "projectImages/" . $classA->getMealById($id_array[$i])['image']; ?>"></a>

                            <p><b><?php echo $classA->getMealById($id_array[$i])['title']; ?></b></p>
                            <p><b><?php echo $classA->getMealById($id_array[$i])['description']; ?></b></p>

                            <p> <a href="php/cart.php?id=<?php echo $classA->getMealById($id_array[$i])['id']; ?>&back=<?php echo $_SERVER["PHP_SELF"] . "#most-popular"; ?>">
                                    <button>buy again</button>
                                </a> <b><?php echo (float) $classA->getMealById($id_array[$i])['price']; ?></b> SAR</p>
                        </div>

                    <?php endfor; ?>

                </div>



            </div>
        </section>
    <?php } ?>

    <section id="menu-section">
        <div class="container-fluid textStyle nomargin">
            <h2>Want To Eat</h2>
            <p>Try our most delicious food and usually take minutes to deliver</p>
            <div class="row">
                <div class="col"><a href="">pizza</a></div>
                <div class="col"><a href="">fast food</a></div>
                <div class="col">
                    <a href="">cupcake</a>
                </div>
                <div class="col "><a href="">sandwitch</a></div>
                <div class="col "><a href="">spaghetti</a></div>
                <div class="col "><a href="">burger</a></div>
            </div>
        </div>
        <div class="container-fluid menu-class nomargin menu-s1">
            <div class="row menu-s2">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 menu-s2">
                    <img class="menu-s2" src="projectImages\delivery.png" width="1000" alt="DeliveryGuy">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 menu-s2 ">

                    <div class="triangle nomargin mt-5 align-middle menu-s2">
                        <h2>We guarntee 30 minutes delivery</h2>
                    </div>
                    <p class="text-white">If your are having a metting working late at night and need an extra push</p>

                </div>
            </div>



        </div>

    </section>

    <!-- waleed big. -->
    <section id="gallery-section">
        <h2>Our Most Popular Recipes</h2>
        <p class="gallery-description"> try our most delictious food and usually take minutes to deliver</p>
        <div class="container-fluid gallery-content margin">
            <div class="row">
                <?php
                $myArray = $classA->getAllMeals();
                for ($i = 0; $i < count($myArray); $i++) {
                ?>

                    <div class="option1 col-md-4 col-sm-12 col-lg-3 col-xl-3 col-xxl-3">
                        <a href="detail.php?id=<?php echo $myArray[$i]['id']; ?>"><img src="<?php echo "projectImages/" . $myArray[$i]['image']; ?>" alt="steak-sandwitch"></a>
                        <!-- <p>&#11088 <?php echo $myArray[$i]['rating']; ?></p> -->
                        <p><b><?php echo $myArray[$i]['title']; ?></b></p>
                        <p><b><?php echo $myArray[$i]['description']; ?></b></p>

                        <p> <a href="php/cart.php?id=<?php echo $myArray[$i]['id']; ?>&back=<?php echo $_SERVER["PHP_SELF"] . "#gallery-section"; ?>">
                                <button>add to cart</button>
                            </a> <b><?php echo (float) $myArray[$i]['price']; ?></b> SAR</p>
                    </div>
                <?php } ?>

            </div>



        </div>

    </section>
    <!-- waleed end. -->



    <section id="Tetimonials-section" class="pb-4">
        <h2>Clients testimonials</h2>
        <div class="flexbox-container margin">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 "> <img src="projectImages/man-eating-burger.png" alt="man-eating-burger"></div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 align-self-center ">
                                <p class=" align-self-center ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo beatae repudiandae illo, veritatis a cum ad commodi qui ducimus magnam eius harum neque vitae adipisci reprehenderit et obcaecati odio temporibus? lorem ipsum
                                    dolor lorem. Cum sociis natoque penat lorem et lorem lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit praesentium fugiat eveniet maxime? Vitae quae, architecto odio ea animi sit inventore at doloribus
                                    temporibus distinctio quo eos praesentium repudiandae numquam?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 "> <img src="projectImages/man-eating-burger.png" alt="man-eating-burger"></div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 align-self-center ">
                                <p class="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo beatae repudiandae illo, veritatis a cum ad commodi qui ducimus magnam eius harum neque vitae adipisci reprehenderit et obcaecati odio temporibus? lorem ipsum
                                    dolor lorem. Cum sociis natoque penat lorem et lorem lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit praesentium fugiat eveniet maxime? Vitae quae, architecto odio ea animi sit inventore at doloribus
                                    temporibus distinctio quo eos praesentium repudiandae numquam?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 "> <img src="projectImages/man-eating-burger.png" alt="man-eating-burger"></div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 align-self-center ">
                                <p class="align-self-center ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo beatae repudiandae illo, veritatis a cum ad commodi qui ducimus magnam eius harum neque vitae adipisci reprehenderit et obcaecati odio temporibus? lorem ipsum
                                    dolor lorem. Cum sociis natoque penat lorem et lorem lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit praesentium fugiat eveniet maxime? Vitae quae, architecto odio ea animi sit inventore at doloribus
                                    temporibus distinctio quo eos praesentium repudiandae numquam?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



        </div>
    </section>





    <?php include 'include/inc.footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
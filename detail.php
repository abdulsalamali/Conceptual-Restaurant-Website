<!DOCTYPE html>
<html lang="en">

<he <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="script.js"></script>

    </head>

    <body onload="showTable()">

        <?php
        include 'include/inc.header.php';
        include_once 'php/meal.php';
        $id = $_GET['id'];
        $classB = new Meal_db();
        $myArray = $classB->getMealById($id);

        ?>

        <!-- no margin at top -->
        <section class="pb-4 meal-info margin mt-5 pt-5 pt-5 mt-3">
            <div class="row pb-4">
                <img src="<?php echo "projectImages/" . $myArray['image']; ?>" alt="meal" class="col-lg-6 col-md-12 col-sm-12 ">

                <div class="col-lg-6 col-md-12 col-sm-12" style="margin-bottom: 20px;">
                    <h1><?php echo $myArray['title']; ?></h1>

                    <p><?php echo (float) $myArray['price']; ?> SAR</p>
                    <p>&#11088 <?php echo $classB->getRating($id); ?> rating</p>

                    <p><?php echo $myArray['description']; ?></p>
                    <div class="button-container">
                        <div>
                            <button class="buttons3" onclick="decrement()">-</button>
                            <button class="buttons3" id="quantity_button">1</button>
                            <button class="buttons3" onclick="increment()">+</button>
                        </div>



                        <!-- does not add to cart at modal -->
                        <p> <a href="php/cart.php?id=<?php echo $myArray['id']; ?>&back=<?php echo $_SERVER["PHP_SELF"] . "?id=" . $myArray['id']; ?>">
                                <button class="add-to-cart">add to cart</button>
                            </a>

                    </div>

                </div>
            </div>

            <div class>
                <button id="table-reveal" class="section_Buttons" onclick="showTable()">Description</button>
                <button id="review-reveal" class="section_Buttons" onclick="showReview(<?php echo $id ?>)">Review</button>
            </div>

        </section>

        <section id="table" class="margin">
            <p><?php echo $myArray['description']; ?></p>

            <section class>
                <h4>nutrition facts</h4>
                <table border="1px solid black;">
                    <tr>
                        <td colspan="3">
                            <strong>Supplement Facts</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <strong> Serving Size:</strong> <?php echo $myArray['serving_size']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <strong> Serving Per Container: </strong><?php echo $myArray['serving_per_container']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <strong>Amount Per Serving</strong></td>
                        <td> <strong>%Daily Value*</strong> </td>
                    </tr>
                    <?php
                    foreach ($myArray["facts"] as $key => $value) {

                    ?>
                        <tr>
                            <td><?php echo $value['item']; ?></td>
                            <td><?php echo $value['amount_per_serving'] . $value['unit']; ?></td>
                            <td><?php echo $value['daily_value']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs</td>
                    </tr>
                </table>
            </section>
        </section>
        <section class="margin" id="Review-section">
            <?php
            $review_array = $classB->getMealReviews($id); // get all reviews from db
            ?>
            <h3 id="reviewH3" >Reviews</h3>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                </div>

                <div class="carousel-inner">
                </div>

            </div>



            <button id="click" class="add-your-review-button" onclick="add_review()" style="display: block; margin-bottom: 20px;">Add Your Review</button>
            <div class="label3 ">

                <!-- ----------------------------------------------------------------------------------- -->
                <form class="transitioned1 transitioned2" id="disappear" method="post" enctype="multipart/form-data" onsubmit="return false"
>                   
                        
                    <!-- <input id='idField' name='id' type="text" value="<?php $id ?>"><br> -->

                    <div class="label1">
                        <label for="select-image">
                            <h5>Image</h5>
                        </label>
                        <input id='reviewImg' name="fileName" type="file"><br>
                    </div>

                    <div class="label2">

                        <label for="rate-food">
                            <h5>Rate the Food</h5>
                        </label>
                        <input id='reviewRating' type="range" name="rating" list="food-rate" min="0" max="5"><br>
                        <datalist id="food-rate">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option value="4"></option>
                        </datalist>


                        <p>
                            <label for="enter-name">
                                <h5>Name</h5>
                            </label>
                            <input id="name" type="text" placeholder="First and Last name" name="name"><br>
                        </p>

                        <p>
                            <label for="enter-city">
                                <h5>City:</h5>
                            </label>
                            <input id="city" type="text" placeholder="city" name="city"><br>
                        </p>



                        <label for="review-section">
                            <h5>Review</h5>
                            <h5 style="display: none ; color: #A80E0E" id="alert_if_0">Please type your review</h5>
                            <!-- this h5 only shows when submiting 0 chracter review, I added the inline CSS becuase it is smiple-->
                        </label>
                        <textarea name="review" id="review_box_here" maxlength="500" cols="25" rows="8" placeholder="Type your review here max 500 characters" onkeyup="increase_counter()"></textarea><br>
                        <h5 id="review_box_counter">0 / 500</h5>

                    </div>

                    <input type="submit" onclick='submit_fun(<?php echo $id ?>)' style="display: block; margin-bottom: 20px;">
                    </form>

            </div>



        </section>
        <?php include 'include/inc.footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    </body>

</html>
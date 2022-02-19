function decrement() {
    const quantity_button = document.getElementById("quantity_button"); // selects the button conatatining the number
    let value = parseInt(document.getElementById("quantity_button").textContent); // store the value inside theat button in an integer variable
    if (value > 1) { // as stated in the annotated, onle decrement if more than 1
        quantity_button.textContent = String(value - 1); // stores the the new value after decrement in the button
    }
}
//--------------------------------------------------------------

function increment() { // same logic as decrement
    const quantity_button = document.getElementById("quantity_button");
    let value = parseInt(document.getElementById("quantity_button").textContent);
    quantity_button.textContent = String(value + 1);

}

//--------------------------------------------------------------


function add_to_cart(item) {

    const cart_content = document.getElementById("cart").textContent; // store current value of cart for incrementing
    const cart = document.getElementById("cart");

    const parentDiv = item.parentElement.parentElement;
    console.log(parentDiv.innerHTML)

    const itemDiv = document.getElementById("item-div");
    const priceDiv = document.getElementById("price-div");

    const itemClone = parentDiv.children[2].cloneNode();
    const priceClone = parentDiv.children[4].children[1].cloneNode();

    itemClone.textContent = parentDiv.children[2].textContent;
    priceClone.textContent = parentDiv.children[4].textContent.substring(12, 16);

    itemClone.style = "display:block; padding:0px; margin:0px";
    priceClone.style.display = "block";

    itemDiv.appendChild(itemClone)
    priceDiv.appendChild(priceClone)

    let totalPrice = 0;
    for (let i = 0; i < priceDiv.children.length; i++) {
        totalPrice += parseFloat(priceDiv.children[i].textContent);
        console.log(priceDiv.children[i].textContent)
    }


    document.getElementById("total-div-num").textContent = totalPrice;


    try { //find the buttons for incrementing and decrmenting
        const add_to_cart_quntity = parseInt(document.getElementById("quantity_button").textContent); // store quantity I am willing to add
        cart.textContent = String(parseInt(cart_content) + add_to_cart_quntity); // add current vlue + quantity I want to add
        // for some reason casting is mandatory
    } catch (exception_var) {
        console.log("wsss") // if not found, this means we are in index.html, so just increment by 1
        cart.textContent = String(parseInt(cart_content) + 1);
    }
}

function add_to_cart_default() {

    const cart_content = document.getElementById("cart").textContent; // store current value of cart for incrementing
    const cart = document.getElementById("cart");

    try { //find the buttons for incrementing and decrmenting
        const add_to_cart_quntity = parseInt(document.getElementById("quantity_button").textContent); // store quantity I am willing to add
        cart.textContent = String(parseInt(cart_content) + add_to_cart_quntity); // add current vlue + quantity I want to add
        // for some reason casting is mandatory
    } catch (exception_var) {
        console.log("wsss") // if not found, this means we are in index.html, so just increment by 1
        cart.textContent = String(parseInt(cart_content) + 1);
    }
}

function orderNow() {
    const itemDiv = document.getElementById("item-div");
    const priceDiv = document.getElementById("price-div");

    itemDiv.innerHTML = "Item";
    priceDiv.innerHTML = "Price";
    document.getElementById("total-div-num").textContent = "0";
    document.getElementById("cart").textContent = "0";

}

//--------------------------------------------------------------


function add_review() { // only shows the review elements
    console.log("dddddddd");

    const show = document.getElementById("disappear");
    show.classList.add("show");
    show.classList.remove("transitioned2");
    show.classList.remove("transitioned1");

}
//--------------------------------------------------------------


function increase_counter() {
    const counter = document.getElementById("review_box_counter");

    const string_length = document.getElementById("review_box_here").value.length; // splitting the text by the space characters

    counter.textContent = String(string_length) + " / 500";
    ////////////////////////////////////////////////////
    // this section to remove the alert when typing text in the text area
    if (string_length != 0) {
        const alert = document.getElementById("alert_if_0");
        alert.style.display = "none";
    }
    // for text area character limit, just set it in the HTML file to 400 -> maxlength="500"

}
//--------------------------------------------------------------


function submit_conditions() {

    const textArea = document.getElementById("review_box_here");

    if (textArea.value.length == 0) {
        const alert = document.getElementById("alert_if_0");
        alert.style.display = "block";
        return false; // dont allow submit
    } else {

        const customerName = document.getElementById('nameField');

        if (customerName.value == "") {
            customerName.value = "Customer"; // auto fills with the word customer if the name is empty

            // window.location.href = window.location.href; // saves the name in the url
            return true; // allow submit

        }
    }
}

//--------------------------------------------------------------

function showTable() {
    document.getElementById("table-reveal").style = "background: #ffaa00";
    document.getElementById("review-reveal").style = "background: none";

    const table = document.getElementById("table");
    const review = document.getElementById("Review-section");

    table.style.display = "block";
    review.style.display = "none";


}


function showReview(id) {
    document.getElementById("table-reveal").style = "background: none";
    document.getElementById("review-reveal").style = "background: #ffaa00";

    const table = document.getElementById("table");
    const review = document.getElementById("Review-section");

    table.style.display = "none";
    review.style.display = "block";
    var Response = [];


    fetch(`php/review.php?id=${id}`)
        .then(response => response.json())
        .then(data => {

            if (data.length == 0) {
                document.getElementById('reviewH3').textContent = "No Reviews";
            }

            else {
                document.getElementById('reviewH3').textContent = "Reviews";

                element = document.getElementsByClassName('carousel-indicators')[0];
                element.innerHTML = '';
                let i = 0;
                for (const review of data) {
                    element.innerHTML = element.innerHTML + `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${i}" class="active" aria-current="true" aria-label="Slide 1"></button>`
                    i++;
                }

                element3 = document.getElementsByClassName('carousel-inner')[0];
                element3.innerHTML = '';
                i = 0;
                for (const review of data) {
                    var stars='';
                    for(let i = 0; i < review.rating; i++){
                        stars+='&#11088 ';
                    }
                    element3.innerHTML = element3.innerHTML +
                        `<div class="carousel-item ${i == 0 ? 'active' : ''}">
                            <div class="row">
                                <img src="php/reviewImages/${review.image}" class="col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 " />
                                <div class=" review2 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 align-self-center">
                                    <h4>${review.reviewer_name}</h4>
                                    <h5>${review.city}  ${review.date} ${stars} </h5>
                                    <p>${review.review}</p>
                                </div>
                            </div>
                        </div>`

                    i++;

                }









                element3 = document.getElementsByClassName('carousel-inner')[0];

                if (element3.innerHTML == '') {

                    element2 = document.getElementById('carouselExampleIndicators');
                    element2.innerHTML = element2.innerHTML + `<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    
`
                }
            }
        });

}




//----------------------------------------------------------------

function submit_fun(id) {

    var allow = submit_conditions();

    if(allow){
    const reviewRating = document.getElementById('reviewRating').value;
    const name = document.getElementById('name').value;
    const city = document.getElementById('city').value;
    const reviewBox = document.getElementById('review_box_here').value;
    const fileName = document.getElementById('reviewImg');
    let formData = new FormData( document.getElementById("disappear") );
    formData.append('id', id);


    fetch(`php/review.php`, {
        method: 'POST',
        body: formData
        
    })
    .then(response => response.json())
    .then(data => {
        const show = document.getElementById("disappear");
        show.classList.remove("show");
        show.classList.add("transitioned2");
        show.classList.add("transitioned1");
        showReview(id);
    });

    }

}





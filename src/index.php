<?php
    include_once("./php/db_connection.php");
    $insertdata=new DB_con();

    
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['customerName']) && !$_POST['numPersons'] == "" && !$_POST['timeReservation'] == "" && !$_POST['dateReservation'] == null){
            $cname = $_POST['customerName'];
            $num_person = $_POST['numPersons'];
            $time_of_reservation = $_POST['timeReservation'];
            $date_of_reservation = strtotime($_POST['dateReservation']);
            $cdate = date('Y-m-d',$date_of_reservation);
            $sql = $insertdata->insert($cname,$num_person,$time_of_reservation,$cdate);
            if($sql)
            {
                echo "<script>alert('Reservation Complete!');</script>";
            }
            else
            {
                echo "<script>alert('Reservation Failed!');</script>";
            }
        } else {
            echo "<script>alert('Incomplete Data provided, Try Again.');</script>";
        }
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/products.css">
    <link rel="stylesheet" href="./assets/css/buttons.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins|Spartan|Merienda+One&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Italian Foods</title>
</head>
<body>
    <div class="navbar">
        <a href="#home" class="logo">Marzia's</a>
        <ul class="nav">
            <li><a href="#order">Order</a></li>
            <li><a href="#track">Track Your Reservation</a></li>
            <li> <a href="#about">About Us</a></li>
        </ul>
    </div>
    <section class="banner-area" id="home">
        <header class="introduction">
            <div class="intro-container">
                <div class="intro-text">
                    <div class="intro-lead-in"><span>Mamma,</span></div>
                    <div class="intro-heading"><span>che piatto oggi?</span></div>
                </div>
            </div>
        </header>
    </section>
    <section class="order-area" id="order">
        <div class="text-part">
            <h1>Products</h1>
            <div class="product-container">
                <!-- CART -->
                <div class="product-cart">
                    <div class="chosen-product-container">
                       <form action="#order" method="post">
                            <label for="customerName">Name</label>
                            <input type="text" name="customerName" id="">
                            <label for="numPersons">Number of people</label>
                            <select name="numPersons">
                                <option value="" disabled selected>Select Option</option>
                                <option value="1-2">1 - 2 Persons</option>
                                <option value="3-5">3 - 5 Persons</option>
                                <option value="8-10">8 - 10 Persons</option>
                            </select> 
                            <label for="timeReservation">Time of Reservation</label>
                            <input type="time" name="timeReservation" id="" placeholder="e.g. 12:00AM">
                            <label for="">Date of Reservation</label>
                            <input type="date" name="dateReservation" id="" placeholder="e.g. 03/20/2020 or March 3, 2020">
                            <input type="submit" name="submit" class="checkoutBtn" value="Make Reservations">
                       </form>
                    </div>
                </div>

                <!-- PRODUCTS -->
                <div class="product-list">
                    <div class="product-row" id="row1">
                        <div class="row" id="item1">
                            <div class="image" id="image1">
                                <div class="hover">
                                    <div class="add-to-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="product-name">Tsuki Spaghetti</p>
                            <p class="item-price" id="item-price">Php 499.99</p>
                        </div>
                        <div class="row" id="item2">
                            <div class="image" id="image2">
                                <div class="hover">
                                    <div class="add-to-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="product-name">Tsuki Pasta</p>
                            <p class="item-price" id="item-price">Php 359.99</p>
                        </div>
                        <div class="row" id="item3">
                            <div class="image" id="image3">
                                <div class="hover">
                                    <div class="add-to-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="product-name">Italian Pizza</p>
                            <p class="item-price" id="item-price">Php 1499.99</p>
                        </div>
                    </div>
                    <div class="product-row" id="row2">
                        <div class="row" id="item4">
                            <div class="image" id="image4">
                                <div class="hover">
                                    <div class="add-to-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="product-name">Marzia's Lasagna</p>
                            <p class="item-price" id="item-price">Php 4999.99</p>
                        </div>

                        <!-- START OF THE PROBLEM -->
                        <div class="row" id="item5">
                            <div class="image" id="image5">
                                <div class="hover">
                                    <div class="add-to-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="product-name">Veggie Bread</p>
                            <p class="item-price" id="item-price">Php 199.99</p>
                        </div>
                        <!-- END -->

                        <div class="row" id="item6">
                            <div class="image" id="image6">
                                <div class="hover">
                                    <div class="add-to-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="product-name">Seafood Carbonara</p>
                            <p class="item-price" id="item-price">Php 899.99</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="track-area" id="track">
        <div class="text-part">
            <h1>Keep track of your reservation!</h1>
            <div class="inputField">
                <input type="text" class="input" placeholder="Reference Number">
                <button id="trackBtn">Track</button>
            </div>
        </div>
    </section>
    <section class="about-area" id="about">
        <div class="text-part">
            <h1>About</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos voluptatibus rem placeat fugit autem officia. Laborum itaque dolores, totam, consequatur, aliquid veritatis quis a optio facere nostrum fugit dicta?</p>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <h2 id="footer-title">ITCC-13</h2>
            <div class="fc-container">
                <h3 id="footer-contactUS" class="footer-h3" >
                    Contact Us: 09770944427 /
                    <a href="https://www.gmail.com/" class="footer-h3">marzias@gmail.com</a>
                </h3>
                <h3 id="footer-Location" class="footer-h3">Location: Xavier University, Cagayan de Oro City</h3>
            </div>
        </div>  
    </footer>
</body>
</html>
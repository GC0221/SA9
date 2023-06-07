<?php
include('../config.php');
$fp=fopen("c:\\AppServ\\www\\session\\mylogin.txt","r");
$sid=fread($fp,1024);
fclose($fp);
session_id($sid);
session_start();
echo "會員";
echo $_SESSION['account'];
echo "已登錄!";
$login_account = $_SESSION['account'];
echo $login_account;
?>


<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>輔仁大學學餐系統(測試版)</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">

<!-- CSS Core -->
<link rel="stylesheet" href="dist/css/core.css" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="dist/css/theme-beige.css" />

</head>

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo dark">
                        <a href="index.html">
                            <img src="assets/img/fju_logo.png" alt="" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                            <li class="has-dropdown">
                                <a href="index.php">首頁</a>
                            </li>
                            <li><a href="page-contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="module left">
                        <a href="menu-list-collapse.html" class="btn btn-outline-secondary"><span>Order</span></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">0</span>
                        </span>
                        <span class="cart-value">$<span class="value">0.00</span></span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="index.html">
                <img src="assets/img/fju_logo.png" alt="">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">0</span>
        </a>

    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-4">
                        <h1 class="mb-0">菜單</h1>
                        <!--
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                        -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
    
                    
     
                        <!-- Menu Category / Pasta -->
                        <div id="仁園" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuPastaContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/輔園.jpg" alt=""></div>
                                <h2 class="title">輔園</h2>
                            </div>
                            <div id="menuPastaContent" class="menu-category-content collapse">
                                <!-- Menu Item -->
                                <form id="form1" name="form1" method="post" action="confirm.php">
                         <fieldset>
                        <input type="checkbox" name="food_id1" id="food_id1" value="滷肉飯(小)">  
                        <label for="food_id1" p class = "h5">滷肉飯(小): 30 NTD，數量</label>
                        <input id="food1_quantity" name="food1_quantity" type="number" min="1" max="20" size="5"/></br>
                        
                        <input type="checkbox" name="food_id2" id="food_id2" value="餛飩麵(小)">
                        <label for="food_id2" p class = "h5">餛飩麵(小): 50 NTD，數量</label> 
                        <input id="food2_quantity" name="food2_quantity" type="number" min="1" max="20" size="1"/><br>
                        
                        <input type="checkbox" name="food_id3" id="food_id3" value="滷肉飯(大)">
                        <label for="food_id3" p class = "h5">滷肉飯(大): 70 NTD，數量</label> 
                        <input id="food3_quantity" name="food3_quantity" type="number" min="1" max="20" size="1"/><br>
                       
                        <input type="checkbox" name="food_id4" id="food_id4" value="咖哩飯">
                        <label for="food_id4" p class = "h5">咖哩飯: 80 NTD，數量</label> 
                        <input id="food4_quantity" name="food4_quantity" type="number" min="1" max="20" size="1"/><br>
                        
                        <input type="checkbox" name="food_id5" id="food_id5" value="排骨飯">
                        <label for="food_id5" p class = "h5">排骨飯: 100 NTD，數量</label> 
                        <input id="food5_quantity" name="food5_quantity" type="number" min="1" max="20" size="1"/><br>
                       
                        <input id="submit" name="submit" type="submit" value="送出"/>
                        </fieldset>
                        </form>
                        <!-- Menu Category / Pizza -->
                        <div id="心園" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuPizzaContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/心園.jpg" alt=""></div>
                                <h2 class="title">心園</h2>
                            </div>
                            <div id="menuPizzaContent" class="menu-category-content collapse">
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">陽春麵</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4">$<span data-product-base-price>30</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="12"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">乾麵</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4">$<span data-product-base-price>30</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="13"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">油麵</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"> $<span data-product-base-price>30</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="14"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">意麵</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4">$<span data-product-base-price>30</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="15"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Menu Category / Sushi -->
                        <div id="聖園" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuSushiContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/聖園.jpg" alt=""></div>
                                <h2 class="title">聖園</h2>
                            </div>
                            <div id="menuSushiContent" class="menu-category-content collapse">
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">招牌雞肉飯</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4">$<span data-product-base-price>40</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="16"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">雞胸咖喱</h6>
]                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4">$<span data-product-base-price>90</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="17"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">雞腿咖喱</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"><span class="text-muted">from</span> $<span data-product-base-price>100</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="18"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">蔬食咖喱</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"><span class="text-muted">from</span> $<span data-product-base-price>80</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="19"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Menu Category / Desserts -->
                        <div id="文園" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuDessertsContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/文園.jpg" alt=""></div>
                                <h2 class="title">文園</h2>
                            </div>
                            <div id="menuDessertsContent" class="menu-category-content collapse">
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">Beef Burger</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"><span class="text-muted">from</span> $<span data-product-base-price>9.00</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">Broccoli</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"><span class="text-muted">from </span> $<span data-product-base-price>9.00</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="2"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">Chicken Burger</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"><span class="text-muted">from </span> $<span data-product-base-price>9.00</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="3"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0">Creste di Galli</h6>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                            <span class="text-md mr-4"><span class="text-muted">from</span> $<span data-product-base-price>9.00</span></span>
                                            <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="4"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer" class="bg-dark dark">

            <div class="container">
                <!-- Footer 1st Row -->
                <div class="footer-first-row row">
                    <div class="col-lg-3 text-center">
                        <a href="index.html"><img src="assets/img/fju_logo.png" alt="" width="88" class="mt-5 mb-5"></a>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <h5 class="text-muted mb-3">Social Media</h5>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Footer 2nd Row -->
                <div class="footer-second-row">
                    <span class="text-muted">Copyright SA9 2023©.</span>
                </div>
            </div>

            <!-- Back To Top -->
            <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

        </footer>
        <!-- Footer / End -->

    </div>
    <!-- Content / End -->

    <!-- Panel Cart -->
    <div id="panel-cart">
        <div class="panel-cart-container">
            <div class="panel-cart-title">
                <h5 class="title">Your Cart</h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <div class="panel-cart-content cart-details">
                <table class="cart-table">
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                            <span class="caption text-muted">Large (500g)</span>
                        </td>
                        <td class="price">$9.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                            <span class="caption text-muted">Small (200g)</span>
                        </td>
                        <td class="price text-success">$9.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                </table>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-7 text-right text-muted">Devliery:</div>
                        <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
                    </div>
                -->
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                    </div>
                </div>
                <div class="cart-empty">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty...</p>
                </div>
            </div>
        </div>
        <a href="checkout.html" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
    </div>

    <!-- Panel Mobile -->
    <nav id="panel-mobile">
        <div class="module module-logo bg-dark dark">
            <a href="#">
                <img src="assets/img/fju_logo.png" alt="" width="88">
            </a>
            <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
        </div>
        <nav class="module module-navigation"></nav>
        <div class="module module-social">
            <h6 class="text-sm mb-3">Follow Us!</h6>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade product-modal" id="product-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-1 product-modal-name">Boscaiola Pasta</h6>
                        <span class="text-muted product-modal-ingredients">Pasta, Cheese, Tomatoes, Olives</span>
                    </div>
                    <div class="col-3 text-lg text-right">$<span class="product-modal-price"></span></div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details panel-details-size">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-sizes-list" data-toggle="collapse">Size</a>
                    </h5>
                    <div id="panel-details-sizes-list" class="collapse show">
                        <div class="panel-details-content">
                            <div class="product-modal-sizes">
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Small - 100g ($9.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Medium - 200g ($14.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Large - 350g ($21.99)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details panel-details-additions">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-additions-content" data-toggle="collapse">Additions</a>
                    </h5>
                    <div id="panel-details-additions-content" class="collapse">
                        <div class="panel-details-content">
                            <!-- Additions List -->
                            <div class="row product-modal-additions">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tomato ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ham ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Chicken ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Cheese($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bacon ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details panel-details-form">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-other" data-toggle="collapse">Other</a>
                    </h5>
                    <div id="panel-details-other" class="collapse">
                        <form action="#">
                            <textarea cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="add-to-cart"><span>Add to Cart</span></button>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="update-cart"><span>Update</span></button>
        </div>
    </div>
</div>

<!-- Cookies Bar -->
<div id="cookies-bar" class="body-bar cookies-bar">
    <div class="body-bar-container container">
        <div class="body-bar-text">
            <h4 class="mb-2">Cookies & GDPR</h4>
            <p>This is a sample Cookies / GDPR information. You can use it easily on your site and even add link to <a href="#">Privacy Policy</a>.</p>
        </div>
        <div class="body-bar-action">
            <button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
        </div>
    </div>
</div>

<!-- JS Core -->
<script src="dist/js/core.js"></script>

</body>

</html>

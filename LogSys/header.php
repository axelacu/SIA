<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="AIRBLIOLOGSYS" content="AIRBLIO FOR FUTURE">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title></title>
</head>


<body>
<div id="bloc_page">
    <header id="headerheader">
        <div class="containerheader">
            <div id="desktop_logo">
						<span id="logoLink">
							<a href="index.php">
								<img id="logo_img-responsive" src="images/airblio4.png" alt="AIRBLIO">
							</a>
						</span>
            </div>


            <!-- Barre de recherche -->
            <div id="colonne2">
                <div id="recherche_p" >
                        <form action="recherche.php" id="searchthis" method="get">
                                <input id="search" name="q" type="search" placeholder="Rechercher" />
                        </form>

                </div>
            </div>

            <div id="login">
                <nav>
                    <?php
                    if(!isset($_SESSION['USER_NAME'])){

                        echo '<div class="w3-container">
                                  <div class="w3-bar">
                                        <form class="w3-bar-item">
                                            <a href="signup.php" class="button">Sign Up</a>
                                        </form> 
                                          
                                        <div class="w3-bar-item">
                                            <a href="singin.php" class="button">Sign In</a>
                                        </div>
                                   </div>
                              </div>';
                    }else{
                        $submenu = "";
                        switch ($_SESSION['TYPE_USER']){
                            case 'C': //for client.
                                $submenu = '<a href="commands_client.php" class="w3-bar-item w3-button button">Commands</a>
                                              <a href="demands.php" class="w3-bar-item w3-button button">Demands</a>';
                                break;
                            case 'M': //for commercial
                                $submenu = '<a href="commands_pro.php" class="w3-bar-item w3-button button">Waiting Clients</a>
                                              <a href="commands_currents.php" class="w3-bar-item w3-button button">Current Command</a>';
                                break;
                            case 'G':
                                $submenu = '<a href="update_stock.php" class="w3-bar-item w3-button button">Updates Stocks</a>
                                              <a href="register_product.php" class="w3-bar-item w3-button button">Register Products</a>';
                                break;
                            case 'R':
                                $submenu = '<a href="singup_employees.php" class="w3-bar-item w3-button button">Add Employees</a>
                                            <a href="update_stock.php" class="w3-bar-item w3-button button">Updates Stocks</a>
                                              <a href="register_product.php" class="w3-bar-item w3-button button">Register Products</a>
                                              <a href="commands_pro.php" class="w3-bar-item w3-button button">Waiting Clients</a>
                                              <a href="commands_currents.php" class="w3-bar-item w3-button button">Current Command</a>';
                        }

                        echo ' <!--<a href="basket.php" class="button">Basket</a> -->
                                
                                <div class="w3-container">
                                  <div class="w3-bar">
                                        <form class="w3-bar-item" action="includes/logout.inc.php" method="post" >
                                                <button type="submit" name="logout-submit" class="button">Sign out</button>
                                        </form> 
                                          
                                          <div class="w3-bar-item" >
                                            <button onclick="my_Function1()" class="button" style="margin-top:0">My Account</button>
                                            <div id="myaccount" class="w3-dropdown-content w3-bar-block" style="background:#1883ba; color: white;">'.$submenu.'
                                            </div>
                                          </div>
                                           
                                  </div>
                                </div>
                                <script>
                                    function my_Function1() {
                                      var x = document.getElementById("myaccount");
                                      if (x.className.indexOf("w3-show") == -1) {
                                        x.className += " w3-show";
                                      } else { 
                                        x.className = x.className.replace(" w3-show", "");
                                      }
                                    }
                                 </script>
                                <!--

                                -->';
                    }
                    ?>
                </nav>
            </div>

            <div class="topnav" id="myTopnav">
                <nav>
                    <ul id="barre_nav" style="margin-bottom: 0">
                        <a href="index.php" class="active" id="acceuil" >Accueil</a>
                        <a href="catalogue.php" id="produit">Produits</a>
                        <a href="services.php" id="service" >Services</a>
                        <a href="contact.php" id="assistance" >Assistance</a>
                        <?php
                        if(isset($_SESSION['USER_NAME'])){
                            echo '<a href="map_monde.php" id="mappmonde" >Mapmonde</a>';
                        }
                        ?>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i></a>
                    </ul>
                </nav>
            </div>

            <script>
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>



        </div>
    </header>
</div>

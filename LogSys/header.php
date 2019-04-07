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
    <title></title>
</head>


<body>
<div id="bloc_page">
    <header id="headerheader">
        <div class="containerheader">
            <div id="desktop_logo">
						<span id="logoLink">
							<a href="header.php">
								<img id="logo_img-responsive" src="images/airblio4.png" alt="AIRBLIO">
							</a>
						</span>
            </div>


            <!-- Barre de recherche -->
            <div id="colonne2">
                <div id="recherche_p" >

                    <form action="/search" id="searchthis" method="get">
                        <input id="search" name="q" type="text" placeholder="Rechercher" />
                    </form>
                </div>
            </div>

            <div id="login">
                <nav>
                    <?php
                    if(!isset($_SESSION['USER_NAME'])){
                        echo '<a href="signup.php" class="button">Sign Up</a>
                                    <a href="singin.php" class="button">Sign In</a>';
                    }else{
                        echo ' <!--<a href="basket.php" class="button">Basket</a> -->
                                
                                <div class="w3-container">
                                  <div class="w3-bar">
                                        <form class="w3-bar-item" action="includes/logout.inc.php" method="post" >
                                                <button type="submit" name="logout-submit" class="button">Sign out</button>
                                        </form> 
                                          
                                          <div class="w3-dropdown-click" style="margin-top: 12px;">
                                            <button onclick="myFunction()" class="button" style="margin-top: 0">My Account</button>
                                            <div id="myaccount" class="w3-dropdown-content w3-bar-block">
                                              <a href="commands.php" class="w3-bar-item w3-button button">Commands</a>
                                              <a href="demands.php" class="w3-bar-item w3-button button">Demands</a>
                                            </div>
                                          </div>
                                           
                                  </div>
                                </div>
                                <script>
                                    function myFunction() {
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

            <div class="sticky" id="navigation">
                <nav>
                    <ul>
                        <li><a href="index.php" id="acceuil" >Accueil</a></li>
                        <li><a href="catalogue.php" id="produit">Produits</a></li>
                        <li><a href="services.php" id="service" >Services</a></li>
                        <li><a href="#" id="assistance" >Assistance</a></li>
                    </ul>
                </nav>
            </div>



        </div>
    </header>
</div>
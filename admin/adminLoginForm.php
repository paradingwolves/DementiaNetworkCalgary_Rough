<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database using PDO
    $pdo = new PDO('mysql:host=localhost;dbname=jbrierleymedia', 'jbrierley', 'rlhs6rlhs661x6861x68');

    // Prepare and execute the query to retrieve the admin's record
    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
    $stmt->execute(['username' => $username]);

    // Fetch the admin's record from the result set
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        // If the password is correct, set the session variable and redirect to the admin page
        $_SESSION['username'] = $username;
        header('Location: ../updateJsonFile.php');
        exit();
    } else {
        // If the username or password is incorrect, display an error message
        $error_message = 'Invalid username or password';
    }
} else {
    $error_message = '';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Sign In">
    <title>Admin Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../img/logo.png" rel="icon"/>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-DNC-dark">
    <div class="container-fluid"><span></span>
      <a class="navbar-brand" href="../home.php"><img src="../img/logo.png" alt="logo"/></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarColor01">
      
        <ul class="navbar-nav me-auto">
          <li class="nav-item mx-3 mt-3">
            <a id="DLHButton" href="/dementia-lives-here/" target="_blank">
              <span>
                <button id="DLH_Button" class="btn" type="button" >
                  <strong>DEMENTIA<br>
                    LIVES HERE
                  </strong>
                </button></span>
              </span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white  mx-3"  href="about.php" role="button" aria-haspopup="true" aria-expanded="false">About Us ⤸</a>
            <div class="dropdown-menu" id="aboutDropdown">
              <a class="dropdown-item" href="#">Who We are</a>
              <a class="dropdown-item" href="#">What We Do</a>
              <a class="dropdown-item" href="#">Supporters</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Network FAQs</a>
              <a class="dropdown-item" href="#">Why It Matters</a>
              <a class="dropdown-item" href="#">Collective Impact</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Strategy Roadmap</a>
              <a class="dropdown-item" href="#">Outcomes & Capabilities</a>
              <a class="dropdown-item" href="#">Action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Impact</a>
            </div>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="needHelp.php">Need Help?</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="#">Events</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white"  href="resourcesDementia.php" role="button" aria-haspopup="true" >Resources ⤸</a>
            <div class="dropdown-menu" id="resourcesDropdown" >
              <a class="dropdown-item" href="../resourcesDementia.php#News">News</a>
              <a class="dropdown-item" href="../resourcesDementia.php#WhatIsDementia">What is Dementia?</a>
              <a class="dropdown-item" href="../resourcesDementia.php#DementiaResources">Dementia Resources</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../resourcesDementia.php#Map">Map of Services in Calgary</a>
              <a class="dropdown-item" href="../resourcesDementia.php#TranslatedDocs">Translated Documents</a>
              <a class="dropdown-item" href="../resourcesDementia.php#PrintAtHome">Print at Home Tools</a>
            </div>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="../contact.php">Contact Us</a>
          </li>
          <li class="nav-item mx-3 mt-3">
            <a id="missingPersonButton" href="https://missingseniors.ca" target="_blank">
              <span>
                <button id="MP_Button" class="btn text-dark" type="button">
                  <strong>MISSING<br>PERSON?</strong>
                </button>
              </span>
            </a>
          </li>
          
        </ul>
        
      </div>
      
    </div>
  </nav>
  <body>


   <!-- LOGIN FORM -->
   <div class="d-flex justify-content-center my-5">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="p-3 bg-light">
        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control form-control-sm">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control form-control-sm">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>



<?php if (isset($_SESSION['username'])) { ?>
    <p>You are logged in as <?php echo $_SESSION['username']; ?></p>
<?php } ?>





  <footer class="bg-DNC-dark pt-5 pb-4">
    <div class="container text-center text-md-left">
        
        <div class="row text-center text-md-left">
            <div class="col-md-3 col-lg-4 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-white">Contact Information</h5>
                <div class="mb-2"><a class="text-dark" href="https://goo.gl/maps/BRvpU4cRvY6hhDNz5">C/O ALZHEIMER SOCIETY OF CALGARY, 800 7015 MACLEOD TRAIL SW, CALGARY, CANADA</a></div>
                <div class="mb-2"><a class="text-dark" href="tel:+4032900110">403-290-0110 EXT 237</a></div>
                <div class="mb-2"><a class="text-dark" href="mailto:kim@dementianetworkcalgary.ca">kim@dementianetworkcalgary.ca</a></div>
            </div>
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
                <h5 class="text-white font-weight-bold text-uppercase mb-4">Join Our Newsletter!</h5>
                <form class="text-dark" action="#">
                    <label class="form-label"for="fullName">Full Name</label>
                    <input class="form-control mb-2" name="fullName" type="text" placeholder="Full Name"/>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Email Address" class="form-control mb-2">
                    <button type="submit" class="text-dark mt-2 btn  btn-primary btn-dnc-yellow">Subscribe!</button>
                </form>
            </div>
            
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
                <h5 class="text-white font-weight-bold text-uppercase mb-4">Follow Us</h5>
                <p class="text-dark">Don't forget to follow us via our various social media profiles and keep up with the latest scoop about our company.</p>
                <div class="row">
                    <div class="col-3"><a href="https://www.youtube.com/channel/UCxRePk9CUHfEdm-9EdlhvYA" target="_blank"><img src="../img/youtube.svg" alt="Dementia Network Calgary Youtube Page"></a></div>
                    <div class="col-3"><a href="https://twitter.com/DementiaCalgary" target="_blank"><img src="../img/twitter.svg" alt="Dementia Network Calgary Twitter"></a></div>
                    <div class="col-3"><a href="https://www.linkedin.com/company/dementia-network-calgary/?original_referer=" target="_blank"><img src="../img/linkedin.svg" alt="Dementia Network Calgary LinkedIn"></a></div>
                    <div class="col-3"><a href="https://www.facebook.com/DementiaCalgary" target="_blank"><img src="../img/facebook2.svg" alt="Dementia Network Calgary Facebook"></a></div>
                </div>
            </div>
        </div>
    </div>
  </footer>
        <div class="footer-bottom-bg">
            <div id="footer-bottom-inner" class="container"> 
                <div class="row">
                    <div id="copyright" class="col-md-6 pb-5 pt-2">Copyright 2023 ALZHEIMER SOCIETY OF CALGARY - All Rights Reserved
                        <div class="div-tooltip">
                        </div>
                    </div> 
                    <div class="col-md-4"></div>
                    <div class="col-md-1 hover-reveal text-white" style="text-decoration:underline; cursor: pointer;" data-tooltip="Through this website, you are able to link to other websites which are not under the control of Dementia Network Calgary. We have no control over the nature, content and availability of those sites. The inclusion of any links or events does not imply any recommendation or endorsement. The information contained in this website is for general information purposes only. The information is provided by Dementia Network Calgary and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products or services contained on the website for any purpose. Any reliance you place on the information is at your own risk and discretion.">Disclaimer</div>
                </div>
                
                
                    
            </div>
        </div>
        
        <script
            src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="../js/script.js" type="text/javascript"></script>
        <script src="../js/tooltip.js" type="text/javascript"></script>
        <script src="../js/test.js"></script>
    </body>
</html>


<!doctype html>
<html lang="en">
  <head>
  <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    switch ($current_page) {
      case 'home.php':
        $meta_keywords = "Dementia, Network, Alzheimers, Calgary";
        $page_title = "Dementia Network Calgary";
        $page_header = "Home";
      break;
      case 'about.php':
        $meta_keywords = "about, company, history";
        $page_title = "About Us";
        $page_header = "About Us";
      break;
      case 'contact.php':
        $meta_keywords = "contact, email, phone";
        $page_title = "Contact Us";
        $page_header = "Contact Us";
      break;
      case 'resourcesDementia.php':
        $meta_keywords = "Resources, Information, Questions";
        $page_title = "Resources";
        $page_header = "Resources";
      break;
      case 'needHelp.php':
        $meta_keywords = "Help, Dementia, Support";
        $page_title = "Need Help?";
        $page_header = "Need Help?";
      break;
      default:
        $meta_keywords = "Dementia, Network, Alzheimers";
        $page_title = "Dementia Network Calgary";
        $page_header = "Dementia Network Calgary";
        break;
    }
  ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <title><?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-DNC-dark">
    <div class="container-fluid"><span></span>
      <a class="navbar-brand" href="home.php"><img src="img/logo.png" alt="logo"/></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a id="DLHButton" href="/dementia-lives-here/" target="_blank">
        <span>
          <button id="DLH_Button" class="btn" type="button" >
            <strong>DEMENTIA<br>
              LIVES HERE
            </strong>
          </button></span>
        </span>
      </a>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle mx-3" data-bs-toggle="dropdown" href="about.php" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
            <div class="dropdown-menu">
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
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="needHelp.php">Need Help?</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="#">Events</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" href="resourcesDementia.php" role="button" aria-haspopup="true" aria-expanded="false">Resources</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="resourcesDementia.php#News">News</a>
              <a class="dropdown-item" href="resourcesDementia.php#WhatIsDementia">What is Dementia?</a>
              <a class="dropdown-item" href="resourcesDementia.php#DementiaResources">Dementia Resources</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="resourcesDementia.php#Map">Map of Services in Calgary</a>
              <a class="dropdown-item" href="resourcesDementia.php#TranslatedDocs">Translated Documents</a>
              <a class="dropdown-item" href="resourcesDementia.php#PrintAtHome">Print at Home Tools</a>
            </div>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="contact.php">Contact Us</a>
          </li>
          <a id="missingPersonButton" href="https://missingseniors.ca" target="_blank">
            <span>
              <button id="MP_Button" class="btn text-dark" type="button">
                <strong>MISSING<br>PERSON?</strong>
              </button>
            </span>
          </a>
          
        </ul>
        
      </div>
      
    </div>
  </nav>
  <body>
    <div class="container">
    <div class="row mt-2">
        <div class="col-md-2"></div>
       <!--  <div class="col-sm-10 col-md-3 mt-2">
            <h1 class="">

                <span><?php echo $page_header; ?></span>

            </h1>
        </div> -->
        <div class="col-md-3"></div>
        <div class="col-sm-10 col-md-4  my-2">
            <nav class="" aria-label="You are here:"><span class="" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span class="" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="home.php" rel="home">
                        <span itemprop="name">Home

                        </span>
                    </a>
                    <meta itemprop="position" content="1">
                </span>
                <span class="sep sep-1"> » </span>
                <span class="trail-end"><?php echo $page_title; ?></span></span>
            </nav>
        </div>
    </div>
    </div>



    
<?php
      require_once("components/header.php");
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-sm-10 col-md-3 mt-4">
            <h1 class="">

                <span>Resources</span>

            </h1>
        </div>
        <div class="col-md-3"></div>
        <div class="col-sm-10 col-md-4  my-5">
            <nav class="" aria-label="You are here:"><span class="" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span class="" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="home.php" rel="home">
                        <span itemprop="name">Home

                        </span>
                    </a>
                    <meta itemprop="position" content="1">
                </span>
                <span class="sep sep-1"> » </span>
                <span class="trail-end">Resources</span></span>
            </nav>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4 ">
            <h4 class="">On This Page</h4><br>
            <ul>
                <a href="resourcesDementia.php#News">
                    <li class="nav-link mt-3">News</li>
                </a>
                <a href="resourcesDementia.php#WhatIsDementia">
                    <li class="nav-link mt-2">What is Dementia?</li>
                </a>
                <a href="resourcesDementia.php#DementiaResources">
                    <li class="nav-link mt-2">Dementia Resources</li>
                </a>
                <a href="resourcesDementia.php#Map">
                    <li class="nav-link mt-2">Map of Services in Calgary</li>
                </a>
                <a href="resourcesDementia.php#TranslatedDocs">
                    <li class="nav-link mt-2">Translated Documents</li>
                </a>
                <a href="resourcesDementia.php#PrintAtHome">
                    <li class="nav-link mt-2">Print at Home Tools</li>
                </a>
            </ul>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-7">
            <section id="News">
                <h3 class="my-2">News</h3><br>
                <p class="mb-4">The Calgary Parks Foundation is exploring the concept of a 
                    Dementia-Inclusive Park in Calgary.  This would be the 
                    first public dementia park in Canada!  Click <a href="https://www.albertaprimetimes.com/beyond-local/canadas-first-dementia-inclusive-park-coming-to-calgary-6318318">HERE</a> to 
                    read Alberta Prime Time's article.
                </p>
                <div class="row">
                    <div class="col-md-3">
                        <a href="https://www.cbc.ca/news/canada/calgary/dementia-small-scale-family-caregivers-1.6348524" target="_blank">
                            <img src="img/CBC.png" alt="Dementia Network CBC Article" >
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="https://dementianetworkcalgary.ca/wp-content/uploads/2022/03/A-summary-aducanumab-statement.pdf" target="_blank">
                            <img src="img/statementLogo.png" width="75%" alt="Dementia Network Calgary Statement" >
                        </a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </section>
            <section id="WhatIsDementia">
                <h3 class="mt-5 mb-3">What Is Dementia?</h3><br>
                <h6>Looking For Further Information?</h6><br>
                <p>Check out the links below. If you can't find the information you're looking for, send us a message <a href="contact.php">here</a>.</p>
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <h5>Facts About Dementia</h5><br>
                            <a href="https://www.alzheimercalgary.ca/learn/what-you-need-to-know" class="mt-2"  target="_blank">What You Need To Know</a><br>
                            <a href="https://www.alzheimercalgary.ca/learn/what-you-need-to-know" class="mt-2"  target="_blank">Alzheimers Disease vs Dementia</a><br>
                            <a href="https://alzheimer.ca/en/About-dementia/What-is-dementia" class="mt-2"  target="_blank">Facts About Dementia</a><br>
                        </div>
                        <div class="col-md-6 my-3">
                        <h5>Common Myths</h5><br>
                            <a href="https://alzheimer.ca/en/About-dementia/Alzheimer-s-disease/Myth-and-reality-about-Alzheimer-s-disease" class="mt-2"  target="_blank">Broken Link 1</a><br>
                            <a href="https://alzheimer.ca/~/media/Files/national/Core-lit-brochures/Dispelling_Myths_e.pdf" class="mt-2"  target="_blank">Broken Link 2</a><br>
                        </div>
                        <div class="col-md-6 my-3">
                            <h5>FAQS About Dementia</h5><br>
                            <a href="https://www.alzheimercalgary.ca/learn/common-questions" class="mt-2"  target="_blank">Common Questions</a><br>
                            <a href="http://www.alzheimer.ca/en/About-dementia/Alzheimer-s-disease/Common-Questions" class="mt-2"  target="_blank">Broken Link 3</a><br>
                        </div>
                        <div class="col-md-6 my-3">
                            <h5>General Dementia Resources</h5><br>
                            <a href="https://www.alzheimercalgary.ca/" class="mt-2"  target="_blank">Alzheimer Calgary</a><br>
                            <a href="https://www.alzint.org/" class="mt-2"  target="_blank">Alzheimer's Disease International</a><br>
                        </div>
                    </div>
                    <!-- <a class="my-3" href="https://dementianetworkcalgary.ca/wp-content/uploads/2022/06/CommunicatingandEngaginghandout.pdf" target="_blank" >Communicating and Engaging With Someone Who Has Dementia</a><br>
                    <a class="my-3" href="https://dementianetworkcalgary.ca/wp-content/uploads/2022/06/Letmereintroducemyselftoolkit.pdf" target="_blank">Let Me Re-Introduce Myself</a><br> -->   
                </section>
        </div>
    </div>
</div>






<?php
      require_once("components/footer.html");
?>
<?php
//get header but replace the title in the head tags
ob_start();
include('header.php');
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","Home",$buffer);
echo $buffer;



?>
        
<!--CAROUSEL-->
<div class="col-sm-8"> 
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <div class="item active">
      <a href="#"><img class="carousel" src="<?php echo config::IMGCONSTANT; ?>humber.jpg" alt="Flower"></a>
      <div class="carousel-caption">
            <h2 class="blackback right">Welcome to Humberlife</h2>
        </div>
    </div>
    <div class="item">
        <a href="classifieds.php"><img class="carousel" src="<?php echo config::IMGCONSTANT; ?>texts.jpg" alt="Chania"></a>
        <div class="carousel-caption">
            <h2 class="blackback right">Buy/Sell Textbooks</h2>
        </div>
    </div>

    <div class="item">
        <a href="classifieds.php"><img class="carousel" src="<?php echo config::IMGCONSTANT; ?>res.jpg" alt="Chania"></a>
      <div class="carousel-caption">
            <h2 class="blackback right">Post or Find Housing</h2>
        </div>
    </div>

    <div class="item">
        <a href="#"><img class="carousel" src="<?php echo config::IMGCONSTANT; ?>humber.jpg" alt="Flower"></a>
        <div class="carousel-caption">
            <h2 class="blackback right">Buy/Sell Textbooks</h2>
        </div>
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
 <!--END CAROUSEL-->
 
 <!-- BEGIN SIDEBAR -->
 <div class="col-sm-4">

 <div id="sidebar">
     <img class="img-responsive right" src="<?php echo config::IMGCONSTANT; ?>quote.png" alt="">
<!--     <form action="user_login.php" method="post">-->
<!--         <div class="col-sm-6">-->
<!--         <label for="username">Username: </label>-->
<!--        <input type="text" name="username" class="login-form" placeholder="UserName" />-->
<!--        </div>-->
<!--        <div class="col-sm-6">-->
<!--        <label for="password">Password: </label>-->
<!--        <input type="text" name="password" class="login-form" placeholder="********" />-->
<!--        </div>-->
<!--        <input type="submit" name="login" value="Login" class="btn btn-primary" />-->
<!--     </form>-->
 </div>
     <a href="user_login.php"><input type="submit" name="login" value="Login" class="btn btn-primary" /></a>
     <a href="registration.php"><input type="Register" name="Register" value="Register" class="btn btn-primary" /></a>
</div>
 <!-- END SIDEBAR -->
 
 <!-- BEGIN ACTION ITEMS 1 -->
 <div class="clear line">
     <a href="classifieds.php" class="action-item">
         <div class="col-lg-12 center-block">
    <div class="col-sm-3">
              <img src="<?php echo config::IMGCONSTANT; ?>textbook.png" class="home-action img-responsive" alt="" />
      <h2>Buy/Sell Textbooks</h2>
     </div>
         </a>
     <a href="classifieds.php" class="action-item">
    <div class="col-sm-3">
        <img src="<?php echo config::IMGCONSTANT; ?>house.png" class="home-action img-responsive" alt="" />
        <h2>Find/Post Housing</h2>
    </div>
         </a>
     <a href="#" class="action-item">
    <div class="col-sm-3">
        <img src="<?php echo config::IMGCONSTANT; ?>edit.png" class="home-action img-responsive" alt="" />
     <h2>Review a Program or Course</h2>
    </div>
     </a>
         <a href="#" class="action-item">
     <div class="col-sm-3">
         <img src="<?php echo config::IMGCONSTANT; ?>car.png" class="home-action img-responsive" alt="" />
     <h2>Find/Post Free Parking</h2>
    </div>
          </a>
     </div>
</div>
 <!-- END ACTION ITEMS -->
 <!-- BEGIN NEWS SECTION -->
   <div class="clear">
       <h2>| News | <span class="subhead"><a href="news.php">View More...</a></h2>
     <?php
        require_once 'publicClasses/newsPublicClass.php';
        $newsclass=new newsPublicClass();
        $newsclass->getNews();
     ?>
 </div>
 
 <div class="clear">
     <!-- BEGIN CLASSIFIEDS SECTION-->
     <div class="col-sm-6">
         <h2>| Classifieds |<span class="subhead"><a href="classifieds.php">View More...</span></a></h2>
         <h4><a href="classifiedPost.php">Post to Classifieds</a></h4>
        <?php   
             require_once 'publicClasses/classifiedsPublicClass.php';
                $classifiedsClass = new classifiedsPublicClass();
                $classifiedsClass->getAds('all');           
        ?>
     </div>
     
     <!--REVIEWS SECTION-->
      <div class="col-sm-6">
         <h2>| Reviews |<span class="subhead"><a href="#">View More...</span></a></h2>
         <h4>Write a Review</h4>
         <div class="col-sm-4">
         <h3>Humber College does it again!</h3>
         <figure>
         <img class="news-thumb" src="images/again.jpg" alt="" />
         </figure>
         <aside>
         <p>Another record-breaking year for Humber College; 2015 saw the Toronto-based college achieve its highest graduation rates yet with 100% of enrolled students obtaining their degrees this year. "I can't believe it," says now-alumni of Humber's firefighting program Bradley Elliott. "It's truly remarkable that we all graduated, I am just so happy for my classmates and I, and I'm very sure we will all get the jobs we apply for."...<a href="#">Continue reading</a></p>
         </aside>
     </div>
     <div class="col-sm-4">
         <h3>Why Graphic Design Makes Me Want To Off Myself</h3>
         <figure>
         <aside>
         <img class="news-thumb" src="images/graphic.png" alt="" />
         </figure>
         <p>SVG, PNG, JPG, GIF...I could go on and on. I originally enrolled in Humber's graphic design program to learn how to design graphics, but let me tell you, if you're serious about graphic design this is NOT the program for you. CORPORATE design is more like it. All semester I designed nothing but logos and brochures and my creative skills went totally out the window...<a href="#">Continue reading</a></p>
         </aside>
     </div>
     <div class="col-sm-4">
         <h3>The Safety of the Humber River Valley: Questionable at Best</h3>
         <figure>
         <img class="news-thumb" src="images/deer.jpg" alt="" />
         </figure>
         <aside>
         <p>I had just recently read about the four students who were massacred by a rabid deer in the river valley, when I was walking through the same spot to get to my illegally parked car. Humber really needs to put some of those safe zone blue things down there so you can alert someone when you're in trouble. I am so scared walking through there at night. 2/10 for safety Humber...<a href="#">Continue reading</a> </p>
         </aside>
     </div>
     </div>
    <?php include 'footer.php' ?>

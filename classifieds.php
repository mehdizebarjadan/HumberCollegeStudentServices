<?php
    $newtitle = 'Classifieds';
        //get header but replace the title in the head tags
        ob_start();
        include('header.php');
        $buffer=ob_get_contents();
        ob_end_clean();
        $buffer=str_replace("%TITLE%",$newtitle,$buffer);
        echo $buffer;
    require_once 'publicClasses/classifiedsPublicClass.php';
    $e = new classifiedsPublicClass();
    //$e->getAds('textbooks');
?>
<div class="col-md-12">
    <h1>Classifieds</h1>
    <form method="post" name="categoryFilter" action="filterClassifieds.php">
         <a href="classifiedPost.php">Post to Classifieds</a> | Filter by: 
        <select name="category">
        <option value="textbooks" selected>Textbooks</option>
        <option value="housing">Housing</option>
        <option value="cars">Cars</option>
        <option value="bikes">Bikes</option>
    </select>
        <input type="submit" name="filter" value="Filter">
    </form>
</div>

<div class="col-md-6">
    <h2>Textbooks<?php $e->postCount('textbooks'); ?></h2>
    <?php $e->getAds('textbooks'); ?>
</div>

<div class="col-md-6">
    <h2>Housing<?php $e->postCount('housing'); ?></h2>
    <?php $e->getAds('housing'); ?>
</div>

<div class="col-md-6">
    <h2>Cars<?php $e->postCount('cars'); ?></h2>
    <?php $e->getAds('cars'); ?>
</div>

<div class="col-md-6">
    <h2>Bikes<?php $e->postCount('bikes'); ?></h2>
    <?php $e->getAds('bikes'); ?>
</div>

<?php include 'footer.php';
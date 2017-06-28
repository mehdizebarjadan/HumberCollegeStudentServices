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
    ?>

<div class="col-md-12">
    <h1>Classifieds</h1>
    <form method="post" name="categoryFilter" action="filterClassifieds.php">
        <a href="classifiedPost.php">Post to Classifieds</a> | <a href="classifieds.php">All Classifieds</a> | Filter by: 
        <select name="category">
        <option value="textbooks" selected>Textbooks</option>
        <option value="housing">Housing</option>
        <option value="cars">Cars</option>
        <option value="bikes">Bikes</option>
    </select>
        <input type="submit" name="filter" value="Filter">
    </form>
</div>
    <?php $e->filterClassifieds(); ?>
<?php    include 'footer.php';
?>

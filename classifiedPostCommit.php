<?php 

include 'header.php';

//instance of classified insert function
require_once 'publicClasses/classifiedsPublicClass.php';
$e = new classifiedsPublicClass();
$e ->postAd();

include 'footer.php'?>
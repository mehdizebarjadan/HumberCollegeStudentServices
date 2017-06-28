<?php
require 'model/database.php';
require 'model/event.php';
require 'model/event_db.php';
include 'validation/validation.php';
include 'validation/validation_field.php';
include 'validation/validation_fields.php';
require 'header.php';
?>
<div class="container clearfix">

    <section>
        <h1>Events</h1>
        <?php
        $events = EventDB::getEvents();

        foreach ($events as $item):?>
            <div class="contact-wrapper">
                <div>
                    <img src="uploads/event/<?php echo $item->getImage(); ?>" alt="<?php echo $item->getTitle(); ?>"/>
                </div>
                <div><h2><?php echo $item->getTitle(); ?></h2></div>
                <div><span class="date">Posting Date: <?php echo $item->getDate();?></span></div>
                <div>Address:<?php echo $item->getLocation();?></div>
                <div><span class=""><?php echo $item->getDescription();?></span></div>
                <br/><br/>

            </div>

        <?php endforeach; ?>

    </section>
</div>

<?php
require 'footer.php';
?>
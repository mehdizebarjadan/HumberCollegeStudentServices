<?php
//include "adminHeader.php";
//include 'adminNav.php';
//
//require '../model/database.php';
//require '../model/event.php';
//require '../model/event_db.php';
//
//if(isset($_POST['event_id'])){
//    $event_id = $_POST['event_id'];
//    EventDB::deleteEvent($event_id);
//    header("Location: event.php");
//}
//?>
<!---->
<!---->
<!--<div id="main">-->
<!--    <article class="placeholder">-->
<!--        <h4>Events</h4>-->
<!--        <a href="eventAdd.php" class="btn btn-primary">Add Event</a>-->
<!--    </article>-->
<!--    <br/>-->
<!---->
<!---->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-heading">List Of Events</div>-->
<!--        <table class="table">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Title</th>-->
<!--                <th>Address</th>-->
<!--                <th>Date</th>-->
<!--                <th>Edit</th>-->
<!--                <th>Delete</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            --><?php
//            $events = EventDB::getEvents();
//            foreach ($events as $item):
//                ?>
<!--                <tr>-->
<!--                    <td>--><?php //echo $item->getTitle(); ?><!--</td>-->
<!--                    <td>--><?php //echo $item->getLocation(); ?><!--</td>-->
<!--                    <td>--><?php //echo $item->getDate(); ?><!--</td>-->
<!--                    <td>-->
<!--                        <a class="btn btn-link" href="eventUpdate.php?id=--><?php //echo $item->getID(); ?><!--">-->
<!--                            <button type="submit" value="update">Update</button>-->
<!--                        </a>-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <form action="event.php" method="post">-->
<!--                            <input type="hidden" name="event_id" value="--><?php //echo $item->getID(); ?><!--"/>-->
<!--                            <button class="btn btn-link" type="submit" value="Delete">Delete</button>-->
<!--                        </form>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            --><?php //endforeach; ?>
<!--            </tbody>-->
<!--        </table>-->
<!---->
<!---->
<!--    </div>-->
<!--    --><?php //include "adminFooter.php";
//    ?>
<!---->

<?php

class EventDB
{

    public static function getEvents()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM event';
        $result = $db->query($query);
        $events = array();
        foreach ($result as $row) {
            $event = new event($row['title'],$row['location'], $row['description'], $row['event_date'], $row['image']);
            $event->setID($row['id']);
            $events[] = $event;
        }
        return $events;
    }


    public static function getEventByID($event_id)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM event WHERE id = $event_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $event = new event($row['title'],$row['location'], $row['description'], $row['event_date'], $row['image']);
        $event->setID($row['id']);
        return $event;
    }

    public static function addEvent($event)
    {
        $db = Database::getDB();
        $title = $event->getTitle();
        $location = $event->getLocation();
        $Description = $event->getDescription();
        $date = $event->getDate();
        $image = $event->getImage();
        $query = "INSERT INTO event (title, location, description, event_date, image) VALUES ('$title','$location', '$Description', '$date','$image' )";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function updateEvent($event, $event_id)
    {
        $db = Database::getDB();
        $title = $event->getTitle();
        $location = $event->getLocation();
        $Description = $event->getDescription();
        $date = $event->getDate();
        $image = $event->getImage();
        $query = "UPDATE event SET title = '$title',
                 location = '$location',
                 description = '$Description',
                 event_date = '$date',
                 image = '$image'
                 WHERE id = $event_id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function deleteEvent($event_id)
    {
        $db = Database::getDB();
        $query = "DELETE FROM event WHERE id = $event_id";
        $row_count = $db->exec($query);
        return $row_count;
    }
}


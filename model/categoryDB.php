<?php
class CategoryDB {
    public static function getCategories() {
        $db = Database::getDB();
        $query = 'SELECT * FROM category
                  ORDER BY id';
        $result = $db->query($query);
        $categories = array();
        foreach ($result as $row) {
            $category = new Category($row['id'],
                $row['title']);
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getCategory($category_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM category
                  WHERE id = '$category_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $category = new Category($row['id'],
            $row['title']);
        return $category;
    }
}
?>
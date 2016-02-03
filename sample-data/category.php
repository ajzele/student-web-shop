<?php

/**
 * @todo Study uniqid() function
 */

for ($i=1; $i<=10; $i++) {
    $stmt = $DB->prepare("INSERT INTO category (active, name, description, url_key) VALUES (:active, :name, :description, :url_key)");

    $active = true;
    $name = 'Category_'.$i;
    $description = 'Just some description_'.$i;
    $urlKey = 'the-'.md5(uniqid().rand(1,100)).'-category';


    $stmt->bindParam(':active', $active);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':url_key', $urlKey);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
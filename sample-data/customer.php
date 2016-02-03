<?php

for ($i=1; $i<=10; $i++) {
    $stmt = $DB->prepare("INSERT INTO customer (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");

    $firstname = 'John_'.$i;
    $lastname = 'Doe_'.$i;
    $email = sprintf('john_%s.doe_%s@gmail.com', $i, $i);
    $password = md5('password'.$i);

    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
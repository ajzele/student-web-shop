<?php

require_once dirname(__FILE__) . '/../lib/countries-iso2.php';

// Get ISO2 countries
$_countries = getCountries();
$countries = array_keys($_countries);

// Fetch current category IDs
$customerIds = array();
$stmt = $DB->query('SELECT entity_id FROM customer');
$_customerIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($_customerIds as $_customerId) {
    $customerIds[] = $_customerId['entity_id'];
}

// Create sample products
for ($i=1; $i<=50; $i++) {
    $stmt = $DB->prepare("INSERT INTO customer_address (
          customer_entity_id,
          firstname,
          lastname,
          phone,
          street_1,
          city,
          postcode,
          country
      )
      VALUES (
          :customer_entity_id,
          :firstname,
          :lastname,
          :phone,
          :street_1,
          :city,
          :postcode,
          :country
      )");

    $customerEntityId = $customerIds[array_rand($customerIds)];
    $firstname = 'AddrFname_'.$i;
    $lastname = 'AddrLastname_'.$i;
    $phone = 'AddrPhone_'.$i;
    $street1 = 'AddrStreet1_'.$i;
    $city = 'AddrCity_'.$i;
    $postcode = 'AddrPostcode_'.$i;
    $country = $countries[rand(0, count($countries)-1)];

    $stmt->bindParam(':customer_entity_id', $customerEntityId);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':street_1', $street1);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':postcode', $postcode);
    $stmt->bindParam(':country', $country);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
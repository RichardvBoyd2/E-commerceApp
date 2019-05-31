<?php

require_once '../../Autoloader.php';

$searchPhrase = $_POST['product'];

$bs = new ProductBusinessService();

$products = $bs->findByProductName($searchPhrase);

?>

<h2>Search Results</h2>

<?php 

if ($products) {
    include '_displayProductSearchResults.php';
} else {
    echo "We couldn't find anything with that name.";
}

?>
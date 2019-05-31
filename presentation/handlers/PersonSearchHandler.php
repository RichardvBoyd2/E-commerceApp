<?php

require_once '../../Autoloader.php';

$searchPhrase = $_POST['name'];

$bs = new UserBusinessService();

$persons = $bs->findByFirstNameWithAddress($searchPhrase);

?>

<h2>Search Results</h2>

<?php 

if ($persons != null) {
    include '_displayPeopleSearchResults.php';
} else {
    echo "We couldn't find anyone with that name.";
}

?>
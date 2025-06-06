<?php
require_once '../app/core/Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    echo "Konekcija uspešna!";
} else {
    echo "Neuspešna konekcija.";
}
?>

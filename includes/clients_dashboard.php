
<?php

require_once 'db_handeler.php';


$stmt =   $pdo->prepare('SELECT * FROM clients');
$stmt->execute();
$clients = $stmt->fetchAll();


echo '<h1>Cliens Dashboard</h1>';
echo '<table border="1">';
echo '<tr><th>ID</th><th>Full Name</th><th>Email</th><th>phone</th><th>address</th><th>owner</th></tr>';

foreach ($clients as $client) {
    echo '<tr>';
    echo '<td>'. $client['id']. '</td>';
    echo '<td>'. $client['full_name']. '</td>';
    echo '<td>'. $client['email']. '</td>';
    echo '<td>'. $client['phone']. '</td>';
    echo '<td>'. $client['c_address']. '</td>';
    echo '<td>'. $client['ownershp']. '</td>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
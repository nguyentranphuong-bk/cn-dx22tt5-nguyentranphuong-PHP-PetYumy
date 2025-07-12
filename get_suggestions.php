<?php
$type = $_GET['type'];
$conn = new mysqli('localhost', 'root', '', 'thongtinsanpham');

if ($conn->connect_error) die("Connection failed");

$range = $type === 'dog' ? [17, 32] : [33, 40];
$sql = "SELECT id, name, image FROM pet_food_products 
        WHERE id BETWEEN {$range[0]} AND {$range[1]} 
        ORDER BY RAND() LIMIT 3";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
?>

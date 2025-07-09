<?php
session_start();

$id = $_POST['id'] ?? 0;
$action = $_POST['action'] ?? '';

if (!isset($_SESSION['cart'][$id])) {
  exit();
}

switch ($action) {
  case 'increase':
    $_SESSION['cart'][$id]['quantity'] += 1;
    break;
  case 'decrease':
    $_SESSION['cart'][$id]['quantity'] -= 1;
    if ($_SESSION['cart'][$id]['quantity'] <= 0) {
      unset($_SESSION['cart'][$id]);
    }
    break;
    case 'remove':
  if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
  }
  break;

}

echo 'OK';
 
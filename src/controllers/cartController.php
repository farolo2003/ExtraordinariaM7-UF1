<?php
require 'src/render.php';

if (isset($_SESSION['cart'])) {
    echo render('cart', ['cart' => $_SESSION['cart']]);
} else {
    echo render('cart', ['cart' => []]);
}

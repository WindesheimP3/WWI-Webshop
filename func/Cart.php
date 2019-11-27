<?php
function AddToCart ($StockItemID, $Quantity = 1){
    $item = array($StockItemID => $Quantity);
    if (isset ($_SESSION['cart'])){
        // array_push($_SESSION['cart'], $item);
        if(array_key_exists($StockItemID, $_SESSION['cart'])){
            $_SESSION['cart'][$StockItemID] += $Quantity;
        } else {
            $_SESSION['cart'][$StockItemID] = $Quantity;
        }
    } else {
        $_SESSION['cart'] = $item;
    }
    return $_SESSION;
}

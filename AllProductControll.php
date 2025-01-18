<?php

include_once 'DBProduct.php';
include_once 'AllProductEntity.php';

class ProductControll
{
    private $products = [];
    private $errorMessage;
    private $succedMessage;

    public function __construct()
    {
        $this->products = [];
        $this->errorMessage = "";
        $this->succedMessage = "";
    }
    public function loadPurchase()
    {
        $productDBHandler = new DBProduct();
        $this->products = $productDBHandler->getAllProducts();
    }
    public function handlePurchase()
    {
        if (isset($_POST['butNowBtn'])) {
            $productId = $_POST['productId'];

            $productDBHandler = new DBProduct();
            $product = $productDBHandler->getProductById($productId);

            if ($product) {
                $this->succedMessage = "Product purchased successfuly";
            } else {
                $this->errorMessage = "Product not found";
            }
        }
    }

    public function getProducts()
    {
        return $this->products;
    }
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
    public function getSuccessMessage()
    {
        return $this->succedMessage;
    }
}

?>
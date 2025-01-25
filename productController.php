<?php
include_once 'AllProductRepository.php';

class ProductController
{
    private $errorMessage;
    private $succedMessage;

    public function __construct()
    {
        $this->errorMessage = "";
        $this->succedMessage = "";
    }
    public function getAllProds()
    {
        $repo = new AllProductRepository();
        return $repo->getAllProducts();
    }
    public function addProduct($name, $description, $price, $image)
    {
        $repo = new AllProductRepository();

        if (empty($name) || empty($description) || empty($price)) {
            $this->errorMessage = "All fields are required.";
            return;
        }

        if (!is_numeric($price) || $price <= 0) {
            $this->errorMessage = "Price must be a positive number.";
            return;
        }

        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/images/';
            $fileName = basename($image['name']);
            $uploadPath = $uploadDir . $fileName;

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
                $repo->addProductToDatabase($name, $description, $price, $uploadPath);
                $this->succedMessage = "Product added successfully.";
            } else {
                $this->errorMessage = "Failed to upload the image.";
            }
        } else {
            $this->errorMessage = "Invalid image file.";
        }
    }
    public function deleteProduct($id)
    {
        $repo = new AllProductRepository();

        if (empty($id) || !is_numeric($id)) {
            $this->errorMessage = "Invalid product ID.";
            return;
        }

        $deleted = $repo->deleteProductById($id);

        if ($deleted) {
            $this->succedMessage = "Product deleted successfully.";
        } else {
            $this->errorMessage = "Failed to delete the product.";
        }
    }
    public function editProduct($id, $name, $description, $price, $newImage = null)
    {
        $repo = new AllProductRepository();

        if (empty($name) || empty($description) || empty($price)) {
            $this->errorMessage = "All fields are required.";
            return;
        }

        if (!is_numeric($price) || $price <= 0) {
            $this->errorMessage = "Price must be a positive number.";
            return;
        }

        $existingProduct = $repo->getProductById($id);
        if (!$existingProduct) {
            $this->errorMessage = "Product not found.";
            return;
        }

        $imagePath = $existingProduct['image'];

        if ($newImage && $newImage['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/images/';
            $fileName = basename($newImage['name']);
            $uploadPath = $uploadDir . $fileName;

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            if (move_uploaded_file($newImage['tmp_name'], $uploadPath)) {
                $imagePath = $uploadPath;
            } else {
                $this->errorMessage = "Failed to upload the new image.";
                return;
            }
        }

        $updated = $repo->updateProduct($id, $name, $description, $price, $imagePath);

        if ($updated) {
            $this->succedMessage = "Product updated successfully.";
        } else {
            $this->errorMessage = "Failed to update the product.";
        }
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function getSuccedMessage()
    {
        return $this->succedMessage;
    }
}
?>
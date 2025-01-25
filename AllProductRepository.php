<?php

use Dba\Connection;

include_once('DbConnection.php');

class AllProductRepository
{
    private $connection;
    private $table = 'products';

    function __construct()
    {
        $conn = new DBConnection;
        $this->connection = $conn->startConn();
    }

    public function getAllProducts()
    {
        $query = "Select * FROM " . $this->table;
        $results = $this->connection->query($query);
        $prods = [];

        while ($row = $results->fetch_assoc()) {
            $prods[] = $row;
        }
        return $prods;
    }
    public function addProductToDatabase($name, $description, $price, $imagePath)
    {
        $query = "INSERT INTO " . $this->table . " (name, description, price, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssds", $name, $description, $price, $imagePath);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteProductById($id)
    {
        $query = "SELECT image FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if ($product) {
            if (file_exists($product['image'])) {
                unlink($product['image']);
            }
        }
        $stmt->close();

        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows > 0;
    }
    public function updateProduct($id, $name, $description, $price, $imagePath)
    {
        $query = "UPDATE " . $this->table . " 
                  SET name = ?, description = ?, price = ?, image = ? 
                  WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssdsi", $name, $description, $price, $imagePath, $id);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows > 0;
    }
    public function getProductById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();

        return $product;
    }
}

?>
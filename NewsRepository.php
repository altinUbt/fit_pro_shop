<?php

use Dba\Connection;

include_once('DbConnection.php');

class NewsRepository
{
    private $connection;
    private $table = 'news';

    function __construct()
    {
        $conn = new DBConnection;
        $this->connection = $conn->startConn();
    }

    public function getAllNews()
    {
        $query = "Select * FROM " . $this->table;
        $results = $this->connection->query($query);
        $news = [];

        while ($row = $results->fetch_assoc()) {
            $news[] = $row;
        }
        return $news;
    }
    public function addNewsToDatabase($name, $description, $imagePath)
    {
        $query = "INSERT INTO " . $this->table . " (name, description, image) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sss", $name, $description, $imagePath);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteNewsById($id)
    {
        $query = "SELECT image FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $news = $result->fetch_assoc();

        if ($news) {
            if (file_exists($news['image'])) {
                unlink($news['image']);
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
    public function updateNews($id, $name, $description, $imagePath)
    {
        $query = "UPDATE " . $this->table . " 
                  SET name = ?, description = ?, image = ? 
                  WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssss", $name, $description, $imagePath, $id);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows > 0;
    }
    public function getNewsById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $news = $result->fetch_assoc();
        $stmt->close();

        return $news;
    }
}

?>
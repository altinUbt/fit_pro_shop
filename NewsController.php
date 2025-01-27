<?php
include_once 'NewsRepository.php';
include_once 'DBNews.php';

class NewsController
{
    private $news = [];
    private $errorMessage;
    private $succedMessage;

    public function __construct()
    {
        $this->news = [];
        $this->errorMessage = "";
        $this->succedMessage = "";
    }



    public function getAllNews()
    {
        $repo = new NewsRepository();
        return $repo->getAllNews();
    }
    public function addNews($name, $description, $image)
    {
        $repo = new NewsRepository();

        if (empty($name) || empty($description)) {
            $this->errorMessage = "All fields are required.";
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
                $repo->addNewsToDatabase($name, $description, $uploadPath);
                $this->succedMessage = "News added successfully.";
            } else {
                $this->errorMessage = "Failed to upload the image.";
            }
        } else {
            $this->errorMessage = "Invalid image file.";
        }
    }
    public function deleteNews($id)
    {
        $repo = new NewsRepository();

        if (empty($id) || !is_numeric($id)) {
            $this->errorMessage = "Invalid news ID.";
            return;
        }

        $deleted = $repo->deleteNewsById($id);

        if ($deleted) {
            $this->succedMessage = "News deleted successfully.";
        } else {
            $this->errorMessage = "Failed to delete the news.";
        }
    }
    public function editNews($id, $name, $description, $newImage = null)
    {
        $repo = new NewsRepository();

        if (empty($name) || empty($description)) {
            $this->errorMessage = "All fields are required.";
            return;
        }


        $existingNews = $repo->getNewsById($id);
        if (!$existingNews) {
            $this->errorMessage = "News not found.";
            return;
        }

        $imagePath = $existingNews['image'];

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

        $updated = $repo->updateNews($id, $name, $description,  $imagePath);

        if ($updated) {
            $this->succedMessage = "News updated successfully.";
        } else {
            $this->errorMessage = "Failed to update the news.";
        }
    }
    public function getNews()
    {
        return $this->news;
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
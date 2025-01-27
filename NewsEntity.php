<?php

class NewsEntity
{
    private $id;
    private $name;
    private $description;
    private $category_id;
    private $image;

    function __construct($id, $name, $description, $category_id, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category_id = $category_id;
        $this->image = $image;

    }
    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
    function getDescription()
    {
        return $this->description;
    }

    function getCategory_id()
    {
        return $this->category_id;
    }
    function getImage()
    {
        return $this->image;
    }

    function __tostring()
    {
        return "Product: " . $this->name . " helps with " . $this->description;
    }
}


?>
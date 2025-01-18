<?php

class ProductEntity
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $category_id;

    function __construct($id, $name, $description, $image, $category_id, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->category_id = $category_id;
        $this->price = $price;
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

    function getImage()
    {
        return $this->image;
    }
    function getCategory_id()
    {
        return $this->category_id;
    }
    function getPrice()
    {
        return $this->price;
    }
    function __tostring()
    {
        return "Product: " . $this->name . " costs " . $this->price . " and helps with " . $this->description;
    }
}


?>
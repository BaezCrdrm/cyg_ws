<?php
class Item
{
    public $id;
    public $originalTitle;
    public $itemCategory;
    public $year;
    public $info;
}

class Movie extends Item
{
    public $movieCategory;
    
    function __construct($_id, $_title, $_cat, $_year, $_url)
    {
        if(isset($_id)) {
            $this->id = $_id;
        } else {
            $this->id = null;
        }

        $this->originalTitle = $_title;
        $this->movieCategory = new Category($_cat, '');
        $this->year = $_year;
        $this->info = $_url;

        $this->itemCategory = 1;
    }
}

class Category
{
    public $id;
    public $name;

    function __construct($_id, $_name)
    {
        $this->id = $_id;
        $this->_name = $_name;
    }
}

class Lang
{
    public $id;
    public $name;
    public $abv;
}

class Titles
{
    public $id;
    public $lang;
    public $title;
}
?>
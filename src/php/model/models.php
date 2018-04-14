<?php
class Item
{
    public $id;
    public $originalTitle;
    public $itemCategory;
    public $year;
    public $info;

    function _shared_construct($_id, $_title, $_year, $_url)
    {
        if(isset($_id)) {
            $this->id = $_id;
        } else {
            $this->id = null;
        }

        $this->originalTitle = $_title;
        $this->year = $_year;
        $this->info = $_url;
    }
}

class Audiovisual extends Item
{
    function _ad_shared_construct($_id, $_item_cat, $_title, $_year, $_url)
    {
        $this->itemCategory = $_item_cat;
        $this->_shared_construct($_id, $_title, $_year, $_url);
    }
}

class Movie extends Audiovisual
{
    public $movieCategory;
    
    function __construct($_id, $_title, $_aud_cat, $_year, $_url)
    {
        $this->_ad_shared_construct($_id, 1, $_title, $_year, $_url);
        $this->movieCategory = $_aud_cat;
    }
}

class TVShow extends Audiovisual
{
    public $showCategory;
    
    function __construct($_id, $_title, $_aud_cat, $_year, $_url)
    {
        $this->_ad_shared_construct($_id, 2, $_title, $_year, $_url);
        $this->showCategory = $_aud_cat;
    }
}

class Song extends Item
{
    public $artist;
    public $album;

    function __construct($_id, $_title, $_year, $_url, $_artist, $_album)
    {
        $this->itemCategory = 3;
        $this->_shared_construct($_id, $_title, $_year, $_url);
        $this->artist = $_artist;
        $this->album = $_album;
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

    function __construct($_id, $_lang, $_title)
    {
        $this->id = $_id;
        $this->lang = $_lang;
        $this->title = $_title;
    }
}
?>
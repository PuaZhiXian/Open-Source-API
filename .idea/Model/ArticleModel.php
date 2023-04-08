<?php

class ArticleModel
{
    public $id;
    public $title;
    public $description;
    public $image;
    public $dataSource;
    public $category;
    public $url;
    public $date;

    /**
     * @param $id
     * @param $title
     * @param $description
     * @param $image
     * @param $dataSource
     * @param $category
     * @param $url
     * @param $date
     */
    public function __construct($id, $title, $description, $image, $dataSource, $category, $url, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->dataSource = $dataSource;
        $this->category = $category;
        $this->url = $url;
        $this->date = $date;
    }

}
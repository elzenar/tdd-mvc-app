<?php

namespace Models;

class Category extends AbstractModel
{

    public $name;

    public function save()
    {

    }

    public function listAll()
    {

    }

    public function load($categoryId) {
        return new Category();
    }

}
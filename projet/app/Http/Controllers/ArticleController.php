<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(){
        Article::create([  
            "title"=> "creer un application mobile",
            "description"=>"lorem*3",
            "category_id"=> 2,
            "image"=> "image_2.png",
          ]);
          return "Article cree avec succes";
    }     
}

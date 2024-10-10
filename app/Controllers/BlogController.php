<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Post;
 
class BlogController extends controller{
    public function welcome(){
        
        return $this->view('blog.welcome');
    }
    
    public function index(){

        $post = new Post($this->getDB());
        $posts = $post->all();
        return $this->view('blog.index', compact('posts'));//blog le nom du dossier, index le nom du fichier et view le nom de la fonction
    }
    
    public function show(int $id){

        $post = new Post($this->getDB());
        $post = $post->findById($id);
       
      
        return $this->view('blog.show', compact('post')); //blog le nom du dossier, index le nom du fichier et view le nom de la fonction

    }
    public function tag(int $id){

     $tag = (new Tag($this->getDB()))->findById($id);
     
     return $this->view('blog.tag', compact('tag'));

    }

}
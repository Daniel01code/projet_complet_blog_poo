<?php

namespace App\Models;
use DateTime;

class Post extends Model {

    protected $table = 'posts';

    public function getCreatedAt(): string{

        return ($date = new DateTime($this->created_at))->format('d/m/y à H:m');
         
    }
    public function getExerpt(){
        return (substr ($this->content, 0, 150 ) . '...');
    }
    public function getButton(): string{

        return <<<HTML
        <a class="btn btn-primary" href="http://localhost/projet_complet_blog_poo/posts/$this->id" class="btn btn-primary">lire la suite</a>
HTML;
    }
    public function getTags(){

        return $this->query("SELECT tags.* FROM tags 
        INNER JOIN post_tag  ON post_tag.tag_id = tags.id
        INNER JOIN posts  ON post_tag.post_id = posts.id
        WHERE posts.id= ?", $this->id);
    } 
}
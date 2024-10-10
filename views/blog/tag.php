<h1> <?= $params['tag']->name ?> </h1>

<?php foreach($params['tag']->getPost() as $post): ?>

    <div class="card mb-3">

        <div class="card-body">
            <a href="http://localhost/projet_complet_blog_poo/posts/<?= $post->id ?>"><?= $post->title ?></a>
        </div>
        
    </div>

<?php endforeach ?> 
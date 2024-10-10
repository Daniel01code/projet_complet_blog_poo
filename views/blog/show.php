<h1>titre de l'article: <?=$params['post']->title ?></h1>
<div>
    <?php foreach($params['post']->getTags() as $tag ) : ?>
                
        <span class="badge bg-info"><?= $tag->name ?> </span>

    <?php endforeach ?>
</div>

<p> <?= $params['post']->content ?> </p>

<a href="http://localhost/projet_complet_blog_poo/posts" class="btn btn-secondary">retour</a> 


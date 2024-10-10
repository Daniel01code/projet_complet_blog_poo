<h1>les dernier article</h1>
<?php foreach($params['posts'] as $post): ?>

<div class="card mb-3">

    <div class="card-body">
        <h2> <?= $post->title ?></h2>
        <div>
            <?php foreach($post->getTags() as $tag ) : ?>
                
                <span class="badge bg-success"><a href="http://localhost/projet_complet_blog_poo/tags/<?= $tag->id ?>" class="text-black"> <?= $tag->name ?></a></span>

            <?php endforeach ?>
        </div>
        <small class="text-info">publié le <?= $post->getCreatedAt(); ?></small>
        <p><?= $post->getExerpt(); ?></p> <!--  fonction qui renvoit une parti du contenu de l'article -->
        <?=$post->getButton();?>
    </div>
    
</div>

<?php endforeach ?> 
<?= $renderer->render('header', ['title' => $slug]) //Include header  ?>

<h1>
    Bienvenue sur l'article <?= $slug ?>
</h1>


<?= $renderer->render('footer')//Include footer  ?>

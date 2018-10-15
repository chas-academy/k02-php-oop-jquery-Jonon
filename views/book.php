<?php
    /* echo '<pre>';
        print_r($this->request->getPath());
    echo '</pre>';
    echo '<pre>';
        print_r($params);
    echo '</pre>'; */
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="http://placehold.it/356x258" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Titel: <?php echo $book->getTitle()?></p>
                    <p class="card-text">Författare: <?php echo $book->getAuthor()?></p>
                    <p class="card-text">Pris: $<?php echo $book->getPrice()?></p>
                    <p class="card-text">I lager: <?php echo $book->getStock()?></p>
                </div>
            </div>
        </div>
    </div>
</div>
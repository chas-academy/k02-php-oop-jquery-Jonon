<?php
    $isMyBooks = $this->request->getPath() === '/my-books' ? true : false;
?>

<div class="container">
    <div class="row">
        <?php foreach ($books as $book) : ?>
            <?php if (isset($books)) : ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="http://placehold.it/356x258" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Titel: <?php echo $book->getTitle()?></p>
                    <p class="card-text">Författare: <?php echo $book->getAuthor()?></p>
                    <p class="card-text">Pris: $<?php echo $book->getPrice()?></p>
                    <p class="card-text">I lager: <?php echo $book->getStock()?></p>
                    <?php
                    if ($isMyBooks) {
                        $btn = '<a href="/book/' . $book->getId() .'/return" class="btn btn-lg btn-block btn-info">Lämna tillbaka bok</a>';
                    } else {
                        $btn = '<a href="/book/' . $book->getId() .'/borrow" class="btn btn-lg btn-block btn-success">Låna bok</a>';
                    }
                    echo $btn;
                    ?>
                </div>
            </div>
        </div>
            <?php else : ?>
                <p>Inga böcker hittades... försök igen senare</p>
            <?php endif ?>
        <?php endforeach ?>   
    </div>
</div>
<div class="container">
    <form class="form-row d-flex justify-content-center mt-3">
        <div class="row col-auto">
            <div class="form-group mb-2 col-auto">
                <input type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <div class="col-auto form-group">
                <button type="submit" class="btn btn--primary mb-2 form-control ">Search</button>
            </div>
        </div> 
    </form>
    <div class="row mt-2">
    <?php foreach ($users as $user) :?>
        <div class="col-sm-4">
            <a class="disable-a" href="/profile/<?php echo $user->getUsername()?>">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/100/?random" alt="Card image cap">
                    <img class="d-flex ml-3 rounded-circle profile--medium mt-1-invert" src="https://api.adorable.io/avatars/285/jons.png" alt="Generic placeholder image">
                    <div class="card-block card-block-height">
                        <h4 class="card-title"><?php echo $user->getName()?></h4>
                        <h6 class="card-title"><?php echo '@' . $user->getUsername()?></h6>
                        <p class="card-text"><?php echo $user->getDescription()?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>



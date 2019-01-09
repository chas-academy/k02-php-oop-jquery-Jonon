<div class="container">
    <!-- Go back to profile -->
    <a href="/profile/<?php echo $user->getUsername();?>" class="d-flex align-self-center mt-2 w5-1r text-lighter-grey return-button">
        <i class="feather f-arrow-left" data-feather="arrow-left"></i>
        <span>Go back</span>
    </a>
    <div class="row mt-2">
    <?php foreach ($following as $follows) :?>
        <div class="col-sm-4">
            <a class="disable-a" href="/profile/<?php echo $follows->getUsername()?>">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/100/?random" alt="Card image cap">
                    <img class="d-flex ml-3 rounded-circle profile--medium mt-1-invert" src="https://api.adorable.io/avatars/285/jons.png" alt="Generic placeholder image">
                    <div class="card-block card-block-height">
                        <h4 class="card-title"><?php echo $follows->getName()?></h4>
                        <h6 class="card-title"><?php echo '@' . $follows->getUsername()?></h6>
                        <p class="card-text"><?php echo $follows->getDescription()?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>
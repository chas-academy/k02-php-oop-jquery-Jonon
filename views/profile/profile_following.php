<div class="container">
    <!-- Go back to profile -->
    <a href="/profile/<?php echo $user->getUsername();?>" class="d-flex align-self-center mt-2 w5-1r text-lighter-grey return-button">
        <i class="feather f-arrow-left" data-feather="arrow-left"></i>
        <span>Go back</span>
    </a>
    <div class="row mt-2">
    <?php foreach ($following as $follows) :?>
        <div class="col-sm-4 d-none d-sm-block">
            <a class="disable-a" href="/profile/<?php echo $follows->getUsername()?>">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/100/?random" alt="Card image cap">
                    <img class="d-flex ml-3 rounded-circle profile--medium mt-1-invert" src="https://api.adorable.io/avatars/285/jons.png" alt="Generic placeholder image">
                    <div class="card-block card-block-height">
                        <h5 class="card-title"><?php echo $follows->getName()?></h5>
                        <h6 class="card-title"><?php echo '@' . $follows->getUsername()?></h6>
                        <p class="card-text"><?php echo $follows->getDescription()?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>

    <div class="d-block d-sm-none">
    <?php
    foreach ($following as $follows) :?>
    <a class="disable-a" href="/profile/<?php echo $follows->getUsername()?>">
        <div class="pl-2 media user-card user-card--border-bottom user-card--shadow mt-2">
            <img class="d-flex mr-3 rounded-circle profile--small" src="https://api.adorable.io/avatars/285/jons.png" alt="Generic placeholder image">
            <div class="media-body user-card__body">
                <h5 class="card-title"><?php echo $follows->getName()?></h5>
                <h6 class="card-title"><?php echo '@' . $follows->getUsername()?></h6>
                <div class="user-card__body-text">
                    <p class="card-text "><?php echo $follows->getDescription()?></p>
                </div>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
    </div>

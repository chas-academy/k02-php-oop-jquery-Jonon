<div class="container-fluid p-0 profile-banner">
    <div id="jumbo" class="jumbotron profile-banner__image">
    </div>
</div>
<nav class="profile-bar navbar-light bg-light border_bottom box-shadow-b d-sm-none d-md-block d-sm-block d-none">
    <div class="d-flex justify-content-end ">
        <div class="mr-5">
            <form action="/profile/unfollow" method="post">
                <input type="hidden" name="id" value="<?php echo $user->getId()?>"/>
                <input type="hidden" name="username" value="<?php echo $user->getUsername()?>"/>
                <button class="btn btn-outline--primary" type="submit">Unfollow</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
    <div class="col-md-4 padding-nullify">
            <div class="info-card mt-3 profile-card">
                <div class="card-body profile-card__body">
                    <div class="d-flex justify-content-between">
                        <img class="align-self-start mr-3 rounded-circle profile--primary-size" src="https://api.adorable.io/avatars/285/jons.png" alt="Profile avatar">
                        <form action="/profile/unfollow" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->getId()?>"/>
                            <input type="hidden" name="username" value="<?php echo $user->getUsername()?>"/>
                            <button class="btn btn--mobile btn-outline--primary profile-card_btn d-block d-sm-none" type="submit">Unfollow</button>
                        </form>
                    </div>
                    <h5 class="card-title mt-2"><?php echo $user->getName();?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $user->getUsername();?></h6>
                    <p class="card-text"><?php echo $user->getDescription()?></p>
                    <p class="card-text">Joined <?php echo $user->getDateJoined()?></p>

                    <ul class="d-flex p-0">
                        <li class="navbar-item list-style">
                            <a class="link-color-primary" href="/profile/<?php echo $user->getusername()?>/following">Following</a>
                        </li>
                        <li class="navbar-item list-style ml-5 pb-4">
                            <a class="link-color-primary" href="/profile/<?php echo $user->getusername()?>/followers">Followers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-6 padding-nullify">
        <?php
        foreach ($tweets as $tweet) :?>
            <div class="media tweet border border-primary tweet-border-bottom tweet--box-shadow mt-2 p-2 ">
                <img class="align-self-start mr-3 rounded-circle profile--small" src="https://api.adorable.io/avatars/285/jons.png" alt="profile avatar">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $user->getName();?></h5>

                    <p><?php  echo $tweet->getTweet();?></p>
                    <nav class="">
                        <i class="feather f-message-circle" data-feather="message-circle"></i>
                        <i class="feather f-heart ml-5" data-feather="heart"></i>
                    </nav>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

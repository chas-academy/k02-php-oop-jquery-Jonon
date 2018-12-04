<div class="container-fluid b-img">
    <div id="jumbo" class="jumbotron default__background-image">
    </div>
</div>
<nav class="navbar navbar-light bg-light border_bottom box-shadow-b">
    <div class="d-flex justify-content-center ">
        <div class="d-flex  aligner flex-wrap">
            <ul class="navbar-nav flex-row">
                <li class="navbar-item ml-5">
                    <a href="#">Tweets</a>
                </li>
                <li class="navbar-item ml-5">
                    <a href="#">Following</a>
                </li>
                <li class="navbar-item ml-5">
                    <a href="#">Followers</a>
                </li>
            </ul>
                <div class=" ml-5 d-sm-none d-md-block  d-sm-block d-none">
                <form action="/profile/follow" method="post">
                    <input type="hidden" name="id" value="<?php echo $user->getId()?>"/>
                    <button class="btn btn-outline-primary" type="submit">Follow</button>
                </form>
        </div> 
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="info-card mt-3 ml-5">
                    <div class="card-body">
                        <img class="align-self-start mr-3 rounded-circle profile--large" src="https://images.unsplash.com/photo-1542384701-c0e46e0eda04?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1339324b1b254b13747a87333861327f&auto=format&fit=crop&w=636&q=80" alt="Profile avatar">
                        <h5 class="card-title"><?php echo $user->getName();?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $user->getUsername();?></h6>
                        <p class="card-text"><?php echo $user->getDescription()?></p>
                        <p class="card-text">Joined <?php echo $user->getDateJoined()?></p>
                    </div>
                </div>
        </div>


        <div class="col-md-6">
        <?php
        foreach ($tweets as $tweet) :?>
            <div class="media border border-primary box-shadow-b mt-2 p-2 ">
                <img class="align-self-start mr-3 rounded-circle profile--small" src="https://images.unsplash.com/photo-1542384701-c0e46e0eda04?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1339324b1b254b13747a87333861327f&auto=format&fit=crop&w=636&q=80" alt="profile avatar">
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

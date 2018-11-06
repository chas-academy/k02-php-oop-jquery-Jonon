<div class="container-fluid b-img">
    <div id="jumbo" class="jumbotron default__background-image">
    </div>
</div>

<nav class="navbar navbar-light bg-light border_bottom box-shadow-b ">
    <div class="d-flex justify-content-end">
        <div class="d-flex w-50 justify-content-sm-between">
        <ul class="navbar-nav flex-row">
            <li class="navbar-item ml-2">
                <a href="#">Tweets</a>
            </li>
            <li class="navbar-item ml-2">
                <a href="#">Following</a>
            </li>
            <li class="navbar-item ml-2">
                <a href="#">Followers</a>
            </li>
        </ul>
        <div class="">
        <a href="#" class="btn btn-outline-primary ">Edit Profile</a>
        </div>
        
        </div> 
        </div>

        
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="info-card mt-3 ml-5">
                <div class="card-body">
                    <img class="align-self-start mr-3 rounded-circle profile--large" src="../images/profile_default.jpg" alt="Profile avatar">
                    <h5 class="card-title"><?php echo $user->getName();?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $user->getUsername();?></h6>
                    <p class="card-text">some text about myself.</p>
                    <p class="card-text">Joined December 1837</p>
                    <p class="card-text">Born: June 6, 1803.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-3">
            <?php
            for ($i = 0; $i <= 5; $i++) : ?>
            <div class="media border border-primary">
                <img class="align-self-start mr-3 rounded-circle profile--small" src="../images/profile_default.jpg" alt="profile avatar">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $user->getName();?></h5>
                    <p>It’s the ship that made the Kessel Run in less than twelve parsecs! I’ve outrun Imperial starships, not the local bulk-cruisers, mind you. I’m talking about the big Corellian ships now. She’s fast enough for you, old man.</p>
                    <nav>
                        <i class="far fa-comment"></i>
                        <i class="far fa-heart"></i>
                    </nav>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
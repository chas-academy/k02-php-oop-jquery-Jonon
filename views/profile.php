<div class="container-fluid b-img">
    <div id="jumbo" class="jumbotron default__background-image">
    </div>
</div>

<nav class="navbar navbar-light bg-light border_bottom box-shadow-b">
    <div class=" d-flex justify-content-end">
        
        <ul class="navbar-nav flex-row w-50 ">
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
        <a href="#" class="btn btn-outline-primary">Edit Profile</a>
    <div>     
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-4 mt-5-invert ">
            <div class="profile profile--large img-thumbnail rounded-circle"></div>
            <div class="info-card mt-3 ml-5">
                <div class="card-body">
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
                <img class="align-self-start mr-3 rounded-circle profile--small" src="../images/profile_default.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $user->getName();?></h5>
                    <p>It’s the ship that made the Kessel Run in less than twelve parsecs! I’ve outrun Imperial starships, not the local bulk-cruisers, mind you. I’m talking about the big Corellian ships now. She’s fast enough for you, old man.</p>
                    <nav>
                        <i class="far fa-comment"></i>
                    </nav>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
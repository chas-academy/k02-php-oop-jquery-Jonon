<div class="container-fluid b-img">
    <div id="jumbo" class="jumbotron default__background-image">
    </div>
</div>

<nav class="navbar navbar-light bg-light border_bottom box-shadow-b navbar-height">
</nav>

<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="card  ">
            <div class="card-body">
                <h5 class="card-title"><?php echo $user->getName();?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $user->getUsername();?></h6>
                <p class="card-text">some text about myself.</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card ">
            <div class="card-body">
                <h6 class="card-title"><?php echo $user->getName();?></h6>
                <p class="card-text">some tweet text.</p>
            </div>
        </div>
        <div class="card ">
            <div class="card-body mt-2">
                <div class="row">
                    <div class="profile"></div>
                    <div class="ml-3">
                        <h6 class="card-title"><?php echo $user->getName();?></h6>
                        <p class="card-text">some tweet text.</p>
                        <nav>
                        <i class="fas fa-comment"></i>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

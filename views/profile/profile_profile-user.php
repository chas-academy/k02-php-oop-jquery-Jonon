<div class="container-fluid b-img p-0 profile-banner">
    <div id="jumbo" class="jumbotron profile-banner__image">
    </div>
</div>
<nav class="profile-bar navbar-light bg-light border_bottom box-shadow-b d-sm-none d-md-block d-sm-block d-none">
    <div class="d-flex justify-content-end ">
        <div class="mr-5">
            <button type="button" class="btn btn-outline--primary" data-toggle="modal" data-target="#ModalCenter">Edit Profile
        </button>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-4 padding-nullify">
            <div class="info-card mt-3 profile-card">
                <div class="card-body profile-card__body">
                    <div class="d-flex justify-content-between profile-card__media">
                        <img class="align-self-start mr-3 rounded-circle profile--primary-size" src="https://api.adorable.io/avatars/285/jons.png" alt="Profile avatar">
                        <button type="button" class="btn btn--mobile btn-outline--primary profile-card_btn d-block d-sm-none" data-toggle="modal" data-target="#ModalCenter">Edit Profile</button>
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
            <div class="media tweet border border-primary tweet--box-shadow mt-2 p-2 ">
                <img class="align-self-start mr-3 rounded-circle profile--small" src="https://api.adorable.io/avatars/285/jons.png" alt="profile avatar">
                <div class="media-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="mt-0"><?php echo $user->getName();?></h5>
                        <form method="post" action="/tweet/delete">
                            <input type="hidden" name="Id" value="<?php echo $user->getId()?>"/>
                            <input type="hidden" name="tweetId" value="<?php echo $tweet->getTweetId()?>"/>
                            <button class="btn--nostyling" type="submit"><i data-feather="x" class="cross"></i></button>
                        </form>
                        
                    </div>
                    <p class="text-word-break-all"><?php  echo $tweet->getTweet();?></p> 
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




<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="" method="post" action="/profile/edit">
        <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $user->getId()?>"/>
            <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name"  value="<?php echo $user->getName()?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea type="text" class="form-control" name="description" placeholder="Description" required><?php echo $user->getDescription()?></textarea>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


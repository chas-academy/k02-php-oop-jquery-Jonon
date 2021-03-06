<div class="container">
    <div class=" d-none d-sm-block">
        <div class="row justify-content-center">
            <div class="col-sm-8 ">
                <form class="tweet-form mt-3" action="tweet" method="post">
                    <div class="tweet-box form-group mb-2 d-flex justify-content-center">
                        <textarea class="tweet-box__text-area tweet-box__text-area--border-radius tweet-box__text--area-resize-none tweet-box__text-area--text-center-placeholder form-control" placeholder="What's happening?" name="tweet"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="tweet-form__tweet-button tweet-box__btn btn btn--primary w-75 mb-2">Tweet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="fixed-bottom d-flex justify-content-end mr-3 mb-2 d-block d-sm-none">
        <button class="tweet-button btn--nostyling btn--tweet-size   btn--primary--tweet">
            <div class="btn--primary btn--tweet rounded-circle p-2 btn--tweet-size d-flex align-items-center justify-content-center tweet-bx">
                <i class="feather" data-feather="feather"></i>
            </div>
        </button>
    </div> 

    <?php
    foreach ($tweets as $tweet) :?>
    <div class="row justify-content-center">
        <div class="col-sm-8 padding-nullify">
            <div class="media tweet border border-primary tweet-border-bottom tweet--box-shadow mt-2 p-2">
                <img class="align-self-start mr-3 rounded-circle profile--small" src="https://api.adorable.io/avatars/285/jons.png" alt="profile avatar">
                <div class="media-body">
                    <a href="/profile/<?php echo $tweet->getUsername()?>"><h5 class="tweet-header mt-0"><?php echo $tweet->getName();?></h5></a>
                    <p><?php  echo $tweet->getTweet();?></p>
                    <nav class="">
                        <i class="feather f-message-circle" data-feather="message-circle"></i>
                        <i class="feather f-heart ml-5" data-feather="heart"></i>
                    </nav>
                    <div class="tweet-border"></div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="main-modal">
    <div class="main-modal-content">
        <button class="btn--nostyling close" type="submit"><i data-feather="x" class="cross"></i></button>
        <h3>Tweet something</h3>
        <form class="tweet-creation__form" action="/home" method="post">
        <textarea class="main-modal__text-area tweet-box__text--area-resize-none tweet-box__text-area--text-center-placeholder form-control" placeholder="What's happening?" name="tweet" ></textarea>
        <button class="tweet-box__btn btn btn--primary form-control" type="submit">Tweet</button>
    </div>
</div>
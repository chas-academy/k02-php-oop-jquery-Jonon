<div class="container">
    <form class="form-row justify-content-center tweet-form mt-3" action="/home" method="post">
        <div class="tweet-box row col-auto justify-content-center">
            <div class=" form-group mb-2 col-auto ">
                <textarea class="tweet-box__text-area tweet-box__text-area--border-radius tweet-box__text--area-resize-none tweet-box__text-area--text-center-placeholder form-control" placeholder="What's happening?" name="tweet"></textarea>
            </div>
            <div class=" col-auto form-group ml-sm-5">
                <button class="tweet-box__btn btn btn--primary form-control" type="submit">Tweet</button>
            </div>        
        </div>
    </form>

    <?php
    foreach ($tweets as $tweet) :?>
    <div class="row justify-content-center">
        <div class="col-sm-8 padding-nullify">
            <div class="media border border-primary box-shadow-b mt-2 p-2">
                <img class="align-self-start mr-3 rounded-circle profile--small" src="https://api.adorable.io/avatars/285/jons.png" alt="profile avatar">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $tweet->getName();?></h5>
                    <p><?php  echo $tweet->getTweet();?></p>
                    <nav class="">
                        <i class="feather f-message-circle" data-feather="message-circle"></i>
                        <i class="feather f-heart ml-5" data-feather="heart"></i>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
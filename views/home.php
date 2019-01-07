<div class="container">
    <form class="mt-3" action="/home" method="post">
        <div class="form-group row justify-content-center">
            <textarea class="textarea-resize-none text-center-placeholder textarea_tweet" placeholder="What's happening?" name="tweet"></textarea>
            <div class="ml-5">
                <button class="btn btn-primary" type="submit">Tweet</button>
            </div>        
        </div>
    </form>


    <?php
    foreach ($tweets as $tweet) :?>
        <div class="media border border-primary box-shadow-b mt-2 p-2 ">
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
    <?php endforeach; ?>
<div class="container">
    <form class="form-row d-flex justify-content-center mt-3">
        <div class="row col-auto">
            <div class="form-group mb-2 col-auto">
                <input type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <div class="col-auto form-group">
                <button type="submit" class="btn btn-primary mb-2 form-control ">Search</button>
            </div>
        </div> 
    </form>
    <div class="row">
    <?php foreach ($users as $user) :?>
    <div class="card-group col-sm-4 mb-4">
    <a href="/profile/<?php echo $user->getUsername()?>">
        <!-- Card -->
        <div class="card col testimonial-card">
        <!-- Background color -->
        <div class="card-up indigo lighten-1"></div>
        <!-- Avatar -->
        <div class="avatar mx-auto white mt-1">
            <img src="https://images.unsplash.com/photo-1542384701-c0e46e0eda04?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1339324b1b254b13747a87333861327f&auto=format&fit=crop&w=636&q=80" class="rounded-circle profile--large" alt="woman avatar">
        </div>
        <!-- Content -->
        <div class="card-body">
            <!-- Name -->
            <h4 class="card-title"><?php echo $user->getName()?></h4>
            <hr>
            <!-- Quotation -->
            <p><?php echo $user->getDescription()?></p>
        </div>
        </div>
<!-- Card -->
</a>
    </div>
    <?php endforeach?>
    </div>
</div>






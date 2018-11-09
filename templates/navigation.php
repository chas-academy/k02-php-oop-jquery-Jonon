<nav class="navbar navbar-light bg-light border_bottom p-x-sm-0">
    <div class="d-sm-flex justify-content-between">     
        <div class="d-flex w-100 justify-content-around">
        <?php
        if (isset($_SESSION['user'])) {
            $html = <<<HTML
        <div class="d-flex aligner">
                <a href="/" class=""><i class="fas fa-home"></i>
                </a>

                <a href="/" class="ml-3"><i class="far fa-envelope"></i>
                </a>

                <a href="/" class="ml-3"><i class="fas fa-search"></i>
                </a>
            </div>

            <div class="dropdown">
            <!-- profile icon-->
            <div class="d-flex align-items-center">
            <i class="fas fa-user-circle dropdown__icon-button"></i>
                <i class="arrow-down"></i>
            </div>
                <nav class="dropdown__navigation dropdown-active">
                    
                    <ul class="dropdown__list">

                        <li class="dropdown__list-item">
                            <a class="dropdown__list-item-link btn btn-red" href="/profile/jonon">Profile</a></li>

                        <li class="dropdown__list-item mt-2">
                            <a class="dropdown__list-item-link  btn btn-red" href="#">Settings</a></li>

                        

                        <li class="dropdown__list-item mt-4">
                            
                            <a class="dropdown__list-item-link btn btn-outline-red" href="/logout">Log out</a></li>
                    </ul>
                </nav>
            </div>
HTML;
            echo $html;
        } else {
$html = <<<HTML
            <div class="text-center">
                <a href="/" class="navbar-brand lh-1">TwitterClone</a>
                </div>

            <div class="dropdown">
            <!-- profile icon-->
            <div class="d-flex align-items-center">
            <i class="fas fa-user-circle dropdown__icon-button"></i>
                <i class="arrow-down"></i>
            </div>
                
                <nav class="dropdown__navigation dropdown-active">     
                    <ul class="dropdown__list">
                        <li class="dropdown__list-item">
                            <a class="dropdown__list-item-link btn btn-red" href="/login">Login</a></li>
                        
                        <li class="mt-4">Don't have an account?</li>
                        <li class="dropdown__list-item mt-1">           
                            <a class="dropdown__list-item-link btn btn-outline-red" href="/register">Register</a></li>
                    </ul>
                </nav>
            </div>

HTML;
            echo $html;
        }
        ?>

                

        </div>
        <!-- logout path -->
        

 
        </div>
    </div>
</nav>
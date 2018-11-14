<nav class="navbar navbar-light bg-light border_bottom p-x-sm-0 box-shadow-b fixed-top">
    <div class="d-sm-flex justify-content-between">     
        <div class="d-flex w-100 justify-content-around">
        <?php
        if (isset($_SESSION['user'])) {
            $html = <<<HTML
        <div class="d-flex aligner ">
                <a href="/" class="d-flex align-self-center text-grey  navigation-link">
                <i data-feather="home" class="feather f-home"></i>
                <span class="ml-1 font-josefin-slab d-sm-none d-md-block  d-sm-block d-none">Home</span>
                </a>

                <a href="/" class="d-flex align-self-center ml-4 text-grey navigation-link"><i data-feather="bell" class="feather f-bell"></i>
                <span class="ml-1 font-josefin-slab d-sm-none d-md-block  d-sm-block d-none">Notifications</span>
                </a>

                <a href="/" class="d-flex align-self-center ml-4 text-grey navigation-link"><i data-feather="mail" class="feather f-mail"></i>
                <span class="ml-1 font-josefin-slab d-sm-none d-md-block  d-sm-block d-none">Messages</span>
                </a>

                <a href="/" class="d-flex align-self-center ml-4 text-grey navigation-link"><i data-feather="search" class="feather f-search"></i>
                <span class="ml-1 font-josefin-slab d-sm-none d-md-block  d-sm-block d-none">Search</span>
                </a>   
            </div>

            <div class="dropdown">
            <!-- profile icon-->
            <div class="d-flex align-items-center">
            <i data-feather="user" class=" dropdown__icon-button rounded-circle"></i>
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
            <i data-feather="user" class=" dropdown__icon-button rounded-circle"></i>
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
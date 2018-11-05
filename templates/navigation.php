<nav class="navbar navbar-light bg-light border_bottom p-x-sm-0">
    <div class="d-sm-flex justify-content-between"> 
        <?php
        if (isset($_SESSION['user'])) {
$html = <<<HTML
        <div>
            <div class="dropdown">
            <!-- profile icon-->
                <i class="fas fa-user-circle dropdown__icon-button"></i>
                <nav class="dropdown__navigation dropdown-active">
                    <ul class="dropdown__list">
                        <li class="dropdown__list_element dropdown__list_element--hover"><a class="dropdown__list_link" href="/profile/jonon">Profile</a></li>
                        <li class="dropdown__list_element dropdown__list_element--hover"><a class="dropdown__list_link" href="#">Settings</a></li>
                        <li class="dropdown__list_element dropdown__list_element--hover"><a class="dropdown__list_link" href="/logout">Log out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- logout path -->
        <div class="aligner">
                <a href="/" class=""><i class="fas fa-home"></i>
                </a>

                <a href="/" class="ml-3"><i class="far fa-envelope"></i>
                </a>

                <a href="/" class="ml-3"><i class="fas fa-search"></i>
                </a>
        </div>
HTML;
            echo $html;
        } else {
            // login and register path
$html = <<<HTML
                <div class="text-center">
                <a href="/" class="navbar-brand">TwitterClone</a>
                </div>
                
                    <div class="d-sm-flex">
                        <a href="/login" class="btn btn-primary d-block">Login</a>
                        <a href="/register" class="btn btn-secondary d-block">Register</a>
                        
                    </div>
HTML;
            echo $html;
        }
        ?>
        </div>
    </div>
</nav>
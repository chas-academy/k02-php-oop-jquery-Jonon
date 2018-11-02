<nav class="navbar navbar-light bg-light border_bottom navbar-height">
    <div class="container d-flex justify-content-between"> 
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
                <a href="/" class="">Home</a>

                <a href="/" class="ml-3"><svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0V18H24V0H0ZM21.518 2L12 9.713L2.482 2H21.518ZM2 16V4.183L12 12.287L22 4.183V16H2Z" fill="#FF5C00"/>
                </svg>
                </a>

                <a href="/" class="ml-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.853 16.56C14.17 18.077 11.942 19 9.5 19C4.257 19 0 14.743 0 9.5C0 4.257 4.257 0 9.5 0C14.743 0 19 4.257 19 9.5C19 11.942 18.077 14.17 16.56 15.853L24 23.293L23.293 24L15.853 16.56ZM9.5 1C14.191 1 18 4.809 18 9.5C18 14.191 14.191 18 9.5 18C4.809 18 1 14.191 1 9.5C1 4.809 4.809 1 9.5 1Z" fill="#FF5C00"/>
                </svg>
                </a>
        </div>
HTML;
            echo $html;
        } else {
            // login and register path
$html = <<<HTML
                <a href="/" class="navbar-brand">TwitterClone</a>
                    <div>
                        <a href="/login" class="btn btn-primary">Login</a>
                        <a href="/register" class="btn btn-secondary">Register</a>
                    </div>
HTML;
            echo $html;
        }
        ?>
        </div>
    </div>
</nav>
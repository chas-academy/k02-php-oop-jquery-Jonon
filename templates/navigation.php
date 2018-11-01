<nav class="navbar navbar-light bg-light border_bottom navbar-height">
    <div class="container d-flex justify-content-between"> 
        <?php
        if (isset($_SESSION['user'])) {
                echo '
                    <div>
                    <!-- profile icon-->
                        <svg class="dropdown"
                            width="34" 
                            height="34" 
                            viewBox="0 0 34 34" 
                            fill="none" 
                            xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 0C7.61175 0 0 7.61175 0 17C0 26.3883 7.61175 34 17 34C26.3883 34 34 26.3883 34 17C34 7.61175 26.3883 0 17 0ZM27.9834 25.9321C27.6137 25.1019 26.8657 24.5282 25.3328 24.174C22.0844 23.4246 19.0598 22.7673 20.5261 20.0019C24.9815 11.5841 21.7062 7.08333 17 7.08333C12.2003 7.08333 9.00433 11.7569 13.4739 20.0019C14.9841 22.7843 11.8476 23.4402 8.66717 24.174C7.1315 24.5282 6.38917 25.1062 6.02225 25.9392C4.03183 23.4982 2.83333 20.3873 2.83333 17C2.83333 9.1885 9.1885 2.83333 17 2.83333C24.8115 2.83333 31.1667 9.1885 31.1667 17C31.1667 20.3844 29.9696 23.4926 27.9834 25.9321Z" fill="black"/>
                        </svg>
                        <nav class="options">
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Log out</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- logout path -->
                    <div class="aligner">
                            <a href="/logout" class="btn btn-primary">logout</a>

                            <a href="/" class="ml-3"><svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V18H24V0H0ZM21.518 2L12 9.713L2.482 2H21.518ZM2 16V4.183L12 12.287L22 4.183V16H2Z" fill="#FF5C00"/>
                            </svg>
                            </a>

                            <a href="/" class="ml-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.853 16.56C14.17 18.077 11.942 19 9.5 19C4.257 19 0 14.743 0 9.5C0 4.257 4.257 0 9.5 0C14.743 0 19 4.257 19 9.5C19 11.942 18.077 14.17 16.56 15.853L24 23.293L23.293 24L15.853 16.56ZM9.5 1C14.191 1 18 4.809 18 9.5C18 14.191 14.191 18 9.5 18C4.809 18 1 14.191 1 9.5C1 4.809 4.809 1 9.5 1Z" fill="#FF5C00"/>
                            </svg>
                            </a>
                    </div>';
        } else {
            // login and register path
            echo '<a href="/" class="navbar-brand">TwitterClone</a>
            <div>
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/register" class="btn btn-secondary">Register</a></div>';
        }
        ?>
        </div>
    </div>
</nav>
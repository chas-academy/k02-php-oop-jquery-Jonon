<?php
//check if user is logged in, if not render register view
if (!isset($_SESSION['user'])) {
    echo '<div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="/register" method="post">
                            <h1 class="h3 mb-3 font-weight-normal text-center">Register</h1>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn--primary ">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    //if user logged in redirect to home page
} else {
    return header("Location: /");
}

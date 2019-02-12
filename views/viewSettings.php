<div class="container ">
    <div class="row justify-content-center align-items-center settings">
        <div class="col-8 ">
            <h1 class="text-center">Settings</h1>
            <form action="/settings/updateaccount" method="post">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION['AuthUser']['username']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $_SESSION['AuthUser']['email']?>">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn--secondary">Save settings</button>
                </div>  
            </form>

            <h2 class="text-center mt-3">Delete account</h2>
            <p class="text-center">Warning, clicking this button will delete your account permanently!</p>
            <div class="d-flex justify-content-center">
            <form action="settings/deleteaccount" method="post">
                <button class="btn btn-danger">Delete your account</button>
            </form>
            </div>
        </div>
    </div>
</div>
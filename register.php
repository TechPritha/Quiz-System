<?php
session_start();
?>
<html>
    <head>
        <title>Quiz Management System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-md-8">
                <div class="bg-success text-white text-center p-2 mb-3">
                    <h4>Registration Page</h4>
                </div>
                <div class="container">
                    <?php
                        if (isset($_SESSION['message']) && isset($_SESSION['type'])) {
                            ?>
                                <div class="alert alert-primary alert-<?php echo $_SESSION['type']?> alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                    <strong>
                                        <?php 
                                        echo $_SESSION['message'];
                                        $_SESSION['message'] = null;
                                        $_SESSION['type'] = null;
                                        ?>                           
                                    </strong>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                <form action="register-process.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>E-mail</b></label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label"><b>Contact</b></label>
                        <input type="text" class="form-control" name="contact" id="contact">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input class="form-control" id="password" type="password" name="password" placeholder="Create a password" /> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <label for="cpassword" class="form-label"><b>Confirm Password</b></label>
                                <input class="form-control" id="cpassword" type="password" name="cpassword" placeholder="Confirm password" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label"><b>Upload Photo</b></label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </div>
                </form>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="login.php">Already Have Account, log-in now</a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
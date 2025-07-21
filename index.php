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
                <div class="bg-success text-white text-center p-2 mb-4">
                    <h4>Welcome To My Quiz competition</h4>
                </div>
                <div class="container">
                    <?php
                        if (isset($_SESSION['message']) && isset($_SESSION['type'])) {
                            ?>
                                <div class="alert alert-primary text-center alert-<?php echo $_SESSION['type']?> alert-dismissible fade show" role="alert">
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
            </div>
        </div>
        <div class="container-fluid">
            <form action="index-process.php" method="post">
                <input type="text" name="name" value="<?php echo $_SESSION['student']['name'];?>" hidden>
                <input type="text" name="email" value="<?php echo $_SESSION['student']['email'];?>" hidden>
                <input type="text" name="contact" value="<?php echo $_SESSION['student']['contact'];?>" hidden>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="quiz1 mb-4">
                            <h5 class="mb-3">1. what is national bird of india?</h5>
                            <div class="mb-3">
                                <input type="radio" class="form-check-input" name="quiz1" id="quiz1" value="crow"> Crow &nbsp;
                                <input type="radio" class="form-check-input" name="quiz1" id="quiz1" value="sparrow"> Sparrow &nbsp;
                                <input type="radio" class="form-check-input" name="quiz1" id="quiz1" value="peacock"> Peacock &nbsp;
                            </div>
                        </div>
                        <div class="quiz2 mb-4">
                            <h5 class="mb-3">2. what is national animal of india?</h5>
                            <div class="mb-3">
                                <input type="radio" class="form-check-input" name="quiz2" id="quiz2" value="tiger"> Tiger &nbsp;
                                <input type="radio" class="form-check-input" name="quiz2" id="quiz2" value="lion"> Lion &nbsp;
                                <input type="radio" class="form-check-input" name="quiz2" id="quiz2" value="jaguar"> Jaguar &nbsp;
                            </div>
                        </div>
                        <div class="quiz3 mb-4">
                            <h5 class="mb-3">3. what is national fruit of india?</h5>
                            <div class="mb-3">
                                <input type="radio" class="form-check-input" name="quiz3" id="quiz3" value="apple"> Apple &nbsp;
                                <input type="radio" class="form-check-input" name="quiz3" id="quiz3" value="lemon"> Lemon &nbsp;
                                <input type="radio" class="form-check-input" name="quiz3" id="quiz3" value="mango"> Mango &nbsp;
                            </div>
                        </div>
                        <div class="quiz4 mb-4">
                            <h5 class="mb-3">4. who is the first president india?</h5>
                            <div class="mb-3">
                                <input type="radio" class="form-check-input" name="quiz4" id="quiz4" value="rajendra-prasad"> Dr. Rajendra Prasad &nbsp;
                                <input type="radio" class="form-check-input" name="quiz4" id="quiz4" value="bahadur-shastri"> Lal Bahadur Shastri &nbsp;
                                <input type="radio" class="form-check-input" name="quiz4" id="quiz4" value="jawaharlal-nehru"> Jawaharlal Nehru &nbsp;
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-100">Submit-Answers</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
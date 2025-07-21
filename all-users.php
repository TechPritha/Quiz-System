<?php
session_start();
require_once "../config.php";
?>
<html>
    <head>
        <title>Quiz Management System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container mt-3">
        <div class="container-fluid">
           <a href="dashboard.php" class="btn btn-warning">Back</a>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-md-8">
                <div class="bg-dark text-white text-center p-2 mb-3">
                    <h4>Admin-Panel</h4>
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
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table text-center">
                <tr>
                    <th>Student_photo</th>
                    <th>Student_id</th>
                    <th>Student_Name</th>
                    <th>Student_Email</th>
                    <th>Student_Contact</th>
                </tr>
                <tbody>
                    <?php
                    $display_query = mysqli_query($conn, "SELECT * FROM `users` WHERE users_type='student'");
                    if (mysqli_num_rows($display_query)>0) {
                        while ($data = mysqli_fetch_assoc($display_query)) {
                            ?>
                                <tr>
                                    <td><img src="<?php echo $data['photo'];?>" alt="" height="100px" width="100px"></td>
                                    <td><?php echo $data['user_id'];?></td>
                                    <td><?php echo $data['name'];?></td>
                                    <td><?php echo $data['email'];?></td>
                                    <td><?php echo $data['contact'];?></td>
                                </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
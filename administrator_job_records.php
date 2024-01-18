<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- including the side navigation bar here -->
    <div class="main-content-container">
        <div class="side-navigation-area">
            <!-- the dashboard side navigation will be here -->
            <?php include("administrator_sidebar.php"); ?>
        </div>
        
        <div class="content-area">
            <!-- ================ the cards for the job and other records will be here -->
            <div class="container-xxl">
                <div class="row main-content-window">
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <img src="Controls/Images/job-seeker.png" alt="">
                            <!-- the card body will be here -->
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>job records</h2>
                                </div>
                                <!-- -------- the job details will be here -->
                                <div class="card-text">
                                    <p class="lead">
                                        click on the button below, to see all the available jobs,
                                        on the page you will be able to delete and update a record.
                                    </p>
                                </div>

                                <!-- ======== card button will be here ===== -->
                                <div class="card-button">
                                    <a href="administrator_view_jobs.php" class="btn btn-lg btn-primary">View Job Records</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================== // ===================// =============== // -->
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <img src="Controls/Images/online-interview.png" alt="">
                            <!-- the card body will be here -->
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>interview records</h2>
                                </div>
                                <!-- -------- the job details will be here -->
                                <div class="card-text">
                                    <p class="lead">
                                        click on the button below, to see all the available jobs,
                                        on the page you will be able to delete and update a record.
                                    </p>
                                </div>

                                <!-- ======== card button will be here ===== -->
                                <div class="card-button">
                                    <button type="submit" class="btn btn-lg btn-info">
                                        <span><i class="bi bi-clipboard-data me-3"></i></span>view interview records
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- ================== // ===================// =============== // -->
                     <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <img src="Controls/Images/yoga.png" alt="">
                            <!-- the card body will be here -->
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>candidates</h2>
                                </div>
                                <!-- -------- the job details will be here -->
                                <div class="card-text">
                                    <p class="lead">
                                        click on the button below, to see all the available jobs,
                                        on the page you will be able to delete and update a record.
                                    </p>
                                </div>

                                <!-- ======== card button will be here ===== -->
                                <div class="card-button">
                                    <button type="submit" class="btn btn-lg btn-success">
                                        <span><i class="bi bi-clipboard-data me-3"></i></span>view candidate records
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
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
            <!-- ============== the content for the administrator dashboard will be here ======= -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-dashboard-panel">
                            <div class="top-welcome-page">
                                <!-- =============== the top icon section will be here ========== -->
                                <div class="top-icon">
                                    <div class="top-welcome-text">
                                        <h1><i class="bi bi-grid-1x2"></i> main dashboard</h1>
                                    </div>
                                </div>
                                <!-- ================= the welcome section will be here ========= -->
                            </div>

                            <!-- ============== the section for the cards will be here ============ -->
                            <div class="dashboard-cards">
                                <div class="total-applicants">1</div>
                                <div class="total-questions">2</div>
                                <div class="total-jobs-available">3</div>
                            </div>
                            <!-- ================= the other section will start from here ======= -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
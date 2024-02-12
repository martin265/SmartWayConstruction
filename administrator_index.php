<?php

// ================== including the connection class here ============//
include("Connection/connection.php");
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection();
$conn = $connection->get_connection();


// ================== function to count the databse records here ============ //
function countPatientRecords($conn) {
    try {
        $sqlCommand = "SELECT COUNT(*) AS total_records FROM JobDetails";
        // =========== running the query here ==============//
        $results = mysqli_query($conn, $sqlCommand);
        // ============ checking is there available results ============ //
        if ($results) {
            // fetching the results as an associative array ========= //
            $row = mysqli_fetch_assoc($results);
            $totalRecords = $row["total_records"];

            return $totalRecords;
        }
    }catch(Exception $ex) {
        print($ex);
    }
}


$totalRecords = countPatientRecords($conn);


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
                                <div class="total-applicants">
                                    <div class="top-icon-applicants">
                                        <i class="bi bi-file-earmark-richtext"></i>
                                    </div>
                                    <!-- =========== the text will be here ========= -->
                                    <div class="top-text-applicants">
                                        <h1>total applicants</h1>
                                    </div>
                                    <!-- =========== the text will be here ========= -->
                                    <div class="top-text-applicants">
                                        <h1><?php echo($totalRecords); ?></h1>
                                    </div>
                                </div>

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
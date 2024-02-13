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

// ================= function to fetch patient details here ===============//
function fetchPatientDetails($conn) {
    try {
        $sqlCommand = "SELECT * FROM ApplicationDetails";
        // =========== getting the results here =================//
        $results = mysqli_query($conn, $sqlCommand);
        // ============== passing the results into an array here ==========//
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $all_results;
        
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = fetchPatientDetails($conn);

// ================ the isset function for deleting the record in the database here ============== //
if (isset($_POST["delete_record"])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);
    // getting the function to delete the records here ================ //
    $sqlCommand = $conn->prepare(
        "DELETE FROM ApplicationDetails WHERE application_id = ? AND job_id = ?"
    );

    // ============== binding the query here ================= //
    $sqlCommand->bind_param(
        "ss",
        $id_to_delete,
        $all_results["job_id"]
    );
    $sqlCommand->execute();
    fetchPatientDetails($conn);
    print("record deleted successfully");
}

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
                                <div class="total-applicants shadow-sm">
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

                                <div class="total-questions shadow-sm">
                                    <div class="top-icon-questions">
                                        <i class="bi bi-patch-question"></i>
                                    </div>
                                    <!-- =========== the text will be here ========= -->
                                    <div class="top-text-questions">
                                        <h1>total questions</h1>
                                    </div>
                                    <!-- =========== the text will be here ========= -->
                                    <div class="top-text-questions">
                                        <h1><?php echo($totalRecords); ?></h1>
                                    </div>
                                </div>

                                <div class="total-jobs-available shadow-sm">
                                    <div class="top-icon-jobs">
                                        <i class="bi bi-tools"></i>
                                    </div>
                                    <!-- =========== the text will be here ========= -->
                                    <div class="top-text-jobs">
                                        <h1>total jobs</h1>
                                    </div>
                                    <!-- =========== the text will be here ========= -->
                                    <div class="top-text-jobs">
                                        <h1><?php echo($totalRecords); ?></h1>
                                    </div>
                                </div>

                            </div>
                            <!-- ================= the other section will start from here ======= -->

                            <div class="recent-activity-panel">
                                <div class="recent-activity-header">
                                    <h1><i class="bi bi-clock-history me-2"></i>recent activity</h1>
                                </div>
                            </div>

                            <div class="recent-activity-data-table">
                                <table id="recent-table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-capitalize">first name</th>
                                            <th scope="col" class="text-capitalize">last name</th>
                                            <th scope="col" class="text-capitalize">email</th>
                                            <th scope="col" class="text-capitalize">age</th>
                                            <th scope="col" class="text-capitalize">gender</th>
                                            <th scope="col" class="text-capitalize">job title</th>
                                            <th scope="col" class="text-capitalize">job id</th>
                                            <th scope="col" class="text-capitalize">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ============== looping through the results here ====== -->
                                        <?php if ($all_results): ?>
                                            <?php foreach($all_results as $single_record) {?>
                                                <tr>
                                                    <td><?php echo($single_record["first_name"]); ?></td>
                                                    <td><?php echo($single_record["last_name"]); ?></td>
                                                    <td><?php echo($single_record["email"]); ?></td>
                                                    <td><?php echo($single_record["age"]); ?></td>
                                                    <td><?php echo($single_record["gender"]); ?></td>
                                                    <td><?php echo($single_record["job_title"]); ?></td>
                                                    <td><?php echo($single_record["job_id"]); ?></td>
                                                    <!-- ============ for the button here -->
                                                    <td>
                                                        <form action="administrator_index.php" method="POST">
                                                            <input type="hidden" name="id_to_delete" value="<?php echo($single_record["application_id"]);?>">
                                                            <input type="submit" name="delete_record" value="delete" class="btn btn-sm btn-danger">
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            <?php else: ?>

                                            <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
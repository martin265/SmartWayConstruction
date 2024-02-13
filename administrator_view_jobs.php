<?php
// =========== getting the connection class here ========//
include("Model/Job.php");

// ============= function will be used to fetch all the records here
function FetchJobRecords() {
    try {
        $connection = new Connection("localhost", "root", "", "SmartWayConstruction");
        $connection->EstablishConnection();
        $conn = $connection->get_connection();

        // =========== the sql qury here ================ //
        $sqlCommand = "SELECT * FROM JobDetails";
        $results = mysqli_query($conn, $sqlCommand);
        // ========== passing the results to be an array ========= //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        return $all_results;
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = FetchJobRecords();

// =========== function will be used to delete the records in the table
function DeleteJobDetails() {
    try {
        $connection = new Connection("localhost", "root", "", "SmartWayConstruction");
        $connection->EstablishConnection();
        $conn = $connection->get_connection();
        // getting the current clicked id here
        if (isset($_POST["delete"])) {
            $id_to_delete = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);
            // the query to delete the record here
            $sqlCommand = "DELETE FROM JobDetails WHERE job_id = $id_to_delete";
            // executing the query here
            $results = mysqli_query($conn, $sqlCommand);
            if ($results) {
                FetchJobRecords();
            }
            else {
                print("failed to delete the record");
            }
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

DeleteJobDetails();
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
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-jobs-table">
                            <div class="back-button-here">
                                <a href="administrator_job_records.php" class="btn btn-lg btn-outline-dark mt-4 ms-3">
                                    <span><i class="bi bi-back me-2 text-primary"></i></span>back
                                </a>
                            </div>

                            <!-- ============= the table for the records will be here ======= -->
                            <div class="all-records-table ms-2 me-2 mt-4">
                                <table id="recent-table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-capitalize">job title</th>
                                            <th scope="col" class="text-capitalize">job location</th>
                                            <th scope="col" class="text-capitalize">job type</th>
                                            <th scope="col" class="text-capitalize">email</th>
                                            <th scope="col" class="text-capitalize">qualification</th>
                                            <th scope="col" class="text-capitalize">technical skills</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ============== looping through the results here ====== -->
                                        <?php if ($all_results): ?>
                                            <?php foreach($all_results as $single_record) {?>
                                                <tr>
                                                    <td><?php echo($single_record["job_title"]); ?></td>
                                                    <td><?php echo($single_record["job_location"]); ?></td>
                                                    <td><?php echo($single_record["job_type"]); ?></td>
                                                    <td><?php echo($single_record["email"]); ?></td>
                                                    <td><?php echo($single_record["qualification"]); ?></td>
                                                    <td><?php echo($single_record["technical_skills"]); ?></td>
                                                    <!-- ============ for the button here -->
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
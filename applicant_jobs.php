<?php
// fetching all the jobs in the database here //
include("Connection/connection.php");
// ============ estabishing the connection here ============ //
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection(); // establishing the connection here
$conn = $connection->get_connection();
//  ============== function to fetch all the records here ============= //
function FetchAllJobs($conn) {
    try {
        $sqlCommand = "SELECT * FROM JobDetails";
        // ======== executing the querry here // ==============//
        $results = mysqli_query($conn, $sqlCommand);
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        // =========== passing the codes into an associative array here ======== //
        
    }catch(Exception $ex) {
        print($ex);
    }
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
    <!--  ================= // including the top navigation bar here ========= -->
    <div class="top-navigation-bar">
        <?php include("templates/header.php"); ?>
    </div>

    <!-- ============ main content area will be here -->
    <div class="main-job-content-area">
        <div class="container-lg">
            <div class="jobs-page">
                    <div class="jobs-title">
                        <h1>all jobs will appear here...</h1>
                        <p>
                            At SmartWay Construction, we believe in building
                            not just structures but also fostering careers.
                            Our commitment to excellence extends beyond our 
                            projects to the talented individuals who contribute
                            to our success. We are always on the 
                            lookout for skilled and dedicated professionals to join our dynamic team.
                        </p>
                    </div>
            </div>
            <!-- =================== // ==================// -->
        </div>
    </div>

    <!-- ============ the cards to list all the jobs jobs -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-3">1</div>
        </div>
    </div>
</body>
</html>
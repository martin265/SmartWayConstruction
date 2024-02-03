<?php
// ============ getting the database connection here ============= //
include("Connection/connection.php");
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection();
$conn = $connection->get_connection();

// ===================== function to fetch all the records here ================== //
function fetchAllRecords($conn) {
    try {
        $sqlCommand = "SELECT * FROM applicationdetails";
        // =============== fetching the results here ========= //
        $results = mysqli_query($conn, $sqlCommand);
        // ========== getting an array of the results here =========== //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        return $all_results;
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = fetchAllRecords($conn);
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
                        
                        <!-- ============= // ================ // -->
                        <div class="all-applicants">
                            <?php if ($all_results): ?>
                                <?php foreach($all_results as $single_record) {?>
                                    <div class="applicant-details">
                                        <div class="applicant-profile">
                                            <img src="assets\images\man (1).png" alt="">
                                        </div>
                                        <h1><?php echo($single_record["first_name"] . " " . $single_record["last_name"]); ?></h1>
                                        <div class="applicant-personal-details">
                                            <p><span><i class="bi bi-envelope-open me-1 text-warning"></i></span>Email: <?php echo($single_record["email"]);?></p>
                                            <p>Phone Number: <?php echo($single_record["phone_number"]); ?></p>
                                        </div>
                                    </div>
                                <?php }?>

                                <?php else: ?>
                                    <div class="no-available-jobs">
                                        <div class="card">
                                            <img src="Controls\Images\job-search.png" alt="job search">
                                        </div>
                                    </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
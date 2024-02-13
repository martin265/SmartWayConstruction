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

// File upload directory

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
                        
                        
                        <div class="all-applicants">
                            <?php if ($all_results): ?>
                                <?php foreach($all_results as $single_record) {?>
                                    <div class="applicant-details">
                                        <div class="card-header">
                                            <img src="assets\images\man (1).png" alt="">
                                        </div>
                                        <div class="applicant-personal-details">
                                            <div class="details-column">
                                                <h1><span><i class="bi bi-body-text me-2 text-primary"></i></span>first name</h1>
                                                <h1><span><i class="bi bi-body-text me-2 text-primary"></i></span>last name</h1>
                                                <h1><span><i class="bi bi-phone me-2 text-primary"></i></span>phone number</h1>
                                                <h1><span><i class="bi bi-envelope-paper me-2 text-primary"></i></span>email</h1>
                                                <h1><span><i class="bi bi-calendar2-week me-2 text-primary"></i></span>age</h1>
                                                <h1><span><i class="bi bi-gender-ambiguous me-2 text-primary"></i></span>gender</h1>
                                                <h1><span><i class="bi bi-tools me-2 text-primary"></i></span>job title</h1>
                                                <h1><span><i class="bi bi-tools me-2 text-primary"></i></span>job id</h1>
                                                <h1><span><i class="bi bi-calendar-check me-2 text-primary"></i></span>applied at</h1>
                                            </div>
                                            <div class="main-details">
                                                <h1><?php echo($single_record["first_name"]); ?></h1>
                                                <h1><?php echo($single_record["last_name"]); ?></h1>
                                                <h1><?php echo($single_record["phone_number"]); ?></h1>
                                                <h1><?php echo($single_record["email"]); ?></h1>
                                                <h1><?php echo($single_record["age"]); ?></h1>
                                                <h1><?php echo($single_record["gender"]); ?></h1>
                                                <h1><?php echo($single_record["job_title"]); ?></h1>
                                                <h1><?php echo($single_record["job_id"]); ?></h1>
                                                <h1><?php echo($single_record["created_at"]); ?></h1>
                                            </div>
                                        </div>

                                        <div class="document-preview-btn">
                                            <a href="" class="btn btn-primary btn-lg ms-3">preview documents</a>
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
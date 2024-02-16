<?php
// fetching all the jobs in the database here //
include("Model/InterviewQuestions.php");
// ============ estabishing the connection here ============ //
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection(); // establishing the connection here
$conn = $connection->get_connection();
// ============ function to fetch the questions in the databse here =========== //
function fecthQuestions($conn) {
    try {
        $sqlCommand = "SELECT * FROM InterviewQuestionsDetails WHERE question_id = 8";
        // =========== running the sql command here ============ //
        $results = mysqli_query($conn, $sqlCommand);
        // ============ showing the results here =============== //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        foreach($all_results as $single_record) {
            return $single_record;
        }

    }catch(Exception $ex) {
        print($ex);
    }
}

$single_record = fecthQuestions($conn);

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

    <!-- the section for the main interviews page here ======= -->
    <div class="main-interviews-panel">
        <div class="main-interview-welcome-page">
            <h1>online interviews</h1>
        </div>
        
        <div class="welcome-interviews-cards">
            <!-- ============= the cards will be in a flex layout======= -->
            <div class="interviews-timeline">
                <div class="interviews-timeline-title">
                    <i class="bi bi-hourglass-top"></i>
                </div>
                <div class="interviews-timeline-header">
                    <h1>interviews timeline</h1>
                </div>
            </div>

            <div class="interview-score">
                <div class="interview-score-title">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
                <div class="interview-score-header">
                    <h1>interviews score</h1>
                </div>
            </div>

            <div class="interviews-answer-evaluation">
                <div class="interviews-answer-evaluation-title">
                    <i class="bi bi-funnel"></i>
                </div>
                <div class="interviews-answer-evaluation-header">
                    <h1>evaluated interviews</h1>
                </div>
            </div>

            <div class="interviews-personalisation">
                <div class="interviews-personalisation-title">
                    <i class="bi bi-cloud-download"></i>
                </div>
                <div class="interviews-personalisation-header">
                    <h1>personalised interviews</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="interview-questions-panel shadow-lg">
                    <div class="interview-question-panel-title">
                        <h1>questions</h1>
                    </div>

                    <!-- ============ the section for the questions will be here -->
                    <form action="applicant_interviews.php" method="POST">
                        <div class="row">
                            <div class="col">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
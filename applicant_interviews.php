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


// =================== function to get answers from the database here ================= //
function getAnswersFunc($conn) {
    try {
        $sqlCommand = "SELECT * FROM QuestionAnswerDetails";
        // =========== running the sql command here ============ //
        $results = mysqli_query($conn, $sqlCommand);
        // ============ showing the results here =============== //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        foreach($all_results as $single_answer) {
            return $single_answer;
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$single_answer = getAnswersFunc($conn);


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
                    <div class="interviews-questions-panel-area">
                        <form action="applicant_interviews.php" method="POST">

                            <div class="row mb-3">
                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 1: <?php echo($single_record["question_1"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="flexRadioDefault2" value="<?php echo($single_answer["question_1"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <?php echo($single_answer["question_1"]); ?>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>

                                <!-- ================ // second column will be here =========== -->

                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 2: <?php echo($single_record["question_2"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_2" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_2" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_2" id="flexRadioDefault1" value="<?php echo($single_answer["question_2"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <?php echo($single_answer["question_2"]); ?>
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_2" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>
                                <!-- ==================== // -->
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 3: <?php echo($single_record["question_3"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_3" id="flexRadioDefault1" value="<?php echo($single_answer["question_3"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <?php echo($single_answer["question_3"]); ?>
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_3" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_3" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_3" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>

                                <!-- ================ // second column will be here =========== -->

                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 4: <?php echo($single_record["question_4"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_4" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_4" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_4" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_4" id="flexRadioDefault2" value="<?php echo($single_answer["question_4"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <?php echo($single_answer["question_4"]); ?>
                                            </label>
                                        </div>

                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>
                                <!-- ==================== // -->
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 5: <?php echo($single_record["question_5"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_5" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_5" id="flexRadioDefault2" value="<?php echo($single_answer["question_5"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <?php echo($single_answer["question_5"]); ?>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_5" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_5" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>

                                <!-- ================ // second column will be here =========== -->

                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 6: <?php echo($single_record["question_6"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_6" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_6" id="flexRadioDefault2" value="<?php echo($single_answer["question_6"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <?php echo($single_answer["question_6"]); ?>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_6" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_6" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>
                                <!-- ==================== // -->
                            </div>


                            <div class="row mb-3">
                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 7: <?php echo($single_record["question_7"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_7" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_7" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_7" id="flexRadioDefault1" value="<?php echo($single_answer["question_7"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <?php echo($single_answer["question_1"]); ?>
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_7" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>

                                <!-- ================ // second column will be here =========== -->

                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 8: <?php echo($single_record["question_8"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_8" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_8" id="flexRadioDefault2" value="<?php echo($single_answer["question_8"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <?php echo($single_answer["question_8"]); ?>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_8" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_8" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>
                                <!-- ==================== // -->
                            </div>



                            <div class="row mb-3">
                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 9: <?php echo($single_record["question_9"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_9" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_9" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_9" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_9" id="flexRadioDefault2" value="<?php echo($single_answer["question_9"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <?php echo($single_answer["question_9"]); ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>

                                <!-- ================ // second column will be here =========== -->

                                <div class="col">
                                    <?php if ($single_record) :?>
                                        <p>Question 10: <?php echo($single_record["question_10"]); ?></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_10" id="flexRadioDefault1" value="<?php echo($single_answer["question_10"]); ?>">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <?php echo($single_answer["question_10"]); ?>
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_10" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_10" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_10" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>

                                    <?php endif; ?>
                                    <!-- ===================== // second question will be available here ======== -->
                                </div>
                                <!-- ==================== // -->
                            </div>

                            <div class="saving-questions-panel ms-2 mt-3 mb-5">
                                <input type="submit" class="btn btn-lg btn-primary" value="send interview responses">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
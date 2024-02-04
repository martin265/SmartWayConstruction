<?php
// getting the connection here
include("Connection/connection.php");
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection(); 
$conn = $connection->get_connection();

// ============ // function to validate the input fields here // =============== //
$applicant = "";
$question_1 = "";
$question_2 = "";
$question_3 = "";
$question_4 = "";
$question_5 = "";
$question_6 = "";
$question_7 = "";
$question_8 = "";
$question_9 = "";
$question_10 = "";
$interview_duration = "";
$interview_date = "";
$saved_question = "";
$question_answer = "";


function ValidateInputs($data) {
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }catch(Exception $ex) {
        print($ex);
    }
}

// function to get the applicants here //
function FetchApplicants($conn) {
    try {
        // getting the connection here //
        $sqlCommand = "SELECT * FROM ApplicationDetails";
        // =========== // running the query here ============ //
        $results = mysqli_query($conn, $sqlCommand);
        // ========== changing the results to associative array =========== //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $all_results;

    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = FetchApplicants($conn);

// ============== function will be used to save the answers to the questions ================ //
$answers_errors = array("saved_question"=>"", "question_answer"=>"");
// =========== validating the inputs here ================ //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $saved_question = ValidateInputs($_POST["saved_question"]);
    $question_answer = ValidateInputs($_POST["question_answer"]);
    // ============ making sure that the input fileds are not empty here =============== //
    if (isset($_POST["save-question-answer"])) {
        // ================ // ======================= //
        if (empty($_POST["saved_question"])) {
            $answers_errors["saved_question"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $saved_question)) {
                $answers_errors["saved-question"] = "provide valid characters please";
            }
        }
        //  ======================= // ==================== //
        if (empty($_POST["question_answer"])) {
            $answers_errors["question_answer"] = "fill in the blanks";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_answer)) {
                $answers_errors["question_answer"] = "provide the valid answer for the question";
            }
        }
    }
}



// ============= the array for the errors here ============== //
$all_errors = array("applicant"=>"", "question_1"=>"", "question_2"=>"", "question_3"=>"", "question_4"=>"",
"question_5"=>"", "question_6"=>"", "question_7"=>"", "question_8"=>"", "question_9"=>"", "question_10"=>"", "interview_duration"=>"", "interview_date"=>"", "question_answer"=>"", "saved_question"=>"");

// =========== checking is the button is set ==========//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_1 = ValidateInputs($_POST["question_1"]);
    $question_2 = ValidateInputs($_POST["question_2"]);
    $question_3 = ValidateInputs($_POST["question_3"]);
    $question_4 = ValidateInputs($_POST["question_4"]);
    $question_5 = ValidateInputs($_POST["question_5"]);
    $question_6 = ValidateInputs($_POST["question_6"]);
    $question_7 = ValidateInputs($_POST["question_7"]);
    $question_8 = ValidateInputs($_POST["question_8"]);
    $question_9 = ValidateInputs($_POST["question_9"]);
    $question_10 = ValidateInputs($_POST["question_10"]);
    $interview_duration = ValidateInputs($_POST["interview_duration"]);
    $interview_date = ValidateInputs($_POST["interview_date"]);


    // ============ validating if the fields are empty here ========= //
    if (isset($_POST["save_details"])) {

        if(empty($_POST["applicant"])) {
            $all_errors["applicant"] = "enter appplicant";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $applicant)) {
                $all_errors["applicant"] = "enter valid characters";
            }
        }
        //  ====================== // ====================== //
        if(empty($_POST["question_1"])) {
            $all_errors["question_1"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_1)) {
                $all_errors["question_1"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_2"])) {
            $all_errors["question_2"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_2)) {
                $all_errors["question_2"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_3"])) {
            $all_errors["question_3"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_3)) {
                $all_errors["question_3"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_4"])) {
            $all_errors["question_4"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_4)) {
                $all_errors["question_4"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_5"])) {
            $all_errors["question_5"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_5)) {
                $all_errors["question_5"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_6"])) {
            $all_errors["question_6"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_6)) {
                $all_errors["question_6"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_7"])) {
            $all_errors["question_7"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_7)) {
                $all_errors["question_7"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_8"])) {
            $all_errors["question_8"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_8)) {
                $all_errors["question_8"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_9"])) {
            $all_errors["question_9"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_9)) {
                $all_errors["question_9"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_10"])) {
            $all_errors["question_10"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $question_10)) {
                $all_errors["question_10"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["interview_duration"])) {
            $all_errors["interview_duration"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $interview_duration)) {
                $all_errors["interview_duration"] = "enter valid characters";
            }
        }

        // ============= // the other question will be here ============== //
        if(empty($_POST["interview_date"])) {
            $all_errors["interview_date"] = "enter your question";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $interview_duration)) {
                $all_errors["interview_date"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if (array_filter($all_errors)) {

        }
        else {

        }
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
    <!-- including the side navigation bar here -->
    <div class="main-content-container">
        <div class="side-navigation-area">
            <!-- the dashboard side navigation will be here -->
            <?php include("administrator_sidebar.php"); ?>
        </div>
        
        <div class="content-area">
            <!-- the question will appear here -->
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="interview-questions-panel">
                            <div class="interview-page-title">
                                <h1>create questions</h1>
                                <p>
                                    All the questions created will be associated with an answer, and mark, 
                                    so if the applicant select a wrong response the system will automatically
                                    calculate the mark...
                                </p>
                            </div>

                            <!-- the questions panel here -->
                            <div class="questions-panel">
                                <form action="administrator_interview_questions.php" method="POST">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col ms-3 me-3">
                                                <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Select Applicant</span>
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-emoji-laughing"></i></span>
                                                    <select name="applicant" id="" class="form-control form-control-lg">
                                                        <?php if ($all_results):?>
                                                            <?php foreach($all_results as $single_record) {?>
                                                                <option value="<?php echo($single_record["first_name"] . " " . $single_record["last_name"]); ?>"><?php echo($single_record["first_name"] . " " . $single_record["last_name"]); ?></option>
                                                            <?php }?>
                                                        <?php else:?>
                                                            <option value="Applicants">Applicants</option>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                                <!-- =============== // the error will be shown here =======  -->
                                                <div class="error-message">
                                                    <?php echo($all_errors["applicant"]); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ================= the area for the questiosn here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 1</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_1" class="form-control form-control-lg" placeholder="question one">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                             <div class="showing-error">
                                                <?php echo($all_errors["question_1"]); ?>
                                            </div>
                                        </div>

                                        <!--  =========== the second question will be here =============== -->
                                        <div class="col me-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 2</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_2" class="form-control form-control-lg" placeholder="question two">
                                            </div>
                                            <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                    <?php echo($all_errors["question_2"]); ?>
                                                </div>
                                        </div>
                                    </div>

                                    <!-- ================= the area for the questiosn here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 3</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_3" class="form-control form-control-lg" placeholder="question three">
                                            </div>
                                            <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_3"]); ?>
                                            </div>
                                        </div>

                                        <!--  =========== the second question will be here =============== -->
                                        <div class="col me-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 4</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_4" class="form-control form-control-lg" placeholder="question four">
                                            </div>
                                            <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_4"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================= the area for the questiosn here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 5</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_5" class="form-control form-control-lg" placeholder="question five">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_5"]); ?>
                                            </div>
                                        </div>

                                        <!--  =========== the second question will be here =============== -->
                                        <div class="col me-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 6</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_6" class="form-control form-control-lg" placeholder="question six">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_6"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================= the area for the questiosn here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question seven</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_7" class="form-control form-control-lg" placeholder="question seven">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_7"]); ?>
                                            </div>
                                        </div>

                                        <!--  =========== the second question will be here =============== -->
                                        <div class="col me-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question eight</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_8" class="form-control form-control-lg" placeholder="question eight">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_8"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================= the area for the questiosn here ============ -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 9</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_9" class="form-control form-control-lg" placeholder="question nine">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_9"]); ?>
                                            </div>
                                        </div>

                                        <!--  =========== the second question will be here =============== -->
                                        <div class="col me-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Question 10</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="question_10" class="form-control form-control-lg" placeholder="question ten">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["question_10"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =========== for the hourse and the actual date for the questions here -->
                                    <div class="row mb-3">
                                        <div class="col ms-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Interview Duration</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-clock-history"></i></span>
                                                <input type="number" name="interview_duration" class="form-control form-control-lg" placeholder="add duration...">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                             <div class="error-message">
                                                <?php echo($all_errors["interview_duration"]); ?>
                                            </div>
                                        </div>

                                        <!--  =========== the second question will be here =============== -->
                                        <div class="col me-3">
                                            <label for="ForApplicant fw-bold">
                                                    <span class="fw-bold">Interview Date</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-patch-question"></i></span>
                                                <input type="text" name="interview_date" class="form-control form-control-lg" id="ApplicationDeadlineDate" value="12-02-2024">
                                            </div>
                                             <!-- =============== // the error will be shown here =======  -->
                                            <div class="error-message">
                                                <?php echo($all_errors["applicant"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== // ================= //  -->
                                    <div class="save-details-button ms-3 mb-5">
                                        <input type="submit" name="save_details" class="btn btn-primary btn-lg" value="save details">
                                    </div>

                                    <!-- ============= the section to select a question and add an anser here -->
                                    <div class="add-answers-panel">
                                        <div class="add-answers-title">
                                            <h1>add answers to the questions</h1>
                                            <p>each answer that you add will be associated to a partcular 
                                                question, this includes for all the ten questions to be created...
                                            </p>
                                        </div>

                                        <div class="answers-panel">
                                            <div class="row mb-2">
                                                <div class="col ms-3 me-3">
                                                    <label for="ForQuestion">Select Question</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-fire"></i></span>
                                                        <select name="saved_question" id="" class="form-control form-control-lg">
                                                            <option value="Applicant">Question</option>
                                                        </select>
                                                    </div>
                                                    <div class="error-message">
                                                        <?php echo($all_errors["saved_question"]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ================ the input for the answers here ========= -->
                                            <div class="row mb-2">
                                                <div class="col ms-3 me-3">
                                                    <label for="ForResponse">Provide answer</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-fire"></i></span>
                                                        <input type="text" name="question_answer" class="form-control form-control-lg" placeholder="provide your answer...">
                                                    </div>
                                                    <div class="error-message">
                                                        <?php echo($all_errors["question_answer"]); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="save-response-section mb-5 ms-3 mt-3">
                                                <input type="submit" class="btn btn-primary btn-lg" name="save-question-answer" value="save answers">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your Datepicker Initialization Script -->
    <script type="text/javascript">
        // ============getting the signature date here
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#ApplicationDeadlineDate').datepicker({
                autoclose: true
            });
        });
        // ============= the code for the input validations ===============//
    </script>
</body>
</html>
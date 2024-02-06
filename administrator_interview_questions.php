<?php
// getting the connection here
include("Model/");
$connection = new Connection("localhost", "root", "", "SmartWayConstruction");
$connection->EstablishConnection(); 
$conn = $connection->get_connection();

// ============ // function to validate the input fields here // =============== //
$applicant_name = "";
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

// ================ function to get the ID of the selected applicant ================ //
function FetchClientID($conn) {
    try {
        if (isset($_POST["save_details"])) {
            $applicant_name = mysqli_real_escape_string($conn, $_POST["applicant_name"]);
            $sqlCommand = "SELECT application_id FROM ApplicationDetails WHERE first_name = '$applicant_name'";
            $results = mysqli_query($conn, $sqlCommand);
            // =========== fetching the patient id here ==========//
            $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
            // ========== looping through the results ============= //
            foreach($all_results as $single_result) {
                return $single_result["application_id"];
            }
        }
    } catch(Exception $ex) {
        // Handle exceptions here
        print($ex);
        return false;
    }
}

$applicant_id = FetchClientID($conn);

// ================ the function to get all the questions here ================ //
function fetchAllQuestions($conn) {
    try {
        $sqlCommand = "SELECT * FROM InterviewQuestionsDetails"; 
        // =========== getting the results here ============= //
        $results = mysqli_query($conn, $sqlCommand);
        // ============ converting them into an array ============= //
        $all_questions = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $all_questions;

    }catch(Exception $ex) {
        print($ex);
    }
}
// =============== // ====================== //
$all_questions = fetchAllQuestions($conn);


// ============= the function to get the current id for the select question ============== //
function getCurrentQuestionID($conn) {

}

// ============== function will be used to save the answers to the questions ================ //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // getting the inputs here ============ //
    if (isset($_POST["save_all_answers"])) {
        $question1 = mysqli_real_escape_string($conn, $_POST["question1"]);
        $question2 = mysqli_real_escape_string($conn, $_POST["question2"]);
        $question3 = mysqli_real_escape_string($conn, $_POST["question3"]);
        $question4 = mysqli_real_escape_string($conn, $_POST["question4"]);
        $question5 = mysqli_real_escape_string($conn, $_POST["question5"]);
        $question6 = mysqli_real_escape_string($conn, $_POST["question6"]);
        $question7 = mysqli_real_escape_string($conn, $_POST["question7"]);
        $question8 = mysqli_real_escape_string($conn, $_POST["question8"]);
        $question9 = mysqli_real_escape_string($conn, $_POST["question9"]);
        $question10 = mysqli_real_escape_string($conn, $_POST["question10"]);

        // =================== getting the answers here =================== //
        $answer_question_1 = isset($conn, $_POST["answer_question_1"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_1"]) : "";
        $answer_question_2 = isset($conn, $_POST["answer_question_2"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_2"]) : "";
        $answer_question_3 = isset($conn, $_POST["answer_question_3"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_3"]) : "";
        $answer_question_4 = isset($conn, $_POST["answer_question_4"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_4"]) : "";
        $answer_question_5 = isset($conn, $_POST["answer_question_5"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_4"]) : "";
        $answer_question_6 = isset($conn, $_POST["answer_question_6"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_6"]) : "";
        $answer_question_7 = isset($conn, $_POST["answer_question_7"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_7"]) : "";
        $answer_question_8 = isset($conn, $_POST["answer_question_8"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_8"]) : "";
        $answer_question_9 = isset($conn, $_POST["answer_question_9"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_9"]) : "";
        $answer_question_10 = isset($conn, $_POST["answer_question_10"]) ? mysqli_real_escape_string($conn, $_POST["answer_question_10"]) : "";
        

        // =================== getting the object for the class here ================= //
        $question_answers = new QuestionAnswers(
            $answer_question_1,
            $answer_question_2,
            $answer_question_3,
            $answer_question_4,
            $answer_question_5,
            $answer_question_6,
            $answer_question_7,
            $answer_question_8,
            $answer_question_9,
            $answer_question_10,
        );
        
        // ============ getting the id of the selected question here =========== //
        if ($question1) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_1 = '$question1'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_1_row = mysqli_fetch_assoc($results);
                $question_1_id = $question_1_row["question_id"];
                // ================== inserting the record for the first question here =============== //
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }
        if ($question2) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_2 = '$question2'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_2_row = mysqli_fetch_assoc($results);
                $question_2_id = $question_2_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question3) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_3 = '$question3'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_3_row = mysqli_fetch_assoc($results);
                $question_3_id = $question_3_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question4) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_4 = '$question4'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_4_row = mysqli_fetch_assoc($results);
                $question_4_id = $question_4_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question5) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_5 = '$question5'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_5_row = mysqli_fetch_assoc($results);
                $question_5_id = $question_5_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question6) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_6 = '$question6'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_6_row = mysqli_fetch_assoc($results);
                $question_6_id = $question_6_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question7) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_7 = '$question7'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_7_row = mysqli_fetch_assoc($results);
                $question_7_id = $question_7_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question8) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_7 = '$question7'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_8_row = mysqli_fetch_assoc($results);
                $question_8_id = $question_8_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question9) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_8 = '$question8'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_9_row = mysqli_fetch_assoc($results);
                $question_9_id = $question_9_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ==================== the other if state will be here ================ //
        if ($question10) {
            $sqlCommand = "SELECT question_id FROM InterviewQuestionsDetails WHERE question_9 = '$question9'";
            // ========== getting the results here ============== //
            $results = mysqli_query($conn, $sqlCommand);
            // ============ passing the results into an array here ============== //
            // ============ passing the results into an array here ============== //
            if ($results) {
                $question_10_row = mysqli_fetch_assoc($results);
                $question_10_id = $question_10_row["question_id"];
            } else {
                echo "Error fetching question 1 ID: " . mysqli_error($conn);
            }
        }

        // ========================= inserting the records into the database here ================ //



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

        if(empty($_POST["applicant_name"])) {
            $all_errors["applicant_name"] = "enter appplicant";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $applicant_name)) {
                $all_errors["applicant"] = "enter valid characters";
            }
        }
        //  ====================== // ====================== //
        if(empty($_POST["question_1"])) {
            $all_errors["question_1"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_1)) {
                $all_errors["question_1"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_2"])) {
            $all_errors["question_2"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_2)) {
                $all_errors["question_2"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_3"])) {
            $all_errors["question_3"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_3)) {
                $all_errors["question_3"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_4"])) {
            $all_errors["question_4"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_4)) {
                $all_errors["question_4"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_5"])) {
            $all_errors["question_5"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_5)) {
                $all_errors["question_5"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_6"])) {
            $all_errors["question_6"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_6)) {
                $all_errors["question_6"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_7"])) {
            $all_errors["question_7"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_7)) {
                $all_errors["question_7"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_8"])) {
            $all_errors["question_8"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_8)) {
                $all_errors["question_8"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_9"])) {
            $all_errors["question_9"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_9)) {
                $all_errors["question_9"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        if(empty($_POST["question_10"])) {
            $all_errors["question_10"] = "enter your question";
        }
        else {
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $question_10)) {
                $all_errors["question_10"] = "enter valid characters";
            }
        }
        // ============= // the other question will be here ============== //
        // ============= // the other question will be here ============== //
        if (!array_filter($all_errors)) {
            // getting inputs from the clients here ============== //
            $applicant_name = isset($conn, $_POST["applicant_name"]) ? mysqli_real_escape_string($conn, $_POST["applicant_name"]) : "";
            $question_1 = isset($conn, $_POST["question_1"]) ? mysqli_real_escape_string($conn, $_POST["question_1"]) : "";
            $question_2 = isset($conn, $_POST["question_2"]) ? mysqli_real_escape_string($conn, $_POST["question_2"]) : "";
            $question_3 = isset($conn, $_POST["question_3"]) ? mysqli_real_escape_string($conn, $_POST["question_3"]) : "";
            $question_4 = isset($conn, $_POST["question_4"]) ? mysqli_real_escape_string($conn, $_POST["question_4"]) : "";
            $question_5 = isset($conn, $_POST["question_5"]) ? mysqli_real_escape_string($conn, $_POST["question_5"]) : "";
            $question_6 = isset($conn, $_POST["question_6"]) ? mysqli_real_escape_string($conn, $_POST["question_6"]) : "";
            $question_7 = isset($conn, $_POST["question_7"]) ? mysqli_real_escape_string($conn, $_POST["question_7"]) : "";
            $question_8 = isset($conn, $_POST["question_8"]) ? mysqli_real_escape_string($conn, $_POST["question_8"]) : "";
            $question_9 = isset($conn, $_POST["question_9"]) ? mysqli_real_escape_string($conn, $_POST["question_9"]) : "";
            $question_10 = isset($conn, $_POST["question_10"]) ? mysqli_real_escape_string($conn, $_POST["question_10"]) : "";
            $interview_duration = isset($conn, $_POST["interview_duration"]) ? mysqli_real_escape_string($conn, $_POST["interview_duration"]) : "";
            $interview_duration = isset($conn, $_POST["interview_date"]) ? mysqli_real_escape_string($conn, $_POST["interview_date"]) : "";

            // ============== creating the class object here ================== //
            $interviewQuestions = new InterviewQuestions(
                $question_1,
                $question_2,
                $question_3,
                $question_4,
                $question_5,
                $question_6,
                $question_7,
                $question_8,
                $question_9,
                $question_10,
                $interview_duration,
                $interview_date,
            );

            // =============== getting the function to save the details here ========== //
            $interviewQuestions->saveQuestions(
                $applicant_name,
                $applicant_id
            );
            $success_message = 'questions saved successfully';
        }
        else {
            $error_message = "the form has errors";
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

                            <!-- ================ // the success message will be here ------------ -->
                            <div class="success-message">
                                <?php if (isset($success_message)) : ?>
                                    <div id="successAlert" class="alert alert-success w-50" role="alert">
                                        <?php echo $success_message; ?>
                                    </div>
                                    <script>
                                        // Automatically dismiss the success alert after 5 seconds
                                        setTimeout(function() {
                                            document.getElementById("successAlert").style.display = "none";
                                        }, 5000);
                                    </script>
                                    <?php elseif (isset($error_message)) : ?>
                                        <div class="alert alert-danger w-50" role="alert" id="errorAlert">
                                            <?php echo($error_message); ?>
                                        </div>
                                        <script>
                                            // Automatically dismiss the success alert after 5 seconds
                                            setTimeout(function() {
                                                document.getElementById("errorAlert").style.display = "none";
                                            }, 5000);
                                        </script>
                                <?php endif; ?>
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
                                                    <select name="applicant_name" id="" class="form-control form-control-lg">
                                                        <?php if ($all_results):?>
                                                            <?php foreach($all_results as $single_record) {?>
                                                                <option value="<?php echo($single_record["first_name"]); ?>"><?php echo($single_record["first_name"]); ?></option>
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
                                             <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                             <div class="error-message ms-2">
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
                                            <div class="error-message ms-2">
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
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 1</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question1" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_1"]); ?>"><?php echo($single_question["question_1"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question1">Question 1</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_1" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ============ the other container will be here ======= -->
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 2</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question2" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_2"]); ?>"><?php echo($single_question["question_2"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question1">Question 1</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_2" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ==========// ==================== // -->
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 3</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question3" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_3"]); ?>"><?php echo($single_question["question_3"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question1">Question 1</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_3" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- ============ the end of the panel here ======== -->
                                        <div class="answers-panel">
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 4</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question4" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_4"]); ?>"><?php echo($single_question["question_4"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question4">Question 4</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_4" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ============ the other container will be here ======= -->
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 5</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question5" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_5"]); ?>"><?php echo($single_question["question_5"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question1">Question 5</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_5" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ==========// ==================== // -->
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 6</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question6" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_6"]); ?>"><?php echo($single_question["question_6"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question6">Question 6</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_6" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- ===================== // the other panel for the adding questions here ========== // -->
                                        <!-- ============ the end of the panel here ======== -->
                                        <div class="answers-panel">
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 7</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question7" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_7"]); ?>"><?php echo($single_question["question_7"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question7">Question 7</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_7" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ============ the other container will be here ======= -->
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 8</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question8" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_8"]); ?>"><?php echo($single_question["question_8"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question1">Question 5</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_8" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ==========// ==================== // -->
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 9</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question9" id="" class="form-control form-control-lg">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_9"]); ?>"><?php echo($single_question["question_9"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question9">Question 9</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_9" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- =================== // ========================== -->


                                        <div class="answers-panel">
                                            <div class="answer-container-panel">
                                                <!-- ============= the div that will hold the first question here -->
                                                <div class="row mt-2">
                                                    <span class="text-center lead fw-bolder mb-3 text-capitalize">question 10</span>
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Select Question</label>
                                                        <select name="question10" id="" class="form-control form-control-lg w-100">
                                                            <?php if($all_questions):?>
                                                                <?php foreach($all_questions as $single_question) {?>
                                                                    <option value="<?php echo($single_question["question_10"]); ?>"><?php echo($single_question["question_10"]); ?></option>
                                                                <?php }; ?>
                                                            <?php else:?>
                                                                <option value="question10">Question 10</option>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- =========== input for the response will be here -->
                                                <div class="row mb-2">
                                                    <div class="col ms-2 me-2">
                                                        <label for="ForAnswer" class="fw-bold ms-2">Enter your answer</label>
                                                        <input type="text" name="answer_question_10" class="form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- =================== // ================== // -->
                                        <div class="button-panel mt-4 mb-4 ms-3 d-left justify-center">
                                            <input type="submit" class="btn btn-lg btn-primary m-50" value="save all answers" name="save_all_answers">
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
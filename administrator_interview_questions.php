<?php
// getting the connection here
include("Connection/connection.php");

// ============ // function to validate the input fields here // =============== //


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
                                                        <option value="Applicant">Applicants</option>
                                                    </select>
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
                                        </div>
                                    </div>

                                    <!-- ===================== // ================= //  -->
                                    <div class="save-details-button ms-3 mb-5">
                                        <input type="text" name="save_details" class="btn btn-primary btn-lg" value="save details">
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
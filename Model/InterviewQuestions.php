<?php
// ============ getting the connection here ============= //
include("Connection/connection.php");

class InterviewQuestions {
    public $applicant_name;
    public $question_1;
    public $question_2;
    public $question_3;
    public $question_4;
    public $question_5;
    public $question_6;
    public $question_7;
    public $question_8;
    public $question_9;
    public $question_10;
    public $interview_duration;
    public $interview_date;
    public $connection;

    // ============ the constructor for the class will be here =========== //
    public function __construct($question_1, $question_2,$question_3,$question_4,$question_5,$question_6,$question_7,$question_8,$question_9,$question_10, $interview_duration, $interview_date)
    {
        $this->question_1 = $question_1;
        $this->question_2 = $question_2;
        $this->question_3 = $question_3;
        $this->question_4 = $question_4;
        $this->question_5 = $question_5;
        $this->question_6 = $question_6;
        $this->question_7 = $question_7;
        $this->question_8 = $question_8;
        $this->question_9 = $question_9;
        $this->question_10 = $question_10;
        $this->interview_duration = $interview_duration;
        $this->interview_date = $interview_date;
        // passing the database connection here ============= //
        $this->connection = new Connection("localhost", "root", "", "SmartWayConstruction");
    }

    // ============== the getter for the connection will be here ================ //
    public function get_connection() {
        return $this->connection;
    }

    // ================ function to insert the records into the database here ============ //
    public function saveQuestions($applicant_name, $applicant_id) {
        try {
            // getting the connection with the databse here ============= //
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            // ============== the query for inserting the records will be here ======== //
            $sqlCommand = $conn->prepare(
                "INSERT INTO InterviewQuestionsDetails(
                    question_1, question_2, question_3, question_4, question_5,
                    question_6, question_7, question_8, question_9, question_10,
                    interview_duration, interview_date, applicant_name, application_id
                ) VALUES(
                    ?,?,?,?,?,?,?,?,?,?,?,?,?,?
                )"
            );
            //$this->allNotNull();
            // ============ passing the parameters to the prepared statement here ========= //
            $sqlCommand->bind_param(
                "ssssssssssssss",
                $this->question_1, $this->question_2, $this->question_3, $this->question_4,
                $this->question_5, $this->question_6, $this->question_7, $this->question_8,
                $this->question_9,  $this->question_10, $this->interview_duration, $this->interview_date,
                $applicant_name, $applicant_id
            );

            // =========== running the databse query here ================ //
            $sqlCommand->execute();
        }catch(Exception $ex) {
            print($ex);
        }

    }

    // ==================== function to save the answers here =========================== //
    public function saveQuestionAnswers($applicant_name, $applicant_id) {
        try {
            // getting the connection with the databse here ============= //
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            // ============== the query for inserting the records will be here ======== //
            $sqlCommand = $conn->prepare(
                "INSERT INTO QuestionAnswerDetails(
                    question_1, question_2, question_3, question_4, question_5,
                    question_6, question_7, question_8, question_9, question_10,
                    applicant_name, application_id
                ) VALUES(
                    ?,?,?,?,?,?,?,?,?,?,?,?
                )"
            );
            //$this->allNotNull();
            // ============ passing the parameters to the prepared statement here ========= //
            $sqlCommand->bind_param(
                "ssssssssssss",
                $this->question_1, $this->question_2, $this->question_3, $this->question_4,
                $this->question_5, $this->question_6, $this->question_7, $this->question_8,
                $this->question_9,  $this->question_10,
                $applicant_name, $applicant_id
            );

            // =========== running the databse query here ================ //
            $sqlCommand->execute();
        }catch(Exception $ex) {
            print($ex);
        }
    }

    // =============== function to allow the not null values ================= //
    private function allNotNull() {
        try {
            $this->applicant_name = $applicant_name ?? "";
            $this->question_1 = $question_1 ?? "";
            $this->question_2 = $question_2 ?? "";
            $this->question_3 = $question_3 ?? "";
            $this->question_4 = $question_4 ?? "";
            $this->question_5 = $question_5 ?? "";
            $this->question_6 = $question_6 ?? "";
            $this->question_7 = $question_7 ?? "";
            $this->question_8 = $question_8 ?? "";
            $this->question_9 = $question_9 ?? "";
            $this->question_10 = $question_10 ?? "";
            $this->interview_duration = $interview_duration ?? "";
            $this->interview_date = $interview_date ?? "";
        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>
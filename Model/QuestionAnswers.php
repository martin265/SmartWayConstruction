<?php

// ================ including the database connection here =============== //
include("Connection/connection.php");

class QuestionAnswers{
    public $applicant_name;
    public $answer_1;
    public $answer_2;
    public $answer_3;
    public $answer_4;
    public $answer_5;
    public $answer_6;
    public $answer_7;
    public $answer_8;
    public $answer_9;
    public $answer_10;
    public $connection;

    // ============ the constructor for the class will be here =========== //
    public function __construct($answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10)
    {
        $this->answer_1 = $answer_1;
        $this->answer_2 = $answer_2;
        $this->answer_3 = $answer_3;
        $this->answer_4 = $answer_4;
        $this->answer_5 = $answer_5;
        $this->answer_6 = $answer_6;
        $this->answer_7 = $answer_7;
        $this->answer_8 = $answer_8;
        $this->answer_9 = $answer_9;
        $this->answer_10 = $answer_10;
        // passing the database connection here ============= //
        $this->connection = new Connection("localhost", "root", "", "SmartWayConstruction");
    }

    // ============== the getter for the connection will be here ================ //
    public function get_connection() {
        return $this->connection;
    }

    // ================= function to insert the answers in corresspondence to the questions =========== //
    public function saveQuestionAnswers($applicant_name, $applicant_id) {
        try {
            // getting the connection with the databse here ============= //
            $this->connection->EstablishConnection();
            $conn = $this->connection->get_connection();
            // ============== the query for inserting the records will be here ======== //
            $sqlCommand = $conn->prepare(
                "INSERT INTO InterviewQuestionsDetails(
                    answer_1, answer_2, answer_3, answer_4, answer_5,
                    answer_6, answer_7, answer_8, answer_9, answer_10,
                    applicant_name, application_id
                ) VALUES(
                    ?,?,?,?,?,?,?,?,?,?,?,?,?,?
                )"
            );
            //$this->allNotNull();
            // ============ passing the parameters to the prepared statement here ========= //
            $sqlCommand->bind_param(
                "ssssssssssssss",
                $this->answer_1, $this->answer_2, $this->answer_3, $this->answer_4,
                $this->answer_5, $this->answer_6, $this->answer_7, $this->answer_8,
                $this->answer_9,  $this->answer_10,
                $applicant_name, $applicant_id
            );

            // =========== running the databse query here ================ //
            $sqlCommand->execute();
        }catch(Exception $ex) {
            print($ex);
        }
    }
}
?>
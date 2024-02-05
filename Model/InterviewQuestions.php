<?php

// ============ getting the connection here ============= //
include("Connection/connection.php");

$connection->EstablishConnection();
$conn = $connection->get_connection();

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
    public $current_question;
    public $answer;
    public $connection;

    // ============ the constructor for the class will be here =========== //
    public function __construct($applicant_name, $question_1, $question_2,$question_3,$question_4,$question_5,$question_6,$question_7,$question_8,$question_9,$question_10, $current_question, $answer)
    {
        $this->applicant_name = $applicant_name;
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
        $this->current_question = $current_question;
        $this->answer = $answer;
        // passing the database connection here ============= //
        $this->connection = mysqli_connect("localhost", "root", "", "SmartWayConstruction");
    }

    // ============== the getter for the connection will be here ================ //
    public function get_connection() {
        return $this->connection;
    }

    // ================ function to insert the records into the database here ============ //
    public function saveQuest
}

?>
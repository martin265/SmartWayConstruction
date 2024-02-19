<?php

// thank you Jesus Christ ==================//
function createDatabase() {
    include("Connection/connection.php");
    // ============ estabishing the connection here ============ //
    $connection = new Connection("localhost", "root", "", "SmartWayConstruction");
    $connection->EstablishConnection(); // establishing the connection here
    $conn = $connection->get_connection();

    // Drop database if it exists
    $sqlDropDatabase = "DROP DATABASE IF EXISTS SmartWayConstruction";
    if (mysqli_query($conn, $sqlDropDatabase)) {
        
    } else {
        echo "Error dropping database: " . mysqli_error($conn) . "\n";
    }
    
    // Create new database
    $sqlCreateDatabase = "CREATE DATABASE SmartWayConstruction";
    if (mysqli_query($conn, $sqlCreateDatabase)) {
        
    } else {
        echo "Error creating database: " . mysqli_error($conn) . "\n";
    }

    $connection->CreateApplicationDetails();
    $connection->createInterviewQuestionTable();
    $connection->CreateJobDetailsTable();
    $connection->createQuestionAnswerTable();

    header("Location: administrator_index.php");

}

createDatabase();

?>
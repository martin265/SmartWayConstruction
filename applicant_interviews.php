<?php

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
            </div>
            <div class="interview-score">
                <div class="interview-score-title">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
            </div>
            <div class="interviews-answer-evaluation">
                <div class="interviews-answer-evaluation">
                    <i class="bi bi-funnel"></i>
                </div>
            </div>
            <div class="interviews-personalisation">
                <div class="interviews-personalisation-title">
                    <i class="bi bi-cloud-download"></i>
                </div>
            </div>
        </div>
    </div>
     
</body>
</html>
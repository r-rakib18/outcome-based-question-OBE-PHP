<?php

session_start();
$message = null;
if (isset($_GET['logout'])) {
    require_once 'class/login.php';
    $logout = new login();
    $logout->logout();
}

require_once 'class/GenerateQuestionSetClass.php';
$question_id = $_GET['question_id'];
$question_list = new GenerateQuestionSetClass();
$query_result = $question_list->finalQuestionMaster($question_id);
$query_details = $question_list->finalQuestionDetails($question_id);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Question</title>
    <style>
        ul li {
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-3">
                <div>
                    <h5 class="text-center font-weight-bold">Bangladesh university of business and technology(BUBT)</h5>
                </div>
                <div>
                    <h6 class="font-weight-bold offset-2">Department of Computer Science and Engineering</h6>
                </div>

                <div class="offset-3">
                    <p>
                        <span class="font-weight-bold"><?php echo $query_result['exam_name']; ?> Term Examination:</span> <?php echo $query_result['semester_name']; ?>
                    </p>
                </div>

                <div class="row">
                    <div class="offset-2">
                        <p>Program: <span class="font-weight-bold">B.Sc. in CSE</span></p>
                    </div>
                    <div class="offset-3">
                        <p>intake: <span class="font-weight-bold">30th</span></p>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <p>Course Code: <span class="font-weight-bold"><?php echo $query_result['course_code']; ?></span>
                        </p>
                    </div>
                    <div class="offset-2">
                        <p>Course Title: <span class="font-weight-bold"><?php echo $query_result['course_title']; ?></span>
                        </p>
                    </div>
                    <div class="offset-2">
                        <div>
                            <p>Time:<span class="font-weight-bold">1.5 Hours</span></p>
                        </div>
                    </div>
                    <div class="offset-2">
                        <div>
                            <p>Total Marks:<span class="font-weight-bold">30</span></p>
                        </div>
                    </div>

                </div>
                <br>
                <?php foreach ($query_details as $query_detail) { ?>
                    <ul>
                        <?php
                        $getSetName = $question_list->getSetName($query_detail['question_set_id']);
                        $getSetDetails = $question_list->getSetDetails($query_detail['question_set_id']);
                        ?>
                        <h6><?php echo $getSetName['set_no'] ?></h6>
                        <?php foreach ($getSetDetails as $question_detail) { ?>
                            <?php
                            $questionDetails = $question_list->getquestionDetails(@$question_detail['question_id']);
                            ?>
                            <li>
                                <p><?php echo $questionDetails['question'] ?> <span class="font-weight-bold"><?php echo $questionDetails['marks'] ?> Marks</span></p>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>

    </div>

</body>

</html>
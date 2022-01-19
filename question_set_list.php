<?php

session_start();
$message = null;
if (isset($_GET['logout'])) {
    require_once 'class/login.php';
    $logout = new login();
    $logout->logout();
}

require_once 'class/GenerateQuestionSetClass.php';
$question_list = new GenerateQuestionSetClass();
$query_result = $question_list->getMyQuestionSet();

require_once 'class/question.php';
$question = new question();
$qry3 = $question->examType();
$qry4 = $question->getSemester();
$qry2 = $question->course_name();

if (isset($_POST['btn'])) {
    $message = $question_list->generateFinalQuestion($_POST);

}


?>
<style>
    table {

    }

    table thead th {
        white-space: nowrap;
    }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">My Question Set</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-success"><?php echo $message; ?></h5>

            <h6 class="text-danger">To Generate Final Question Check Question Set And Generate</h6>
            <div class="card card-body bg-light">
                <div class="table-responsive">
                    <form class="" method="post">
                        <div class="form-group">
                            <label for="email">Select Exam:</label>
                            <select name="exam_id" class="form-control exam_id">
                                <option disabled selected>--Select Exam--</option>
                                <?php while ($rec3 = mysqli_fetch_object($qry3)) { ?>
                                    <option value="<?php echo $rec3->exam_id; ?>"><?php echo $rec3->exam_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Select Semester</label>
                            <select name="semester_id" class="form-control course_id">
                                <option disabled selected>--Select Semester--</option>
                                <?php while ($sql4 = mysqli_fetch_object($qry4)) { ?>
                                    <option value="<?php echo @$sql4->semester_id; ?>"><?php echo $sql4->semester_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Course Code</label>
                            <select name="course_id" class="form-control course_id">
                                <option disabled selected>--Select Course Code--</option>
                                <?php while ($rec2 = mysqli_fetch_object($qry2)) { ?>
                                    <option value="<?php echo @$rec2->course_id; ?>"><?php echo $rec2->course_code . ' - ' . $rec2->course_title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Check</th>
                                <th>Program</th>
                                <th>Course Title</th>
                                <th>Set No</th>
                                <th>Question</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($query_result as $item) { ?>
                                <?php
                                $set_questions = $question_list->getSetQuestions($item['id']);
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="question_set_id[]"
                                               value="<?php echo $item['id'] ?>">
                                    </td>
                                    <td><?php echo $item['pro_name'] ?></td>
                                    <td><?php echo $item['course_title'] ?></td>
                                    <td><?php echo $item['set_no'] ?></td>
                                    <td>
                                        <table class="table" style="font-size: 12px">
                                            <?php foreach ($set_questions as $set_question) { ?>
                                                <tr>
                                                    <td><?php echo $set_question['question'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <input type="submit" name="btn" class="btn btn-block btn-success btn-sm" value="Generate">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
$query_result = $question_list->finalQuestionList();

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
        <li class="breadcrumb-item active">Final Question List</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-success"><?php echo $message; ?></h5>
            <div class="card card-body bg-light">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th>Semester</th>
                            <th>Exam Type</th>
                            <th>Course Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($query_result as $item) { ?>

                            <tr>
                                <td><?php echo $item['semester_name'] ?></td>
                                <td><?php echo $item['exam_name'] ?></td>
                                <td><?php echo $item['course_title'] ?></td>
                                <td>
                                    <a href='layout.php?page=final_question_details&question_id=<?php echo $item['id'] ?>'>Details</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

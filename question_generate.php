<?php
session_start();
$message = '';


if (isset($_GET['logout'])) {
    require_once 'class/login.php';
    $logout = new login();
    $logout->logout();

}

require_once 'class/question.php';
$question_list = new question();
$query_result = $question_list->question_list();
$qry2 = $question_list->course_name();
$qry3 = $question_list->examType();
$qry4 = $question_list->getSemester();
$qry5 = $question_list->getProgram();


require_once 'class/GenerateQuestionSetClass.php';
if (isset($_POST['question_save'])) {
    $data = $_POST;
    $object = new GenerateQuestionSetClass();
    $message = $object->generateQuestionSet($data);
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete = new question();
    $delete->Delete_question($delete_id);
}
?>

<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card bg-default">

                <h5 class="text-center text-success"><?php echo $message; ?></h5>

                <div class="card-body">
                    <form action="" class="" method="post">
                        <div class="form-group">
                            <label for="email">Select Program:</label>
                            <select name="program_id" class="form-control exam_id">
                                <option disabled selected>--Select Program--</option>
                                <?php while ($rec5 = mysqli_fetch_object($qry5)) { ?>
                                    <option value="<?php echo $rec5->pro_id; ?>"><?php echo $rec5->pro_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="email">Select Exam:</label>-->
<!--                            <select name="exam_id" class="form-control exam_id">-->
<!--                                <option disabled selected>--Select Exam--</option>-->
<!--                                --><?php //while ($rec3 = mysqli_fetch_object($qry3)) { ?>
<!--                                    <option value="--><?php //echo $rec3->exam_id; ?><!--">--><?php //echo $rec3->exam_name; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="pwd">Course Code</label>
                            <select name="course_id" class="form-control course_id">
                                <option disabled selected>--Select Course Code--</option>
                                <?php while ($rec2 = mysqli_fetch_object($qry2)) { ?>
                                    <option value="<?php echo @$rec2->course_id; ?>"><?php echo $rec2->course_code . ' - ' . $rec2->course_title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Set No</label>
                            <input type="text" name="set_no" placeholder="SET No." class="form-control"/>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="pwd">Select Semester</label>-->
<!--                            <select name="semester_id" class="form-control course_id">-->
<!--                                <option disabled selected>--Select Semester--</option>-->
<!--                                --><?php //while ($sql4 = mysqli_fetch_object($qry4)) { ?>
<!--                                    <option value="--><?php //echo @$sql4->semester_id; ?><!--">--><?php //echo $sql4->semester_name; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="pwd"> </label>
                            <button type="button" class="btn btn-info q_generate">generate</button>
                        </div>
                        <div class="question_append"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
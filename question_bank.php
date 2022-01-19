<?php
session_start();
if (isset($_GET['logout'])) {
    require_once 'class/login.php';         //logout er kaj kora hoyeche
    $logout = new login();
    $logout->logout();

}

require_once 'class/question.php';
$book_name = new question();
$query_result1 = $book_name->course_name();
$query_result2 = $book_name->book_name();
$query_result3 = $book_name->chapter();
$query_result4 = $book_name->outcome();

$message = '';
if (isset($_POST['btn'])) {
    require_once 'class/question.php';
    $save_question = new question();
    $message = $save_question->mulImageSaveQuestion($_POST);
}
$error = '';
if (isset($_SESSION['message'])) {
    $error = $_SESSION['message'];
}


?>


<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Question_bank</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body bg-light">
                <h5 class="text-center text-success"><?php echo $message; ?></h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Course ID</strong>
                        </label>
                        <div class="col-sm-10">
                            <select name="course_id" class="form-control">
                                <option disabled selected>--Select Course ID--</option>
                                <?php foreach ($query_result1 as $value) { ?>
                                    <option value="<?php echo $value['course_id']; ?>"><?php echo $value['course_code']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Book Name</strong></label>
                        <div class="col-sm-10">
                            <select name="book_name" id="book_name" class="form-control">
                                <option disabled selected>--Select Book Name--</option>
                                <?php foreach ($query_result2 as $value) { ?>
                                    <option value="<?php echo $value['book_id']; ?>"><?php echo $value['book_name']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Chapter</strong>
                        </label>
                        <div class="col-sm-10">
                            <select name="chapter" id="chapter" class="form-control">
                                <option disabled selected>--Select Chapter Name--</option>
                                <?php foreach ($query_result3 as $value) { ?>
                                    <option value="<?php echo $value['chapter_no']; ?>"><?php echo $value['chapter_no']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Outcome</strong>
                        </label>
                        <div class="col-sm-10">
                            <select name="outcome" class="form-control">
                                <option disabled selected>--Select Course ID--</option>
                                <?php foreach ($query_result4 as $value) { ?>
                                    <option value="<?php echo $value['outcome_code']; ?>"><?php echo $value['outcome_code']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3"
                               class="col-sm-2 col-form-label"><strong>Marks</strong></label>
                        <div class="col-sm-10">
                            <input type="number" name="marks" max="10" min="1" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3"
                               class="col-sm-2 col-form-label"><strong>Question</strong></label>
                        <div class="col-sm-10">
                                        <textarea type="text" id="myeditor" name="question"
                                                  class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Select
                                Image</strong></label>
                        <div class="col-sm-10">
                            <input type="file" name="file[]" multiple>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="offset-md-2 col-sm-10">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save
                                Question
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
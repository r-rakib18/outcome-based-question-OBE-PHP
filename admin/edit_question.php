<?php
session_start();
if (isset($_GET['logout']))
{
    require_once '../class/login.php';         //logout er kaj kora hoyeche
    $logout = new login();
    $logout->logout();

}
    $edit_id = $_GET['edit'];
    require '../class/question.php';
    $id = new question();
    $query = $id->Edit_question($edit_id);
    $edit_info = mysqli_fetch_assoc($query);

    require_once '../class/question.php';
    $book_name = new question();
    $query_result =$book_name->book_name();
    
    $query_result1 = $book_name->course_name();
    $query_result2 = $book_name->chapter();
    $query_result3 = $book_name->outcome();
    

if (isset($_POST['btn'])) {
    require_once '../class/question.php';
    $update_question = new question();
    $update_question->Update_question($_POST);
}




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Outcome Based Question Generator</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../asset/css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Outcome</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="exam_list.php">Exam List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="keyword_list.php">Keyword List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="book_list.php">Book List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="course_list.php">Course List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="program_list.php">Program List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="semester_list.php">Semester List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="book_chapter_list.php">Chapter List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="question_list.php">Question List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="course_offer_list.php">Course Offer List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="teacher_short_name.php">User List</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <!--<a class="nav-link" ><?php /*echo $_SESSION['admin_name'];*/?></a>-->
            <a class="nav-link" href="?logout=logout">Logout</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_dashboard.php">
                            <span data-feather="home"></span>
                            User <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="question_list.php">
                            <span data-feather="file-text"></span>
                            Question List
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Question Form</h1>
                
            </div>
            <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-md-1">
                    <div class="card card-body bg-light">
                        
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Course ID</strong> </label>
                                <div class="col-sm-10">
                                    <select name="course_id" class="form-control">
                                         <option>--Select Course ID--</option>
                                         <?php foreach ($query_result1 as $value) {?>
                                        <option value="<?php echo $value['course_id'];?>"><?php echo $value['course_code'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Book Name</strong></label>
                                <div class="col-sm-10">
                                    <select name="book_name" class="form-control">
                                        <option>--Select Book Name--</option>
                                        <?php foreach ($query_result as $value) {?>
                                        <option value="<?php echo $value['book_name'];?>"><?php echo $value['book_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Chapter</strong> </label>
                                <div class="col-sm-10">
                                    <select name="chapter" class="form-control">
                                         <option>--Select Chapter Name--</option>
                                        <?php foreach ($query_result2 as $value) {?>
                                        <option value="<?php echo $value['chapter_no'];?>"><?php echo $value['chapter_no'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Outcome</strong> </label>
                                <div class="col-sm-10">
                                    <select name="outcome" class="form-control">
                                        <option>--Select Course ID--</option>
                                        <?php foreach ($query_result3 as $value) {?>
                                        <option value="<?php echo $value['outcome_code'];?>"><?php echo $value['outcome_code'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Marks</strong></label>
                                <div class="col-sm-10">
                                    <input type="number" name="marks" value="<?php echo $edit_info['marks']; ?>" max="10" min="0" class="form-control">
                                    <input type="hidden" name="edit_id" value="<?php echo $edit_info['q_id']; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Question</strong></label>
                                <div class="col-sm-10">
                                    <textarea type="text" id="myeditor" name="question" class="form-control"><?php echo $edit_info['question']; ?></textarea>
                                </div>
                            </div>
                       <div class="form-group row">
                           <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Select Image</strong></label>
                        <div class="col-sm-10">
                            <input type="file" name="image" multiple accept="image/*">
                            <img height="50" width="50" src="<?php echo $edit_info['image'];?>">
                            
                        </div>
                    </div>
                            
                            <div class="form-group row">
                                <div class="offset-md-2 col-sm-10">
                                    <button type="submit" name="btn" class="btn btn-success btn-block" >Update Question</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
            
            

            

<script type="text/javascript" src="../asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
		CKEDITOR.replace('myeditor');
	</script>

<script src="../asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="../asset/js/feather.min.js"></script>
<script src="../asset/js/Chart.min.js"></script>
<script src="../asset/js/dashboard.js"></script></body>
</html>






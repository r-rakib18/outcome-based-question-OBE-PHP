<?php
session_start();

if ($_SESSION['admin_id']==null)
{
    header('Location:admin/index.php');
}


if (isset($_GET['logout']))
{
    require_once '../class/login.php';
    $logout = new login();
    $logout->admin_logout();

}
$message='';
if(isset($_POST['update_btn'])){

    require_once '../class/admin.php';
    $semester_name = new admin();
    $message=$semester_name->UpdateBookName($_POST);
}

$edit_id = $_GET['id'];
require_once '../class/admin.php';
$book_edit_name = new admin();
$query_result=$book_edit_name->EditBookName($edit_id);
$book_info=mysqli_fetch_assoc($query_result);

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
        <nav class="col-md-2 d-none d-md-block bg-info sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_dashboard.php">
                            <span data-feather="home"></span>
                            Admin <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_semester.php">
                            <span data-feather="file-text"></span>
                            Add semester
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_course.php">
                            <span data-feather="file-text"></span>
                            Add Course
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_program.php">
                            <span data-feather="file-text"></span>
                            Add Program
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_book.php">
                            <span data-feather="file-text"></span>
                            Add Book
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_chapter.php">
                            <span data-feather="file-text"></span>
                            Add Chapter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_exam.php">
                            <span data-feather="file-text"></span>
                            Add Exam
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_course_offer.php">
                            <span data-feather="file-text"></span>
                            Add Course Offer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_keyword.php">
                            <span data-feather="file-text"></span>
                            Add Keyword
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_teacher.php">
                            <span data-feather="file-text"></span>
                            Add Teacher
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-md-3" style=" margin-top:80px">
            <div class="card card-body bg-info">
                <form action="" method="post">
                    <h6 class="text-center text-danger"><?php echo $message;?></h6>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Book ID</strong></label>
                        <div class="col-sm-10">
                            <input type="text" name="book_id" class="form-control" value="<?php echo $book_info['book_id'];?>" >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Book Name</strong></label>
                        <div class="col-sm-10">
                            <input type="text" name="book_name" class="form-control" value="<?php echo $book_info['book_name'];?>">
                            <input type="hidden" name="id" value="<?php echo $book_info['book_id']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Author</strong></label>
                        <div class="col-sm-10">
                            <input type="text" name="author" class="form-control" value="<?php echo $book_info['author'];?>" >

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-md-2 col-sm-10">
                            <button type="submit" name="update_btn" class="btn btn-danger btn-block" >Update Book</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<script src="../asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="../asset/js/feather.min.js"></script>
<script src="../asset/js/Chart.min.js"></script>
<script src="../asset/js/dashboard.js"></script></body>
</html>

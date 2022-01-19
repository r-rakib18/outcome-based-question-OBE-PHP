<?php
session_start();
$message='';

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
    require_once '../class/admin.php';
    $book_program_list = new admin();
    $programme_list = $book_program_list->ProgrameNameList();

if (isset($_POST['see_book'])) {
    require_once '../class/admin.php';
    $book_name_list = new admin();
    $query_result = $book_name_list->BookNameListByprogram($_POST);
}else if (!isset($_POST['see_book'])){
    require_once '../class/admin.php';
    $book_name_list = new admin();
    $query_result = $book_name_list->LimitBookName();
}


if (isset($_SESSION['message'])){
    $message =$_SESSION['message'];
    unset($_SESSION['message']);
}



if (isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $delete_info =new admin();
    $delete_info->DeleteBookName($delete);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="col-lg-6 offset-md-4" style="margin-top:60px;">

            <form action="" method="post">
                <h5 class="text-center text-danger"><?php echo $message;?></h5>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Program Name</strong> </label>
                    <div class="col-sm-10">
                        <select name="program_name" class="form-control">
                            <option disabled selected>--Select program Name--</option>

                            <?php foreach ($programme_list as $value) {?>
                                <option  value="<?php echo $value['pro_id'];?>"><?php echo $value['pro_name'];?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-sm-10">
                        <button type="submit" name="see_book" class="btn btn-danger btn-block" >See Book</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="text-center text-capitalize text-success"><b>Book info will be listed here...</b></div>

            <div class="card card-body bg-dark">
                <div class="table-responsive">
                    <h5 class="text-center text-success"><?php echo $message;?></h5>
                    <table class="table table-striped table-sm table-bordered" style="color: white" >
                        <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Action</th

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($query_result as $book_name) {?>
                            <tr>
                                <td><?php echo $book_name['book_id'];?></td>
                                <td><?php echo $book_name['book_name'];?></td>
                                <td><?php echo $book_name['author'];?></td>
                                <td>
                                    <a href="edit_book.php?id=<?php echo $book_name['book_id'];?>" class="btn btn-success btn-sm">
                                        <span><strong>Edit</strong></span>
                                    </a>
                                        <a href="?delete=<?php echo $book_name['book_id']?>" class="btn btn-danger btn-sm">
                                            <span><strong>Delete</strong></span>
                                        </a>
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


<script src="../asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="../asset/js/feather.min.js"></script>
<script src="../asset/js/Chart.min.js"></script>
<script src="../asset/js/dashboard.js"></script></body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>

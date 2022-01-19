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

if(isset($_POST['active_btn'])){

    require_once '../class/admin.php';
    $active_status = new admin();
    $active_status->ActiveStatus($_POST);
}

if (isset($_POST['deactive_btn'])){
    require_once '../class/admin.php';
    $deactive_status = new admin();
    $deactive_status->DeactiveStatus($_POST);

}

if (isset($_POST['see_user'])) {
    require_once '../class/admin.php';
    $user_name_list = new admin();
    $teacher_list = $user_name_list->TeacherList($_POST);
}elseif (!isset($_POST['see_user'])){
    require_once '../class/admin.php';
    $user_name_list = new admin();
    $teacher_list = $user_name_list->TeacherNameByCourseOffer();

}
if (isset($_SESSION['message'])){
    $message =$_SESSION['message'];
    unset($_SESSION['message']);
}

if (isset($_GET['delete_teacher'])){
    $delete = $_GET['delete_teacher'];
    $delete_info =new admin();
    $delete_info->DeleteTecherInfo($delete);
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
<h5 class="text-center text-success"><?php echo $message;?></h5>
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-md-2" style="margin-top:100px;">
            <div class="card card-body bg-dark">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-bordered" style="color: white" >
                        <thead>
                        <tr>
                            <th>SI No</th>
                            <th>Teacher Name</th>
                            <th>Short Code</th>
                            <th>Teacher Email</th>
                            <th>Teacher Dept</th>
                            <th>Designation</th>
                            <th>Action</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; while ($teacher_name=mysqli_fetch_assoc($teacher_list)) {?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $teacher_name['teacher_name'];?></td>
                                <td><?php echo $teacher_name['short_name'];?></td>
                                <td><?php echo $teacher_name['teacher_email'];?></td>
                                <td><?php echo $teacher_name['teacher_dept'];?></td>
                                <td><?php echo $teacher_name['teacher_designation'];?></td>
                                <td>

                                    <a href="edit_teacher.php?id=<?php echo $teacher_name['teacher_id'];?>" class="btn btn-success btn-sm">
                                        <span><strong>Edit</strong></span>
                                    </a>
                                        <a href="?delete_teacher=<?php echo $teacher_name['teacher_id']?>" class="btn btn-danger btn-sm">
                                            <span><strong>Delete</strong></span>
                                        </a>
                                </td>
                                <td>

                                    <form action="" method="post">
                                        <?php if($teacher_name['teacher_status']==1){?>
                                            <button type="submit" name="active_btn" class="btn btn-success btn-sm" value="0">Active</button>
                                            <input type="hidden" name="id" value="<?php echo $teacher_name['teacher_id'];?>">

                                        <?php }?>

                                        <?php if ($teacher_name['teacher_status']==0){ ?>
                                            <button type="submit" name="deactive_btn" class="btn btn-danger btn-sm" value="1">Deactive</button>
                                            <input type="hidden" name="de_id" value="<?php echo $teacher_name['teacher_id'];?>">

                                        <?php }?>

                                    </form>

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
</html>

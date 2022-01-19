<?php
session_start();

if (isset($_GET['logout']))
{
    require_once 'class/login.php';         
    $logout = new login();
    $logout->logout();

}

if(isset($_GET['delete']))
{
    $delete_id = $_GET['delete'];
    $delete = new question();
    $delete->Delete_question($delete_id);
    
}

if(isset($_POST['search_btn']))
{
    
    require_once 'class/question.php';
    
    $search = new question();
    $search_result = $search->Search($_POST);
}elseif (!$_POST['search_btn']){

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
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">


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
    <link href="asset/css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Outcome</a>
    <form action="search.php" method="POST">
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" name="search" aria-label="Search">
        <button name="search_btn" class="btn-block">Search</button>
    </form>
    
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
                        <a class="nav-link active" href="dashboard.php">
                            <span data-feather="home"></span>
                            User <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_question.php">
                            <span data-feather="file-text"></span>
                            Question Bank
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
                <h1 class="h2">Question List</h1>
                
                
            </div>

            
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th>SI No</th>
                        <th>Course ID</th>
                        <th>Book Name</th>
                        <th>Chapter</th>
                        <th>Outcome</th>
                        <th>Marks</th>
                        <th>Question</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php $i=1;  foreach ($search_result as $question_info) {?> 
                         <tr>
                        <td> <?php echo $i++?></td>
                        <td><?php echo $question_info['course_id'];?></td>
                        <td><?php echo $question_info['book_name'];?></td>
                        <td><?php echo $question_info['chapter'];?></td>
                        <td><?php echo $question_info['outcome'];?></td>
                        <td><?php echo $question_info['marks'];?></td>
                        <td><?php echo $question_info['question'];?></td>
                        <td><img height="50" width="50" src="<?php echo $question_info['image'];?>"></td>
                        
                        
                        <td>
                            
                            <a href="?delete=<?php echo $question_info['q_id']; ?>" class="btn btn-outline-danger btn-sm">
                             <span><strong>Delete</strong></span>            
                          </a>
                            
                            
                        </td>
                       </tr>     
                        <?php } ?>
                         
                    </tbody> 
                </table>
            </div>
            
           
            

            

<script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
		CKEDITOR.replace('myeditor');
	</script>

<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/feather.min.js"></script>
<script src="asset/js/Chart.min.js"></script>
<script src="asset/js/dashboard.js"></script></body>
</html>








            

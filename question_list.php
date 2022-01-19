<?php
session_start();

if (isset($_GET['logout']))
{
    require_once 'class/login.php';
    $logout = new login();
    $logout->logout();

}


require_once 'class/question.php';
$question_list = new question();
$query_result = $question_list->question_list();

if(isset($_GET['delete']))
{
    $delete_id = $_GET['delete'];
    $delete = new question();
    $delete->Delete_question($delete_id);

}

?>



<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Question List</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body bg-light">

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
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($query_result as $question_info) {?>

                            <tr>
                                <td> <?php echo $i++?></td>
                                <td><?php echo $question_info['course_id'];?></td>
                                <td><?php echo $question_info['book_name'];?></td>
                                <td><?php echo $question_info['chapter'];?></td>
                                <td><?php echo $question_info['outcome'];?></td>
                                <td><?php echo $question_info['marks'];?></td>
                                <td><?php echo $question_info['question'];?></td>
                                <td><img height="50" width="50" src="<?php echo $question_info['image'];?>"></td>

                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



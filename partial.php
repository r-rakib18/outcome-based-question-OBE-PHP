<?php
session_start();
require_once("db_con.php");
$course_id = $_POST['course_id'];
$exam_id = $_POST['exam_id'];
$sql1 = "SELECT * FROM tbl_question WHERE course_id='$course_id' and t_id = '$_SESSION[teacher_id]'";
$qry1 = mysqli_query($conn, $sql1);
$num1 = mysqli_num_rows($qry1);
?>

<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Question</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="width: 90%">
            <select name="question_id[]" class="form-control">
                <option> Select Question</option>
                <?php while ($rec1 = mysqli_fetch_object($qry1)) { ?>
                    <option value="<?php echo $rec1->q_id; ?>"><?php echo $rec1->question; ?></option>
                <?php } ?>
            </select>
        </td>
        <td>
            <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-xs btn-danger d-none remove"><i class="fa fa-minus"></i></button>
        </td>
    </tr>
    </tbody>
</table>
<br>
<div class="row">
    <div class="col-md-12">
        <input type="submit" class="btn btn-success btn-block" name="question_save" value="Save"/>
    </div>
</div>

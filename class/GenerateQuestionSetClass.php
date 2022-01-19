<?php
require_once 'Database.php';

class GenerateQuestionSetClass extends Database
{
    protected $connection;

    public function __construct()
    {
        $this->connection = $this->Database();
    }


    public function generateQuestionSet($data)
    {
        $teacher_id = $_SESSION['teacher_id'];
        $program_id = $data['program_id'];
        $exam_id = @$data['exam_id'];
        $course_id = $data['course_id'];
        $set_no = $data['set_no'];
        $semester_id = @$data['semester_id'];
        $questions = $data['question_id'];

        $sql = "INSERT INTO tbl_question_set (teacher_id, program_id, exam_id,course_id,set_no,semester_id)
                VALUES ('$teacher_id', '$program_id', '$exam_id','$course_id','$set_no','$semester_id')";
        $insert = mysqli_query($this->connection, $sql);
        $set_id = $this->connection->insert_id;
        if ($insert) {
            foreach ($questions as $key => $value) {
                $question_id = $value;
                $sql2 = "INSERT INTO tbl_question_set_details ( question_set_id, question_id) VALUES ('$set_id','$question_id')";
                mysqli_query($this->connection, $sql2);
            }
            $message = "Question save successfully";
            return $message;
        }
    }


    public function getMyQuestionSet()
    {
        $query_result = null;
        $sql = "select master.*,tbl_program.pro_name,tbl_exam.exam_name,tbl_course.course_title,tbl_semester.semester_name from tbl_question_set as master
                left join tbl_program on tbl_program.pro_id = master.program_id
                left join tbl_exam on tbl_exam.exam_id = master.exam_id
                left join tbl_course on tbl_course.course_id = master.course_id
                left join tbl_semester on tbl_semester.semester_id = master.semester_id
                WHERE teacher_id='$_SESSION[teacher_id]'";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function getSetQuestions($set_id)
    {
        $query_result = null;
        $sql = "select details.*,tbl_question.question from tbl_question_set_details as details
                left join tbl_question on tbl_question.q_id = details.question_id
                where details.question_set_id = $set_id
                ";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function generateFinalQuestion($data)
    {
        $message = '';
        $exam_id = $data['exam_id'];
        $semester_id = $data['semester_id'];
        $question_set_ids = $data['question_set_id'];
        $course_id = $data['course_id'];
        $teacher_id = $_SESSION['teacher_id'];

        $sql1 = "INSERT INTO final_question_master ( semester_id, exam_id,course_id,teacher_id) VALUES ('$semester_id','$exam_id','$course_id',$teacher_id)";
        mysqli_query($this->connection, $sql1);
        $final_question_id = $this->connection->insert_id;

        foreach ($question_set_ids as $key => $question_set_id) {
            $sql2 = "INSERT INTO final_question_details ( final_question_id, question_set_id) VALUES ('$final_question_id','$question_set_id')";
            mysqli_query($this->connection, $sql2);
        }
        $message = "Question save successfully";
        return $message;
    }

    public function finalQuestionList()
    {
        $teacherId = $_SESSION['teacher_id'];
        $query_result = null;
        $sql = "select final.*,tbl_semester.semester_name,tbl_exam.exam_name,tbl_course.course_title  
                from final_question_master as final
                left join tbl_semester on   final.semester_id = tbl_semester.semester_id
                left join tbl_exam on  tbl_exam.exam_id = final.exam_id
                left join tbl_course on   tbl_course.course_id = final.course_id
                where final.teacher_id = $teacherId";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function finalQuestionMaster($questionId)
    {
        $query_result = null;
        $sql = "select final.*,tbl_semester.semester_name,tbl_exam.exam_name,tbl_course.course_code ,tbl_course.course_title  
                from final_question_master as final
                left join tbl_semester on   final.semester_id = tbl_semester.semester_id
                left join tbl_exam on  tbl_exam.exam_id = final.exam_id
                left join tbl_course on   tbl_course.course_id = final.course_id
                where final.id = $questionId";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_fetch_assoc(mysqli_query($this->connection, $sql));
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function finalQuestionDetails($question_id)
    {
        $query_result = null;
        $sql = "select * from final_question_details where final_question_id = '$question_id'";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function getSetName($question_set_id)
    {
        $sql = "select * from tbl_question_set where id = $question_set_id";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_fetch_assoc(mysqli_query($this->connection, $sql));
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function getSetDetails($question_set_id)
    {
        $sql = "select * from tbl_question_set_details where id = $question_set_id";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_fetch_assoc(mysqli_query($this->connection, $sql));
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function getquestionDetails($question_id)
    {
        $sql = "select * from tbl_question where q_id = $question_id";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_fetch_assoc(mysqli_query($this->connection, $sql));
            return $query_result;
        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }
}

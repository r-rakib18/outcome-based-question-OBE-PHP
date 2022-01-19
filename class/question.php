<?php
require_once 'Database.php';

class question extends Database
{

    protected $connection;

    public function __construct()
    {
        $this->connection = $this->Database();
    }

    public function save_question($data)
    {

        $image_name = $_FILES['image']['name'];
        $tm_name = $_FILES['image']['tmp_name'];
        $directory = 'assets/img/';
        $image_url = $directory . $image_name;
        $image_type = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_size = $_FILES['image']['size'];
        $check = getimagesize($_FILES['image']['tmp_name']);


        if ($check) {

            if (file_exists($image_url)) {
                die('file already exist');
            } else {
                if ($image_size > 5 * 1024 * 1024) {
                    die('file size is too large ');
                } else {
                    if ($image_type != 'jpg' && $image_type != 'png') {
                        die('file type is not valid ');
                    } else {
                        move_uploaded_file($tm_name, $image_url);
                        $sql = "INSERT INTO tbl_question(course_id,t_id,book_name,chapter,outcome,marks,question,image) VALUES ('$data[course_id]','$_SESSION[teacher_id]','$data[book_name]','$data[chapter]','$data[outcome]','$data[marks]','$data[question]','$image_url')";

                        if (mysqli_query($this->connection, $sql)) {

                            $message = "Question info save succesfully";
                            return $message;
                        }
                    }
                }
            }
        } else {
            die('this file upload file not a image file.please upload a valid image file ');

        }
    }

    public function mulImageSaveQuestion($data)
    {
        $allowedType = array(
            'image/png',
            'image/jpg',
            'image/JPG',
            'image/PNG',
            'image/jpeg',
            'image/JPEG',
        );
        if ($_FILES['file']) {
            $image_name = $_FILES['file']['name'];
            $totalFile = count($image_name);
            for ($i = 0; $i < $totalFile; $i++) {
                $image_type = $_FILES['file']['type'][$i];
                $image_name = $_FILES['file']['name'][$i];
                $dir = "assets/img/" . $image_name;
                if (in_array($image_type, $allowedType) != false) {
                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "assets/img/" . $image_name);
                    $sql = "INSERT INTO tbl_reference(r_name)VALUES('$dir')";
                    $info = mysqli_query($this->connection, $sql);
                } else {
                    echo "<h5 class='text-center text-danger'>Its not an image!</h5>";
                }
            }
            if (isset($info)) {
                $tescher_id = $_SESSION['teacher_id'];
                $sql2 = "INSERT INTO tbl_question(course_id,t_id,book_name,chapter,outcome,marks,question,image) VALUES ('$data[course_id]','$tescher_id','$data[book_name]','$data[chapter]','$data[outcome]','$data[marks]','$data[question]','$dir')";
                mysqli_query($this->connection, $sql2);
                $message = "Question info save successfully";
                return $message;
            } else {
                $_SESSION['message'] = "Question info not an insert!";
            }
        }
    }


    public function question_list()
    {
        $sql = "SELECT* FROM tbl_question";

        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        } else {

            die('query problem' . mysqli_error($this->connection));

        }


    }


    public function book_name()
    {

        $sql = "SELECT* FROM tbl_book";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {

            die('query problem' . mysqli_error($this->connection));

        }

    }


    public function course_name()
    {

        $sql = "SELECT*FROM tbl_course";

        if (mysqli_query($this->connection, $sql)) {
            $query_result1 = mysqli_query($this->connection, $sql);
            return $query_result1;
        } else {

            die('query problem' . mysqli_error($this->connection));

        }

    }

    public function chapter()
    {
        $sql = "SELECT* FROM tbl_chapter";

        if (mysqli_query($this->connection, $sql)) {
            $query_result2 = mysqli_query($this->connection, $sql);
            return $query_result2;
        } else {

            die('query problem' . mysqli_error($this->connection));

        }

    }

    public function outcome()

    {
        $sql = "SELECT* FROM tbl_outcome";

        if (mysqli_query($this->connection, $sql)) {
            $query_result3 = mysqli_query($this->connection, $sql);
            return $query_result3;
        } else {

            die('query problem' . mysqli_error($this->connection));

        }

    }


    public function Test()
    {

        $sql = "SELECT tbl_course.course_code,tbl_book.book_name,tbl_chapter.chapter_no,tbl_outcome.outcome_code FROM tbl_course,tbl_book,tbl_chapter,tbl_outcome ";

        if (mysqli_query($this->connection, $sql)) {
            $test = mysqli_query($this->connection, $sql);
            return $test;
        } else {

            die('query problem' . mysqli_error($this->connection));

        }

    }


    public function Edit_question($edit_id)
    {
        $sql = "SELECT* FROM tbl_question WHERE q_id='$edit_id'";

        if (mysqli_query($this->connection, $sql)) {

            $query = mysqli_query($this->connection, $sql);
            return $query;

        } else {


            die('problem' . mysqli_error($this->connection));

        }


    }


    public function Delete_question($delete_id)
    {
        $sql = "DELETE FROM tbl_question WHERE q_id='$delete_id'";

        if (mysqli_query($this->connection, $sql)) {
            header('Location:my_question_list.php');
        } else {

            die('problem' . mysqli_error($this->connection));

        }

    }


    public function Search($data)
    {

        $sql = "SELECT* FROM tbl_question WHERE book_name='$data[search]'";

        if (mysqli_query($this->connection, $sql)) {
            $search_result = mysqli_query($this->connection, $sql);
            return $search_result;
        } else {

            die('Data not found' . mysqli_error($this->connection));

        }


    }


    public function Myquestionlist()
    {
        $sql = "SELECT* FROM tbl_question WHERE t_id='$_SESSION[teacher_id]'";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        } else {
            die('problem' . mysqli_error($this->connection));
        }


    }


    public function examType()
    {
        $sql = "SELECT* FROM tbl_exam";
        $query_result = mysqli_query($this->connection, $sql);
        return $query_result;
    }

    public function AllQuestion($data)
    {
        $course_id = $data['course_id'];
        $sql = "SELECT* FROM tbl_question WHERE course_id='$course_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        } else {
            die('problem' . mysqli_error($this->connection));
        }
    }

    public function store($data)
    {


        foreach ($data['question_id'] as $key => $value) {
            $question = $data['question_id'][$key];
            $sql = "INSERT INTO tbl_generate(q_id)VALUES ('$question')";
            $query = mysqli_query($this->connection, $sql);
        }
        return $query;

    }

    public function showQuestion($data)
    {
        $course_id = $data['course_id'];
        $sql = "SELECT * FROM tbl_question WHERE q_id='$course_id'";
        $all_question = mysqli_query($this->connection, $sql);
        return $all_question;

    }

    public function getSemester()
    {

        $sql = "SELECT * FROM tbl_semester";

        if (mysqli_query($this->connection, $sql)) {
            $query_result1 = mysqli_query($this->connection, $sql);
            return $query_result1;
        } else {
            die('query problem' . mysqli_error($this->connection));

        }

    }

    public function getProgram()
    {

        $sql = "SELECT * FROM tbl_program";

        if (mysqli_query($this->connection, $sql)) {
            $query_result1 = mysqli_query($this->connection, $sql);
            return $query_result1;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }

    }


}
        
    
    



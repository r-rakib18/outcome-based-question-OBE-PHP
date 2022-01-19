<?php
require_once 'Database.php';
class admin extends Database
{
    protected $connection;
    public function __construct()
    {
      $this->connection=$this->Database();
    }

    public function Semester($data)
    {
        $sql = "INSERT INTO tbl_semester(semester_name) VALUES ('$data[semester_name]')";

        if (mysqli_query($this->connection, $sql)) {

            $message = 'Semester add successfully';
            return $message;
        } else {
            die('insert failed' . mysqli_error($this->connection));
        }

    }

    public function CourseName($data)
    {
        $sql = "INSERT INTO tbl_course(course_code,course_title,course_credit) VALUES ('$data[course_code]','$data[course_title]','$data[course_credit]')";
        if (mysqli_query($this->connection, $sql)) {

            $message = 'Course add successfully';
            return $message;
        }
    }


    public function ProgrameName($data)
    {

        $sql = "INSERT INTO tbl_program (pro_name) VALUES ('$data[program_name]')";
        if (mysqli_query($this->connection, $sql)) {

            $message = 'Programme add successfully';
            return $message;
        }

    }

    public function ProgrameNameList()
    {
        $sql = "SELECT* FROM tbl_program ORDER BY pro_name ASC";
        $programme_list = mysqli_query($this->connection, $sql);
        return $programme_list;

    }

    public function BookName($data)
    {
        $sql = "INSERT INTO tbl_book(pro_id,book_name,author) VALUES('$data[program_name]','$data[book_name]','$data[author]')";

        if (mysqli_query($this->connection, $sql)) {
            $message = "Book add successfully";
            return $message;

        }
    }


    public function BookNameList()
    {
        $sql = "SELECT* FROM tbl_book";
        $query_result = mysqli_query($this->connection, $sql);
        return $query_result;
    }

    public function Chapter($data)
    {
        $sql = "INSERT INTO tbl_chapter(book_id,chapter_no,chapter_title) VALUES('$data[book_name]','$data[chapter_no]','$data[chapter_title]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = "Chapter add successfully";
            return $message;
        }

    }


    public function Exam($data)
    {

        $sql = "INSERT INTO tbl_exam(exam_name,exam_time) VALUES('$data[exam_name]','$data[exam_time]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = "Exam date add successfully";
            return $message;

        }

    }


    public function CourseList()
    {
        $sql = "SELECT* FROM tbl_course ORDER BY course_code ASC";
        $course_list = mysqli_query($this->connection, $sql);
        return $course_list;
    }


    public function CourseOfferInsert($data)
    {
        $sql = "INSERT INTO tbl_courseoffer(semester_id,course_code,teacher_id,pro_id,intake,section) VALUES('$data[semester_name]','$data[course_code]','$data[teacher_name]','$data[program_name]','$data[intake]','$data[section]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = "Course offer add successfully";
            return $message;

        }

    }


    public function Teacher($data)
    {
        $sql = "INSERT INTO tbl_teacher(teacher_name,teacher_email,password,teacher_status,teacher_designation,teacher_dept) VALUES('$data[teacher_name]','$data[teacher_email]','$data[teacher_password]','$data[teacher_status]','$data[teacher_designation]','$data[teacher_department]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = "Teacher add successfully";
            return $message;
        }
    }

    public function TeacherList($data)
    {
        $sql = "SELECT* FROM tbl_teacher WHERE teacher_id='$data[short_name]'";
        $teacher_list = mysqli_query($this->connection, $sql);
        return $teacher_list;
    }

    public function KeywordInsert($data)
    {
        $sql = "INSERT INTO tbl_outcome(outcome_code) VALUES('$data[keyword_name]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = "Keyword add successfully";
            return $message;
        }
    }

    public function semesterName()
    {
        $sql = "SELECT* FROM tbl_semester ORDER BY semester_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $semester_name = mysqli_query($this->connection, $sql);
            return $semester_name;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
    }




    public function editSemesterName($edit_id)
    {
        $sql = "SELECT* FROM tbl_semester WHERE semester_id='$edit_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
    }

    public function updateSemesterName($data)
    {
        $sql = "UPDATE tbl_semester SET semester_id='$data[semester_id]',semester_name='$data[semester_name]' WHERE semester_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Semester update Successfully';
            header('Location: semester_list.php');

        } else {

            die('qury problem' . mysqli_error($this->connection));

        }

    }

    public function deleteSemesterName($delete){
        $sql="DELETE FROM tbl_semester WHERE semester_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location: semester_list.php');

        } else {

            die('qury problem' . mysqli_error($this->connection));

        }
    }


    public function EditTeacher($edit_id){
        $sql= "SELECT* FROM tbl_teacher WHERE teacher_id='$edit_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }

    }


    public function UpdateTeacherInfo($data){
        $sql = "UPDATE tbl_teacher SET teacher_name='$data[teacher_name]',short_name='$data[short_code]',teacher_email='$data[teacher_email]',teacher_dept='$data[teacher_dept]',teacher_designation='$data[teacher_designation]' WHERE teacher_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Teacher info update Successfully';
            header('Location: teacher_short_name.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }

    }

    public function DeleteTecherInfo($delete){
        $sql="DELETE FROM tbl_teacher WHERE teacher_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:user_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function ChapterList($data){
        $sql="SELECT chapter_title,chapter_id,chapter_no FROM tbl_chapter WHERE book_id='$data[book_name]'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }
    }

    public function EditChapter($edit_id){
        $sql= "SELECT* FROM tbl_chapter WHERE chapter_id='$edit_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }
    }

    public function UpdateChapter($data){
        $sql="UPDATE tbl_chapter SET chapter_no='$data[chapter_no]',chapter_title='$data[chapter_name]' WHERE chapter_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Chapter update Successfully';
            header('Location:book_chapter_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function DeleteChapter($delete){
        $sql="DELETE FROM tbl_chapter WHERE chapter_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:book_chapter_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function EditBookName($edit_id){
        $sql= "SELECT* FROM tbl_book WHERE book_id='$edit_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }
    }

    public function UpdateBookName($data){
        $sql="UPDATE tbl_book SET book_id='$data[book_id]',book_name='$data[book_name]',author='$data[author]' WHERE book_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Book update Successfully';
            header('Location:book_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function DeleteBookName($delete){
        $sql="DELETE FROM tbl_book WHERE book_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:book_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function EditCourse($edit_id){

        $sql= "SELECT* FROM tbl_course WHERE course_id='$edit_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }
    }


    public function UpdateCourseName($data){
        $sql="UPDATE tbl_course SET course_code='$data[course_code]',course_title='$data[course_title]',course_credit='$data[course_credit]' WHERE course_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Course update Successfully';
            header('Location:course_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function DeleteCourseName($delete){
        $sql="DELETE FROM tbl_course WHERE course_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:course_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }

    }

    public function EditProgram($edit_id){
        $sql= "SELECT* FROM tbl_program WHERE pro_id='$edit_id'";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }

    }

    public function UpdateProName($data){
        $sql="UPDATE tbl_program SET pro_id='$data[pro_id]',pro_name='$data[pro_name]' WHERE pro_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Program update Successfully';
            header('Location:program_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }


    public function DeleteProName($delete){
        $sql="DELETE FROM tbl_program WHERE pro_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:program_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function CourseOfferList(){

        $sql="SELECT tbl_semester.semester_name,tbl_teacher.teacher_name,tbl_program.pro_name,tbl_courseoffer.* FROM tbl_courseoffer INNER JOIN tbl_semester ON tbl_semester.semester_id=tbl_courseoffer.semester_id INNER JOIN tbl_teacher ON tbl_teacher.teacher_id=tbl_courseoffer.teacher_id INNER JOIN tbl_program ON tbl_program.pro_id=tbl_courseoffer.pro_id ORDER BY tbl_courseoffer.offer_id DESC";
        if (mysqli_query($this->connection, $sql)) {

            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem'.mysqli_error($this->connection));
        }
    }


    public function DeleteOfferName($delete){
        $sql="DELETE FROM tbl_courseoffer WHERE offer_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:course_offer_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }

    }

    public function QuestionList(){
        $sql="SELECT* FROM tbl_question";

        if(mysqli_query($this->connection,$sql))
        {

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function ActiveStatus($data){
        $sql="UPDATE tbl_teacher SET teacher_status='$data[active_btn]' WHERE teacher_id='$data[id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message']='User status change';
            header('Location: user_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function DeactiveStatus($data){
        $sql="UPDATE tbl_teacher SET teacher_status='$data[deactive_btn]' WHERE teacher_id='$data[de_id]'";
        if (mysqli_query($this->connection, $sql)) {
            $_SESSION['message']='User status change';
            header('Location: user_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }


    public function KeywordList(){
        $sql="SELECT* FROM tbl_outcome";

        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }

    public function DeleteKeyword($delete){
        $sql="DELETE FROM tbl_outcome WHERE outcome_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:keyword_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }


    public function ExamList(){
        $sql="SELECT* FROM tbl_exam";

        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }


    public function DeleteExam($delete){
        $sql="DELETE FROM tbl_exam WHERE exam_id='$delete'";
        if (mysqli_query($this->connection, $sql)) {
            header('Location:exam_list.php');

        } else {

            die('query problem'.mysqli_error($this->connection));

        }
    }

    public function BookNameListByprogram($data){
    $sql="SELECT* FROM tbl_book WHERE pro_id='$data[program_name]'";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }


    public function ShortName(){
        $sql="SELECT* FROM tbl_teacher";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }

    }

    public function ProgramNameByCourseOffer(){
        $sql="SELECT* FROM tbl_program";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }

    public function TeacherNameByCourseOffer(){

        $sql="SELECT* FROM tbl_teacher";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }



    public function LimitBookName(){
        $sql="SELECT* FROM tbl_book LIMIT 0";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }


    public function LimitChapter(){
        $sql="SELECT* FROM tbl_chapter LIMIT 0";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }

    public function AllTeacher(){
        $sql="SELECT* FROM tbl_teacher";
        if (mysqli_query($this->connection,$sql)){

            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('failed'.mysqli_error($this->connection));
        }
    }








}
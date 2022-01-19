<?php
require_once 'header.php';
if (@$_GET['page'] == "user") {
    require_once 'user.php';
}
if (@$_GET['page'] == "question_bank") {
    require_once 'question_bank.php';
}
if (@$_GET['page'] == "question_list") {
    require_once 'question_list.php';
}
if (@$_GET['page'] == "myQuestion_list") {
    require_once 'myQuestion_list.php';
}
if (@$_GET['page'] == "question_generate") {
    require_once 'question_generate.php';
}
if (@$_GET['page'] == "question_set_list") {
    require_once 'question_set_list.php';
}
if (@$_GET['page'] == "index") {
    require_once 'question/final_question_list.php';
}
if (@$_GET['page'] == "final_question_details") {
    require_once 'question/index.php';
}
if (@$_GET['page'] == "dashboard") {
    require_once 'index.php';
}
require_once 'footer.php';

?>
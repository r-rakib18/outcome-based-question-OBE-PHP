<?php
if($_FILES['image']){
            $totalFiles= count($_FILES['image']['name']);
            for($i=0;$i<$totalFiles;$i++){
        $image_name = $_FILES['image']['name'][$i];
        $tm_name = $_FILES['image']['tmp_name'][$i];
        $directory = 'asset/image/';
        $image_url = $directory.$image_name;
        $image_type = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_type_mul=$image_type[$i];
        $image_size = $_FILES['image']['size'][$i];
        $check = getimagesize($_FILES['image']['tmp_name'][$i]);
                
               if ($check) {

            if (file_exists($image_url)) {
                die('file already exist');
            } else {
                if ($image_size > 5*1024*1024) {
                    die('file size is too large ');
                } else {
                    if ($image_type_mul != 'jpg' && $image_type_mul != 'png') {
                        die('file type is not valid ');
                    } else {
                        
                        move_uploaded_file($tm_name,$image_url);
                        $sql = "INSERT INTO tbl_question(course_id,book_name,chapter,outcome,marks,question,image) VALUES ('$data[course_id]','$data[book_name]','$data[chapter]','$data[outcome]','$data[marks]','$data[question]','$image_url')";

                        if (mysqli_query($this->connection,$sql)) {

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
            
        }
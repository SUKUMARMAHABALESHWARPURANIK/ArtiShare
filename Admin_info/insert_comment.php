<?php
//check wether all variable are sent
if(isset($_POST['user_name'])&& isset($_POST['text'])&&isset($_POST['post_id'])){
    
    //check wether the boxes have some text or not
    if($_POST['user_name']!='' && $_POST['text']!=''){
        
        //establish the connection with databse
        require_once("connection.php");
        date_default_timezone_set('Asia/Kolkata'); 
        $date=date("y-m-d h:i:sa");
        
        //insert data to database now
        
        $q='INSERT INTO  `comment` (`id`,`post_id`,`user`,`text`,`date`)
        VALUES("","'.$_POST['post_id'].'","'.$_POST['user_name'].'","'.$_POST['text'].'","'.$date.'") ';
        
        $r=mysqli_query($conn,$q);
        if($r){
            //show comment
             echo '<h5>'.$_POST['user_name'].' ';
             echo '<small style="color:5f5f5f;">  '.$date.'</small></h5>';
             echo '<p>'.$_POST['text'].'</p>';
             echo '<hr/>';
                                                           
            
        }else{
            echo 'problem in insert query'.$q;
        }
    }else{
        echo 'please fill all the fields';
    }
}else{
    echo 'variable did not passed';
}
?>
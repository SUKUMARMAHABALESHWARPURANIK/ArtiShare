<?php 
  require_once("connection.php");
  
  if(isset($_POST['comment_id'])){
      $q='DELETE FROM comment WHERE id="'.$_POST['comment_id'].'" ';
      $r=mysqli_query($conn,$q);
      if($r){
          echo 'successfully deleted';
      }else{
          echo 'query problem'.$q;
      }
  }
?>
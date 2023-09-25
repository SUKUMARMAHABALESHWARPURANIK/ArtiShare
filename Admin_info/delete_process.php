<?php 
  require_once("connection.php");
  
  //process for deleting a comment
  if(isset($_POST['comment_id'])){
      $q='DELETE FROM comment WHERE id="'.$_POST['comment_id'].'" ';
      $r=mysqli_query($conn,$q);
      if($r){
          echo 'successfully deleted';
      }else{
          echo 'query problem'.$q;
      }
  
      
  }
  //process for deleting post
  if(isset($_POST['post_id'])){
       $q='DELETE FROM post WHERE id="'.$_POST['post_id'].'" ';
      $r=mysqli_query($conn,$q);
      if($r){
          echo 'successfully deleted';
      }else{
          echo 'query problem'.$q;
      }
  }
?>
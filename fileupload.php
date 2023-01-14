
<?php
ini_set('display_errors', 1);
session_start();
include('config.php');

    if (isset($_POST['form1'])) {
  
      
        $pimage = $_FILES['pimage']['name'];
        
        $size=$_FILES['pimage']['size'];
        $temp=$_FILES['pimage']['tmp_name'];
        $type=$_FILES['pimage']['type'];
        
        $acceptedFormats = array('png', 'jpg', 'mp4', 'JPG','mp3');

        if(!in_array(pathinfo($pimage, PATHINFO_EXTENSION), $acceptedFormats)){
            echo "<script> alert('error'); </script>";
        }else{

        move_uploaded_file($temp, "product/".$pimage);
        $sql = mysqli_query($conn,"insert into tbl_upload(product) values('$pimage')");
      
        if($sql>0){
            echo "<script> alert('sucessfully'); </script>";
          }
          else{
            echo "<script> alert('error'); </script>";
          }

        }
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
  <body>
   <section class="content">
   <div class="box box-info">
      <div class="box-body">
   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
   
     
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">New Photo <span>*</span></label>
          <div class="col-sm-6" style="padding-top:6px;">
            <input type="file" name="pimage">(Only jpg, mp4, gif and png are allowed)
          </div>
        </div>
           


        <div class="form-group">
          <label for="" class="col-sm-2 control-label"></label>
          <div class="col-sm-6">
            <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
          </div>
        </div>
      
  </form>
  
  </div>
    </div>
      

</section> 
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
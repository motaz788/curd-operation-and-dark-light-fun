<?php

$host = "localhost";
$user = 'root';
$password = "ccredsea";
$dbName = "shop";


$conn = mysqli_connect($host, $user, $password, $dbName);

// if ($conn) {
//   echo 'true connectin';
// } else {
//   echo 'false connection';
// }


### conecction done 

// $insert = "  INSERT INTO  `employees` values (8 , 'mizo moataz' , 100000 , 1 )";

// $s1  = mysqli_query($conn, $insert);
// if($s1){

//     echo 'instered into the database ';
// }else{
//     echo 'not inserted  into the database ';

// }

// $s = " SELECT * From  `employees` where  id =1 ";
// $s2  = mysqli_query($conn,$s); 


// echo $s2;



// $update = "UPDATE `employees` set name= 'MR: Mizo' where id =1 ";

// $up  = mysqli_query($conn, $update);

//  if( $up ){

//   echo 'true updated';
//  }else {
//      echo 'not ipdateded try againe';
//  }




$delete = "DELETE FROM `employees` WHERE ID=5 ";

$DE  = mysqli_query($conn, $delete);

// if($DE){
//    echo 'it has been deleted ';
// }else{
//  echo 'the deletion has been failed try agine ';
// }



$select = "select *  from `employees` ";
$se = mysqli_query($conn, $select);

// foreach ($se as $data) {
//   echo "<br>" . $data['id'];
//   echo "-" . $data['name'];
//   echo  "-" . $data['salary'];
//   echo  "-" . $data['departmentId'];
// }






// if ($se) {
//   echo 'true selected';
// } else {
//   echo 'not selected try againe';
// }



if (isset($_POST['send'])) {
  $id = $_POST['employeeId'];
  $name = $_POST['employeeName'];
  $salary = $_POST['salary'];
  $departmentId = $_POST['departmentId'];

  $insert = "  INSERT INTO  `employees` values ($id , '$name' ,  $salary ,  $departmentId )";

  $s1  = mysqli_query($conn, $insert);
  header('location: index.php');

  if ($s1) {
    echo `<div class =" alert mx-auto w-50 alert-info"> insert has been done Sucsesfully</div>`;
  } else {
    echo `<div class ="alert mx-auto w-50 dengar-info"> insert is fauls , try agine </div>`;
  };
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `employees` where id = $id ";
    $dss = mysqli_query($conn, $delete); 
  
    header('location: index.php');
}



 
  $id ='';
  $name = '';
  $salary = ''; 
  $departmentId = '';

  $update= '' ;
  if (isset($_GET['edit'])) {
    $update= true ;
      
  
      $id = $_GET['edit'];

      $seel ="SELECT * from `employees` where id= $id ";

      $SES = mysqli_query($conn, $seel);
      
      $row =mysqli_fetch_assoc($SES);
      $id = $row['id'];
      $name = $row['name'];
      $salary = $row['salary']; 
      $departmentId =$row['departmentId'];
 
      if (isset($_POST['update'])) {
       
          $name =$_POST['employeeName'];
          $salary =$_POST['salary'];
          $departmentId = $_POST['departmentId'];

          $upe = "UPDATE `employees` SET  name = '$name' , salary = $salary ,  departmentId = $departmentId  where id = $id ";

          $SS  = mysqli_query($conn, $upe);

          header('location: index.php');


          if ($s1) {
              echo `<div class =" alert mx-auto w-50 alert-info"> insert has been done Sucsesfully</div>`;
          } else {
              echo `<div class ="alert mx-auto w-50 dengar-info"> insert is fauls , try agine </div>`;
          };
      };    
  };
?>
<?php 



if (isset($_GET['change'])) {

      $num = $_GET['change'];

      $up ="UPDATE color SET color = $num" ;

      $c = mysqli_query($conn , $up);
      header('location: index.php');
   
     

  }
  $selectColor ="SELECT color FROM color WHERE id=1 ";

  $sc = mysqli_query($conn, $selectColor);

  $colorNumber = mysqli_fetch_assoc($sc);
  $thisNumber = $colorNumber['color'];
  // echo $thisNumber ;
  
  ?>






<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">

  <title>Document</title>
</head>

<body>


  <?php  if($thisNumber=='1'):  ?>
   
 <a href="index.php?change='2'"  class="btn btn-dark" name='change'>dark Mode</a>
 <link rel="stylesheet" href="./light.css">
  <!-- <P><?php  echo $thisNumber;  ?></P> -->
 <?php  else:  ?>
  <link rel="stylesheet" href="./dark.css">

  <a href="index.php?change='1'"  class="btn btn-light" name='change'>light Mode</a>
  <!-- <P><?php  echo $thisNumber;  ?></P> -->
  <?php  endif; ?>




  
 
  <div class="container col-6 mt-5 text-center">

    <div class="card card-body">


      <form method="post">
        <div class="from-group">

          <label> employee Id </label>
          <input type="text" class="form-control" value="<?php echo  $id  ?>" name="employeeId" placeholder="Employee id">

        </div>
        <div class="from-group">

          <label> employee Name </label>
          <input type="text" class="form-control" value="<?php echo  $name ?>" name="employeeName" placeholder="Employee Name">

        </div>



        <div class="from-group">

          <label> Salary </label>
          <input type="text" class="form-control" value="<?php echo  $salary  ?>"  name="salary" placeholder="For Example 12000 ">

        </div>


        <div class="from-group">
 
          <label> Department Id </label>
          <input type="text" class="form-control" value="<?php echo  $departmentId ?>"  name="departmentId" placeholder="For Example 1 , 2 ">

        </div>
     
        <?php if($update): ?>
          <button class="btn btn-warning" name="update"> update Data</button>
    
        <?php else : ?>
        
          <button class="btn btn-info" name="send">Send Data</button>
 
        <?php endif;?>
   
      </form>









    </div>











  </div>














  <div class="container col-6 mt-5 text-center">

    <table class="table table-dark">

      <tr>
        <th>id</th>
        <th>name</th>
        <th>salary</th>
        <th>Department ID</th>
        <th>Action</th>

      </tr>
      <?php foreach ($se as $data) { ?>
        <tr>
          <td> <?php echo  $data['id'] ?> </td>
          <td> <?php echo  $data['name'] ?> </td>
          <td> <?php echo  $data['salary'] ?> </td>
          <td> <?php echo  $data['departmentId'] ?> </td>
          
          <td><a    onclick="return confirm('Are You Sure  you want delete <?php echo  $data['name'] ?>?')" href="index.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a></td>
          <td><a    href="index.php?edit=<?php echo $data['id']?>" class="btn btn-info"> Edit  </a></td>

        </tr>

      <?php } ?>
    </table>







  </div>


</body>

</html>
<?php
session_start();
use Entities\People;

 $error = '';
 if(isset($_POST['update'])){
 
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $employee = $entityManager->find('Entities\People', $_POST['update']);
    $project = $entityManager->find('Entities\Project',$_POST['projId']);
    $employee->getProj($project);
    $employee->setName($fname);
    $employee->setSurname($lname);
    $entityManager->flush();
    header('location:../people.php');
    exit;
  }else{
    $error = "Please make sure all fields are filled   correctly!";

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "src/views/fragments/header.php"; ?>

 <title>People</title>
</head>
<body>
  <div class=" container ">
    <div class="position-absolute top-50 start-50 translate-middle">
      <div class="card bg-success p-2 text-dark bg-opacity-25">
        <div class="card-body ">
          <form class=" " method="post">
            <input type="hidden" name="id" value="<?php print $id; ?>">
            <input class="mb-3" type="text" name="first_name" placeholder="Please write  name" value="<?php print $row['first_name'] ?>"></br>
            <input class="mb-3" type="text" name="last_name" placeholder="Please write  last name" value="<?php print $row['last_name']; ?>"></br>
            <p class="text-danger "><?php print $error; ?></p>
            <label for="exampleInputEmail1" class="form-label">Select project:</label>
           
            </select>
            <div class="mt-3 text-center">
              <button class="btn btn-secondary" type="submit" name="update"><i class="bi bi-box-arrow-in-right me-1"></i>Enter</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
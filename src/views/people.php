 <?php
 
 
   use Entities\People;

   function redirect_to_root(){
      header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
   }

  $error="";

   if(isset($_POST['create']))
   {$input_name = trim($_POST["fname"]);
    $input_lastname = trim($_POST["lname"]);
   if (empty($input_name) or empty($input_lastname)) {
    $error = "Please make sure all fields are filled   correctly!";
  } else{
    $employee = new Entities\People();
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $project = $entityManager->find('Entities\Project',$_POST['projId']);
    $employee->setName($fname);
    $employee->setSurname($lname);
    $employee->getProj($project);
    $entityManager->persist($employee);
    $entityManager->flush();
    redirect_to_root();
  }}
 
 if(isset($_POST['delete'])){
 $employee = $entityManager->find('Entities\People', $_POST['delete']);
 $entityManager->remove($employee);
 $entityManager->flush();

 redirect_to_root();
 }
 if(isset($_POST['updateDB'])){
  
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $employee = $entityManager->find('Entities\People', $_POST['updateDB']);
  $project = $entityManager->find('Entities\Project',$_POST['projId']);
  $employee->getProj($project);
  $employee->setName($fname);
  $employee->setSurname($lname);
  $entityManager->flush();
  redirect_to_root();
}?> 

 <!DOCTYPE html>
<html lang="en">

<head>
<?php include "src/views/fragments/header.php"; 
include "src/views/fragments/message.php"?>
<title>People</title>
</head>

<body>
<?php include "src/views/fragments/navbar.php"; ?>

  <div class="container pt-1">
    
    <table class="table  table-bordered mt-5 text-center">
      <thead>
        <tr class="bg-dark  p-2 text-white bg-opacity-75">
          <th class="">ID</th>
          <th class="">First Name</th>
          <th class="">Last Name</th>
          <th class="">Project Name</th>
          <th class="">Actions </th>
        </tr>
      </thead>
      <tbody>
      <?php
            $employee = $entityManager->getRepository('Entities\People')->findAll();
 
      foreach($employee as $people )
      if ($people->project_id !== null   ) {
         print( "<tr>
             <td>" . $people->getId() . "</td>
            <td>" . $people->getName().  "</td>
            <td>" . $people->getSurname() . "</td>
            <td> " . $people->project_id->getProjName()  . "</td>
            <td> ".
            "<form method='POST' action=''>
            <button class='btn btn-info me-1' id= 'update' name='update' value='".$people->getId()."'><i class='bi bi-pen'></i></button>
            <button class='btn btn-danger ' id='delete' name='delete' value='".$people->getId()."'><i class='bi bi-trash3-fill'></i></button>
            </form>
            </td>
           </tr>");
        }else if ($people->project_id === null) {
          print("<tr>
                   <td>" . $people->getId() . "</td>
                   <td>" . $people->getName()  . "</td>
                   <td>" . $people->getSurname() . "</td>
                   <td></td>
                   <td>
                   <form method='POST' action=''>
                   <button class='btn btn-info me-1' id= 'update' name='update' value='".$people->getId()."'><i class='bi bi-pen'></i></button>
                   <button class='btn btn-danger ' id='delete' name='delete' value='".$people->getId()."'><i class='bi bi-trash3-fill'></i></button>
                   </form>
                   </td>  
                </tr>"
          );
          
        }
          ?>
       
  </div>
  </tbody>
  </table>
  
  <?php 
  include_once "src/views/edit.php";
  include "./src/views/fragments/footer.php"; ?>

</body>

</html>
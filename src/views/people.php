 <?php
 session_start();

   use Entities\People;

   function redirect_to_root(){
      header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
   }

   if(isset($_POST['update'])){
  
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $employee = $entityManager->find('Entities\People', $_POST['update']);
    $project = $entityManager->find('Entities\Project',$_POST['projId']);
    $employee->getProj($project);
    $employee->setName($fname);
    $employee->setSurname($lname);
    $entityManager->flush();
    redirect_to_root();
  }
   if(isset($_POST['create']) and isset($_POST['projId'])){
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
 }
 


 if(isset($_POST['delete'])){
 $employee = $entityManager->find('Entities\People', $_POST['delete']);
 $entityManager->remove($employee);
 $entityManager->flush();
 redirect_to_root();
 }
 



 ?> 

 <!DOCTYPE html>
<html lang="en">

<head>
<?php include "src/views/fragments/header.php" ; ?>
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
 
  <div class=" container  d-flex justify-content-center m-5">
    <div class="card bg-secondary p-2 text-dark bg-opacity-25">
      <div class="card-body ">
        <form class="text-center" method="post" >
         <!-- print $people->getId()  -->
           <input class="mb-1" type="text" name="fname" placeholder="Please write  name" required > </br>
          <input class="mb-3" type="text" name="lname" placeholder="Please write  last name" required   ></br>
          <label for="exampleInputEmail1" class="form-label">Select project:</label>
          <?php $projects = $entityManager->getRepository('Entities\Project')->findAll();
                   $people = $entityManager->getRepository('Entities\people' );

               print("<select id='projId' name='projId'  >");
                
                  
                  foreach ($projects as $project) {
                        print("<option value='" . $project->getId(). "'>".$project->getProjName()."</option>");
                     }
                  
            print("</select>")?>;
          <div class=" mt-3">
            <button class="btn btn-secondary" type="submit" name="create"><i class="bi bi-box-arrow-in-right me-1"></i>Enter</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
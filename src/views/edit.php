<?php
//update logic and form to create people

if (!isset($_POST['update'])) {
   print("<div class=' container  d-flex justify-content-center m-5'>
            <div class='card bg-secondary p-2 text-dark bg-opacity-25'>
               <div class='card-body'>
                  <form class=' text-center' action='' method='POST'>
                     <input class='mb-1' type='text' name='fname' placeholder='Name' required></br>
                     <input class='mb-3' type='text' name='lname' placeholder='Last Name' required></br>
                     <label for='exampleInputEmail1' class='form-label'>Select project: </label>");
   $projects = $entityManager->getRepository('Entities\Project')->findAll();
   print("<select id='projId' name='projId'  >");
   foreach ($projects as $project) {
      print("<option value='" . $project->getId() . "'>" . $project->getProjName() . "</option> ");
   }
   print("</select> </br> 
               <div class='mt-3'>
                  <button class='btn btn-secondary' type='submit' name='create'><i class='bi bi-box-arrow-in-right me-1'></i>Enter</button>
               </div>
                  </form>
               </div>
            </div>
          </div>");

} else if (isset($_POST['update'])) {
   print("<div class=' container  d-flex justify-content-center m-5'>
            <div class='card bg-secondary p-2 text-dark bg-opacity-25'>
               <div class='card-body'>
                  <form class='text-center ' action='' method='POST'>");

   $employee = $entityManager->find('Entities\People', $_POST['update']);
   print("<input class='mb-1'  type='text' name='fname' placeholder=' ' value='" . $employee->getName() . "'required></br>
         <input class='mb-3' type='text' name='lname' placeholder='  ' value='" . $employee->getSurname() . "' required></br>
         <label for='exampleInputEmail1' class='form-label'>Select project: </label> "
      );
   $projects = $entityManager->getRepository('Entities\Project')->findAll();
   print("<select id='projId' name='projId'  >");
   foreach ($projects as $project) {
      print("<option value='" . $project->getId() . "'>" . $project->getProjName() . "</option>");
   }
   print("</select></br>
               <div class='mt-3'>
                  <button class='btn btn-info' type='submit' name='updateDB value='" . $_POST['update'] . "'><i class='bi bi-pen me-2'></i>Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>");
}
<?php

use Entities\People;
use Entities\Project;

function redirect_to_root()
{
  header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./src/views/fragments/header.php"; ?>
  <title>Main</title>

</head>

<body>
  <?php include "./src/views/fragments/navbar.php"; ?>


  <div class="container pt-1">

    <table class="table  table-bordered mt-5 text-center">
      <thead>
        <tr class="bg-dark  p-2 text-white bg-opacity-75">
          <th class="">ID</th>
          <th class="">Project Name</th>
          <th class="">People </th>
        </tr>
      </thead>
      <tbody>
        <?php
$projects = $entityManager->getRepository('Entities\Project')->findAll();

foreach ($projects as $project) {
  $concated = [];
  // show all people assinged for same projects and not
  for ($i = 0; $i < count($project->peopleAndprojects); $i++) {
    array_push($concated, $project->peopleAndprojects[$i]->getName() . " " . $project->peopleAndprojects[$i]->getSurname());
  }
  $persons = implode(", ", $concated);

  print("<tr>
               <td>" . $project->getId() . "</td>
               <td> " . $project->getProjName() . "</td>
               <td>" . $persons . "</td>
           </tr>");

}
?>

  </div>
  </tbody>
  </table>
  <?php include "./src/views/fragments/footer.php"; ?>

</body>

</html>
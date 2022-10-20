<?php
use Entities\Project;

function redirect_to_root()
{
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}
//create logic
$error1 = '';

if (isset($_POST['create'])) {
    $projects = new Project();
    $projName = htmlspecialchars($_POST['create']);
    $checkDb = $entityManager->getRepository('Entities\Project')->findBy(array("project_name" => $projName));
    if ($checkDb[0] === NULL) {
        $projects->setProjName($projName);
        $entityManager->persist($projects);
        $entityManager->flush();
        $_SESSION['message'] = "Project has been created";
        $_SESSION['type'] = "success";
        redirect_to_root();
        exit;
    }else
        $error1 = "Project with his name already exists ";
    
}
//delete logic
if (isset($_POST['delete'])) {
    $project = $entityManager->find('Entities\Project', $_POST['delete']);
    $entityManager->remove($project);
    $_SESSION['message'] = "Project has been deleted";
    $_SESSION['type'] = "danger";
    $entityManager->flush();
    redirect_to_root();
    exit;
}

//update logic
$error = '';

 if (isset($_POST['updates'])) {
    $project = $entityManager->find('Entities\Project', $_POST['updates']);
    $projName = htmlspecialchars($_POST['nameUpdate']);
    $checkDb = $entityManager->getRepository('Entities\Project')->findBy(array("project_name" => $projName));
    if ($checkDb[0] === NULL) {
        $project->setProjName($projName);
        $_SESSION['message'] = "Project has been updated";
        $_SESSION['type'] = "warning";
        $entityManager->flush();
        redirect_to_root();
        exit;
    }else 
        $error = "Project with his name already exists ";

}
?>
<!DOCTYPE html>
<?php include "src/views/fragments/header.php"; ?>
<title>Projects</title>

</head>

<body>
    <?php include "src/views/fragments/navbar.php";
include "src/views/message.php";
$projects = $entityManager->getRepository('Entities\Project')->findAll();
?>


    <div class="container pt-1">
    <p class='text-danger '><?php print $error; print $error1?></p>

        <table class="table  table-bordered mt-5 text-center">
            <thead>
                <tr class="bg-dark  p-2 text-white bg-opacity-75">
                    <th class="w-25">ID</th>
                    <th class="w-25">Project Name</th>
                    <th class="w-25">Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php
//creating table  from class
foreach ($projects as $project) {
    print("<tr>
                <td>" . $project->getId() . "</td>
                <td>" . $project->getProjName() . "</td>
        <td>" .
        "<form method='POST' action=''>
                <button class='btn btn-info me-1' id='update' name='update' value='" . $project->getId() . "'><i
                        class='bi bi-pen'></i></buttton>
                    <button class='btn btn-danger' id='delete' name='delete' value='" . $project->getId() . "'><i
                            class='bi bi-trash3-fill'></i></buttton>
                        </form>
                        </td>
                        </tr>");
                    }
                ?>
            </tbody>
        </table>
        <?php
// Submit project form and update logic
if (!isset($_POST['update'])) {
    print("<form class='pt-5' action='' method='POST'>
        <input type='text' name='create' required>
        <button class='btn btn-secondary'><i class='bi bi-box-arrow-in-right me-1'></i>Enter </button>
        </form>");
    }     else {
    $project = $entityManager->find('Entities\Project', $_POST['update']);
    print("<form class='pt-5' action='' method='POST'>
            <input type='text' name='nameUpdate' value='" . $project->getProjName(). "' required>
            <button class='btn btn-secondary' type='updates' name='updates' value='" . $_POST['update'] . "'><i
                    class='bi bi-box-arrow-in-right me-1'></i>Enter </button>
        </form>");
    }
   include "./src/views/fragments/footer.php"; 
   include "./src/views/scripts/script.php"?>

</body>

</html>
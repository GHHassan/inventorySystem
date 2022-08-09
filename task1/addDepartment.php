<?php
  session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
      header('Location: login.html');
      exit;
  }
//   check to see if the data is coming from the form where submit button = addDepartment
if (isset($_POST['addDepartment'])) {
    // check to see if inputs from user via the form correspond to the ones coming to server via POST method
    if (
        isset($_POST['depName']) && isset($_POST['depLocation'])
        && isset($_POST['depDescription'])
    ) {
        // if successfull connect to database
        require('./inc/dbcon.php');
        // sanitise the user input from malicious code
        $depName = htmlspecialchars($_POST["depName"]);
        $depLocation = htmlspecialchars($_POST["depLocation"]);
        $depDescription = htmlspecialchars($_POST["depDescription"]);

        // prepare a sql statement with anonymouse values
        $sql = "INSERT INTO `department` (  `depName`, `depLocation`, `depDescription`) VALUES (?,?,?); ";
        $stmt = $pdo->prepare($sql);
        // // execute the the insert methode
        // // assign sanitised values to insert sql querry 
        echo json_encode($_POST);
        echo __LINE__;
        $inserted =   $stmt->execute(array($depName, $depLocation, $depDescription));
        // redirect the page to home page
        header('Location: http://localhost/task1/index.php');
    } else {
        echo 'not worked';
        echo json_encode($_POST);
    }
}

require_once('./inc/header.php');
?>

<body>
    <div class="formContainer">
        <form action="addDepartment.php" name="addDepartment" method="POST">
        <h2>Register an EZOIC Department to the Inventory management System</h2>
            <fieldset name="userInfo" class="userInfo">
                <legend>Department information</legend>
                <label for="depName">Department Name</label>
                <input type="text" name="depName">
                <label for="depLocation"> Department Location<label>
                        <select name="depLocation" id="depLocation">Department Location
                            <option value="Newcastle">Newcastle</option>
                            <option value="London">London</option>
                        </select>
                        <label for="depDescription">Department Description</label>
                        <input type="text" name="depDescription">
                        <button type="submit" name="addDepartment" style="width:100px;">Add</button>
            </fieldset>
        </form>
    </div>
<?php
require_once('./inc/footer.php');
?>
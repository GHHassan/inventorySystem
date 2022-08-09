<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

    require_once('./inc/header.php');
    require_once('./inc/dbcon.php');
    //   check to see if the data is coming from the form where submit button = addStaff
    if (isset($_POST['addStaff'])) {
        // check to see if inputs from user via the form correspond to the ones coming to server via POST method
        if (
            isset($_POST['staffFirstname']) && isset($_POST['staffLastname'])
            && isset($_POST['staffEmail']) && isset($_POST['staffDepartment']) &&
            (isset($_POST['staffLocation'])
            )
        ) {
            // if successfull connect to database
            // sanitise the user input from malicious code
            $staffFirstname = htmlspecialchars($_POST["staffFirstname"]);
            $staffLastname = htmlspecialchars($_POST["staffLastname"]);
            $staffEmail = htmlspecialchars($_POST["staffEmail"], FILTER_SANITIZE_EMAIL);
            $staffDepartment = htmlspecialchars($_POST["staffDepartment"]);
            $staffLocation = htmlspecialchars($_POST["staffLocation"]);
            $staffNote = htmlspecialchars($_POST["staffNote"]);

            // prepare a sql statement with anonymouse values
            $sql = "INSERT INTO `staff` (`staffFirstname`, `staffLastname`, `staffEmail`, `staffDepartment`, `staffLocation`, `staffNote`) VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            // execute the the insert methode
            $inserted =   $stmt->execute(array($staffFirstname, $staffLastname, $staffEmail, $staffDepartment, $staffLocation, $staffNote));

            // // redirect the page to home page
            header('Location: http://localhost/task1/index.php');
        } else {
            echo 'not worked';
            // echo json_encode($_POST);
        }
    }

?>

<body>

    <div class="formContainer">
        <form action="addStaff.php" name="addStaff" method="POST">
            <h2>Register an EZOIC staff to the Inventory management System</h2>
            <fieldset name="userInfo" class="userInfo">
                <legend>user information</legend>
                <label for="staffFirstname">First Name</label>
                <input type="text" name="staffFirstname" required>
                <label for="staffLastname">Last Name</label>
                <input type="text" name="staffLastname" required>
                <label for="staffEmail">Email Address</label>
                <input type="staffEmail" name="staffEmail" required>
                <label for="staffDepartment">Department</label>
                <input type="text" name="staffDepartment">
                <label for="staffLocation">Staff Location</label>
                <select name="staffLocation" id="staffLocation" required>
                    <option value="Newcastle">Newcastle</option>
                    <option value="London">London</option>
                </select>
                <label for="staffNote">Additional information</label>
                <textarea type="text" name="staffNote" rows="10" columns="40"> </textarea>
                <button type="submit" name="addStaff" id="submit">Register</button>
            </fieldset>
        </form>
    </div>
    <?php
    require_once('./inc/footer.php');
    ?>
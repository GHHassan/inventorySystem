<?php

//   check to see if the data is coming from the form where submit button = addStaff
    if(isset($_POST['addStaff'])){
        // check to see if inputs from user via the form correspond to the ones coming to server via POST method
        if(isset($_POST['staffFirstname']) && isset($_POST['staffLastname']) 
            && isset($_POST['staffEmail']) && isset($_POST['staffDepartment']) && 
            (isset($_POST['staffLocation'])
            )){
            // if successfull connect to database
            require_once('./inc/db.php');
            // sanitise the user input from malicious code
            $staffFirstname = filter_var( $_POST["staffFirstname"], FILTER_SANITIZE_STRING);
            $staffLastname = filter_var( $_POST["staffLastname"], FILTER_SANITIZE_STRING );
            $staffEmail = filter_var( $_POST["staffEmail"], FILTER_SANITIZE_EMAIL );
            $staffDepartment = filter_var( $_POST["staffDepartment"], FILTER_SANITIZE_STRING);
            $staffLocation = filter_var( $_POST["staffLocation"], FILTER_SANITIZE_STRING);
            $staffNote = filter_var( $_POST["staffNote"], FILTER_SANITIZE_STRING);

            // prepare a sql statement with anonymouse values
            $sql = "INSERT INTO `staff` (`staffFirstname`, `staffLastname`, `staffEmail`, `staffDepartment`, `staffLocation`, `staffNote`) VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            // execute the the insert methode
            $inserted =   $stmt->execute(array($staffFirstname, $staffLastname, $staffEmail, $staffDepartment, $staffLocation, $staffNote));
            
            // // redirect the page to home page
            header('Location: http://localhost/task1/index.php');
        }else{
            echo 'not worked';
            echo json_encode($_POST);
        }
    }
?>

<form action="addStaff.php" name="addStaff" id="addStaffFrm" class="" method="post">
    <fieldset name="userInfo" class="userInfo">
        <legend>user information</legend>
        <label for="staffFirstname">First Name</label>
        <input type="text" name="staffFirstname">
        <label for="staffLastname">Last Name</label>
        <input type="text" name="staffLastname">
        <label for="staffEmail">Email Address</label>
        <input type="staffEmail" name="staffEmail">
        <label for="staffDepartment">Department</label>
        <input type="text" name="staffDepartment">
        <label for="staffLocation">Staff Location</label>
        <select name="staffLocation" id="staffLocation">
            <option value="Newcastle">Newcastle</option>
            <option value="London">London</option>
        </select>
        <input type="text" name="staffNote">
        <label for="staffNote">Note</label>
        <input type="submit" name="addStaff" id="submit">
    </fieldset>
</form>

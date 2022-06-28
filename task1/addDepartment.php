
<?php

//   check to see if the data is coming from the form where submit button = addStaff
    if(isset($_POST['addDepartment'])){
        // check to see if inputs from user via the form correspond to the ones coming to server via POST method
        if( isset($_POST['depName']) && isset($_POST['depLocation']) 
            && isset($_POST['depDescription'])){
            // if successfull connect to database
            require('./inc/db.php');
            // sanitise the user input from malicious code
            $depName = filter_var( $_POST["depName"], FILTER_SANITIZE_STRING);
            $depLocation = filter_var( $_POST["depLocation"], FILTER_SANITIZE_STRING );
            $depDescription = filter_var( $_POST["depDescription"], FILTER_SANITIZE_STRING );

            // prepare a sql statement with anonymouse values
            $sql = "INSERT INTO `department` (  `depName`, `depLocation`, `depDescription`) VALUES (?,?,?); ";
            $stmt = $pdo->prepare($sql);
            // // execute the the insert methode
            // // assign sanitised values to insert sql querry 
            echo json_encode($_POST);
            echo __LINE__;
            $inserted =   $stmt->execute(array( $depName, $depLocation, $depDescription));
            // redirect the page to home page
            header('Location: http://localhost/task1/index.php');
        }else{
            echo 'not worked';
            echo json_encode($_POST);
        }
    }
?>

<form action="addDepartment.php" name="addDepartment" id="addDepartmentFrm" class="" method="post">
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
        <input type="text" name ="depDescription">        
        <input type="submit" name="addDepartment" id="addDepartment" value="Add">
    </fieldset>
</form>
<?php
//   check to see if the data is coming from the form where submit button = submitAsset
    if(isset($_POST['submitAsset'])){
        // check to see if inputs from user via the form correspond to the ones coming to server via POST method
        if(isset($_POST['assetTag']) && isset($_POST['assetSerialNumber']) && isset($_POST['assetName']) && isset($_POST['assetBrand']) &&
            (isset($_POST['assetDescription']) && isset($_POST['assetLocation']) && isset($_POST['assetStatus']) && 
            isset($_POST['assetAssignedTo']) && isset($_POST['assetAssignmentDate']) && isset($_POST['assetPurchaseDate']) && isset($_POST['assetPrice'])))
            {
            // if successfull connect to database
            require('./inc/db.php');
            // sanitise the user input from malicious code
            $assetTag = filter_var( $_POST["assetTag"], FILTER_SANITIZE_STRING);
            $assetSerialNumber = filter_var( $_POST["assetSerialNumber"], FILTER_SANITIZE_STRING);
            $assetName = filter_var( $_POST["assetName"], FILTER_SANITIZE_STRING );
            $assetBrand = filter_var( $_POST["assetBrand"], FILTER_SANITIZE_STRING );
            $assetDescription = filter_var( $_POST["assetDescription"], FILTER_SANITIZE_STRING);
            $assetLocation = filter_var( $_POST["assetLocation"], FILTER_SANITIZE_STRING );
            $assetStatus = filter_var( $_POST["assetStatus"], FILTER_SANITIZE_STRING);
            $assetAssignedTo = filter_var( $_POST["assetAssignedTo"], FILTER_SANITIZE_STRING );
            $assetAssignmentDate = filter_var( $_POST["assetAssignmentDate"], FILTER_SANITIZE_STRING );
            $assetPurchaseDate = filter_var( $_POST["assetPurchaseDate"], FILTER_SANITIZE_STRING);
            $assetPrice = filter_var( $_POST["assetPrice"], FILTER_SANITIZE_STRING );
            
            // prepare a sql statement with anonymouse values
            $sql = "INSERT INTO `assets` ( `assetTag`, `assetSerialNumber`, `assetName`, `assetBrand`, `assetDescription`,
             `assetLocation`, `assetStatus`, `assetAssignedTo`, `assetAssignmentDate`, `assetPurchaseDate`, `assetPrice`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            // assign sanitised values to insert sql querry 
            $stmt = $pdo->prepare($sql);
            // execute the the insert methode
            $inserted =   $stmt->execute(array($assetTag, $assetSerialNumber, $assetName, $assetBrand, $assetDescription, $assetLocation,
             $assetStatus, $assetAssignedTo, $assetAssignmentDate, $assetPurchaseDate, $assetPrice));            
            // redirect the page to home page
            header('Location: http://localhost/task1/index.php');
        } else {
            header('Location: http://localhost/task1/index.php');
        }
    }
?>

<div id="infor"></div>
<form action="addAsset.php" name="addAsset" id="addAssetFrm" class="hide" method="POST">
    <h4>Add an Asset</h4>
    <fieldset>
        <legend>Asset Detail</legend>
        <a href="http://localhost/task1/index.php">Home</a>
        <label for="assetTag">Asset Tag <span> * </span></label>
        <input type="text" name="assetTag" id="assetTag" required>
        <span id='Hint'></span>
        <label for="assetSerialNumber">Serial Number <span> * </span></label>
        <input type="text" name="assetSerialNumber" id="assetSerialNumber" required>
        <span id='Hint'></span>
        <label for="assetName">asset Name</label> 
        <input type="text" name="assetName" id='assetName' required>
        <span id='Hint'></span>
        <label for="assetBrand" > Asset Brand <span> * </span></label>
        <input type="text" name="assetBrand" id='assetBrand' required>
        <span id='Hint'></span>
        <label for="assetDescription">Description</label>
        <textarea name="assetDescription" id="assetDescription" cols="30" rows="10"></textarea>
        <label for="assetLocation">Asset Location</label> 
        <input type="text" name="assetLocation">
        <label for="assetStatus">Status</label> 
        <input type="text" name="assetStatus">
        <label for="assetAssignedTo">Assigned to </label> 
        <input type="text" name="assetAssignedTo">
        <label for="assetAssignmentDate">Assigned Date </label> 
        <input type="date" name="assetAssignmentDate">
        <label for="assetPurchaseDate">Purchase Date</label>
        <input type="date" name="assetPurchaseDate" >
        <label for="assetPrice">Price</label>
        <input type="text" name="assetPrice">
        <input type="submit" name="submitAsset" id="submit">
    </fieldset>
</form>
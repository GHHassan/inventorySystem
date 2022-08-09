<?php
//   check to see if the data is coming from the form where submit button = submitAsset
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
} 
    require_once('./inc/dbcon.php');
    if (isset($_POST['submitAsset'])) {
        // check to see if inputs from user via the form correspond to the ones coming to server via POST method
        if (isset($_POST['assetTag']) && isset($_POST['assetSerialNumber']) && isset($_POST['assetName']) && isset($_POST['assetBrand']) &&
            (isset($_POST['assetDescription']) && isset($_POST['assetLocation']) && isset($_POST['assetStatus']) &&
                isset($_POST['assetAssignedTo']) && isset($_POST['assetAssignmentDate']) && isset($_POST['assetPurchaseDate']) && isset($_POST['assetPrice']))
        ) {
            // sanitise the user input from malicious code
            $assetTag = htmlspecialchars($_POST["assetTag"]);
            $assetSerialNumber = htmlspecialchars($_POST["assetSerialNumber"]);
            $assetName = htmlspecialchars($_POST["assetName"]);
            $assetBrand = htmlspecialchars($_POST["assetBrand"]);
            $assetDescription = htmlspecialchars($_POST["assetDescription"]);
            $assetLocation = htmlspecialchars($_POST["assetLocation"]);
            $assetStatus = htmlspecialchars($_POST["assetStatus"]);
            $assetAssignedTo = htmlspecialchars($_POST["assetAssignedTo"]);
            $assetAssignmentDate = htmlspecialchars($_POST["assetAssignmentDate"]);
            $assetPurchaseDate = htmlspecialchars($_POST["assetPurchaseDate"]);
            $assetPrice = htmlspecialchars($_POST["assetPrice"]);

            // prepare a sql statement with anonymouse values
            $sql = "INSERT INTO `assets` ( `assetTag`, `assetSerialNumber`, `assetName`, `assetBrand`, `assetDescription`,
             `assetLocation`, `assetStatus`, `assetAssignedTo`, `assetAssignmentDate`, `assetPurchaseDate`, `assetPrice`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            // assign sanitised values to insert sql querry 
            $stmt = $pdo->prepare($sql);
            // execute the the insert methode
            $inserted =   $stmt->execute(array(
                $assetTag, $assetSerialNumber, $assetName, $assetBrand, $assetDescription, $assetLocation,
                $assetStatus, $assetAssignedTo, $assetAssignmentDate, $assetPurchaseDate, $assetPrice
            ));
            // redirect the page to home page
            header('Location: http://localhost/task1/index.php');
        } else {
            header('Location: http://localhost/task1/index.php');
        }
    }
    require_once('./inc/header.php');

?>

    <body>
        <div class="formContainer">
            <form action="addAsset.php" name="addAsset" method="POST">
                <h4>Add an Asset</h4>

                <fieldset>
                    <legend>Asset Detail</legend>
                    <label for="assetTag">Asset Tag <span> * </span></label>
                    <input type="text" name="assetTag" id="assetTag" required>
                    <span id='Hint'></span>
                    <label for="assetSerialNumber">Serial Number <span> * </span></label>
                    <input type="text" name="assetSerialNumber" id="assetSerialNumber" required>
                    <span id='Hint'></span>
                    <label for="assetName">asset Name</label>
                    <input type="text" name="assetName" id='assetName' required>
                    <span id='Hint'></span>
                    <label for="assetBrand"> Asset Brand <span> * </span></label>
                    <input type="text" name="assetBrand" id='assetBrand' required>
                    <span id='Hint'></span>
                    <label for="assetDescription">Description</label>
                    <textarea name="assetDescription" id="assetDescription" cols="30" rows="10"></textarea>
                    <label for="assetLocation">Asset Location</label>
                    <input type="text" name="assetLocation">
                    <label for="assetStatus">Status</label>
                    <input type="text" name="assetStatus">
                    <legend>Keeper Detail</legend>
                    <label for="assetAssignedTo">Assigned to </label>
                    <input type="text" name="assetAssignedTo">
                    <label for="assetAssignmentDate">Assigned Date </label>
                    <input type="date" name="assetAssignmentDate">
                    <label for="assetPurchaseDate">Purchase Date</label>
                    <input type="date" name="assetPurchaseDate">
                    <label for="assetPrice">Price</label>
                    <input type="text" name="assetPrice">
                    <button type="submit" name="submitAsset">Add </button>
                </fieldset>
            </form>
        </div>
    <?php
    require_once('./inc/footer.php');

    ?>
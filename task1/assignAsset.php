<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}
require_once('./inc/dbcon.php');
$assetId = $_GET['assetId'];
$sql = "SELECT * FROM `assets` WHERE assets.assetId = $assetId";
$stmt = $pdo->query($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$row = $rows[0];
// print($assetId);
require_once('./inc/header.php');
?>
<div class="singleAsset">
    <h1><?= 'Assign: ' . $row['assetBrand'] . ' ' .  $row['assetName'] ?></h1>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Asset Tag</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Asset Name</th>
                <th scope="col">Asset Brand</th>
                <th scope="col">Asset status</th>
                <th scope="col">Asset Keeper</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $row['assetTag'] ?></td>
                <td> <?= $row['assetSerialNumber'] ?></td>
                <td><?= $row['assetName'] ?></td>
                <td><?= $row['assetBrand'] ?></td>
                <td><?= $row['assetStatus'] ?></td>
                <td> <?= $row['assetAssignedTo'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="formContainer">

    <form method="POST" action="processAssignment.php">

        <fieldset name="userInfo" class="userInfo">
            <legend>user information</legend>
            <input type="hidden" name="assetId" value=<?= $assetId ?>>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" required>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" required>
            <label for="emailAddress">Email Address</label>
            <input type="email" name="emailAddress" required>
            <label for="department">Department</label>
            <input type="text" name="department" required>
            <label for="location">Location</label>
            <select name="location" id="assetLocation" required>Location
                <option value="Newcastle">Newcastle</option>
                <option value="London">London</option>
            </select>
            <label for="issueDate">Issue Date</label>
            <input name="issueDate" type="date">
            <label for="useCase">Use Case</label>
            <select name="useCase" required>
                <option value="homeUse">For Home</option>
                <option value="Office">For Office</option>
            </select>
            <input type="submit" name="assign" id="submit">
        </fieldset>
    </form>
</div>

<?php
require_once('./inc/footer.php')
?>
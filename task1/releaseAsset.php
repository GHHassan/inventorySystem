<?php
    
?>


<form action="releaseAsset.php" name="releaseAsset" id="releaseAssetFrm" class="hide" method="post">

    <h4>Release an Asset</h4>
    <fieldset name="assetInformation" class="assetInfo">
        <legend>asset Detail</legend>
        <label for="assetID">assetID</label> 
        <input type="search">
        <div class='assetResult'></div>
        <button type="button">Yes</button>
        <button type="button">Yes</button>

        <label for="reasonToRelease">Reason for Release</label>
        <textarea name="reasonToRetire" id="reasonToRetire" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" id="submit">
    </fieldset>
</form>

<form action="retiredAsset.php" name="retireAsset" id="retireAssetFrm" method="post">
    <h4>Retired Assets</h4>
    <fieldset name="assetInformation" class="assetInfo">
        <legend>asset Detail</legend>
        <label for="assetID">assetID</label> 
        <input type="search">
        <label for="assetSerialNumber">Serial Number <span> * </span></label>
        <input type="text" name="assetSerialNumber" id="serialNumber" >
        <span id='serialNumberHint'></span>
        <label for="assetBrand">Name</label> 
        <input type="text" name="assetBrand" id='name' >
        <span id='nameHint'></span>
        <label for="assetName" >Brand name <span> * </span></label>
        <input type="text" name="assetName" id='brand' >
        <label for="assetStatus">Status</label> 
        <input type="text" name="assetStatus">
        <label for="retiredBy">Retired By</label> 
        <input type="text" name="retiredBy">
        <label for="retirementReason">Retirement Reason</label> 
        <input type="text" name="retirementReason">
        <label for="retirementDate">Retirement Date </label> 
        <input type="date" name="retirementDate">
        <button type="button" id="assetMatched">Yes</button>
        <button type="button" id="notMatched">No</button>
        <label for="reasonToRetire">Reason for Retirement</label>
        <textarea name="reasonToRetire" id="reasonToRetire" cols="30" rows="10"></textarea>
        <input type="submit" name="retire" id="submit">
    </fieldset>
</form>


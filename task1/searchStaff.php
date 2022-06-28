<?php
    if(isset($_POST['staffId']))
    {
        // echo file_get_contents(SanitizeString('http://' .$_POST['url']));
        
            $staffId = sanitizeString($_POST['staffId']);
            $sql = "SELECT * FROM `staff` WHERE `staffId` LIKE '$staffId'";
            $stmt = $pdo->query($sql);
            //fetching data from database
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo $row;

            // echo SanitizeString($row);
            echo file_get_contents(SanitizeString('http://' .$_POST['url']));
        
    }
    function SanitizeString($var)
    {
        $var = strip_tags($var);
        $var = htmlentities($var) ;
        return stripslashes($var);
    }
?>
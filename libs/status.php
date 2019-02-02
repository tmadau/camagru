<?php

    include_once("../classes/functionality.php");
    
    $username = $_SESSION['username'];
    $val = new control();
    $row = $val->notification($username);
    
    echo 'current status: '. $row['notifs'];
    
    if ($row['notifs'] != 'NO') {
        echo '
            <select name="notifs">
                <option value="YES">YES</option>
                <option value="NO">NO</option>
            </select>';
    }
    else {
        echo '
            <select name="notifs">
                <option value="NO">NO</option>
                <option value="YES">YES</option>
            </select>';
    }

?>
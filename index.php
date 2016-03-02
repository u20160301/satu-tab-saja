<?php
session_start();
if (isset($_POST['check_tab_1']) && (!empty($_POST['check_tab_1']))) {
    if (isset($_POST['sid']) && (!empty($_POST['sid']))) {
        session_id($_POST['sid']);
    }
    $tab_id = $_POST['check_tab_1'];
    if (isset($_SESSION['tab_1']) && (!empty($_SESSION['tab_1']))) {
        if ($tab_id == $_SESSION['tab_1']) {
            echo 'TAB_1';
        } else {
            echo 'OTHER_TAB';
        }
    } else {
        $_SESSION['tab_1'] = $tab_id;
        echo 'TAB_1_NEW';
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Satu Tab Saja</title>
        <noscript>
        <meta http-equiv="refresh" content="0, url=./javascript-tidak-aktif.php">
        </noscript>
        <script>
            <!--
            
            function checkTab1(tab_id) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var r = xhttp.responseText;
                        alert(r);
                    }
                };
                xhttp.open("POST", "<?php echo $_SERVER['SCRIPT_NAME']; ?>", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var data = "check_tab_1=" + tab_id + "&sid=" + "<?php echo session_id(); ?>";
                xhttp.send(data);
            }

            if (typeof (Storage) !== "undefined") {
                if (sessionStorage.getItem("tab_id") == null || sessionStorage.getItem("tab_id") == '') {
                    var random = (Math.random()).toString();
                    sessionStorage.setItem("tab_id", Date() + " " + random);
                }
                checkTab1(sessionStorage.getItem("tab_id"));
            } else {
                // Sorry! No Web Storage support!
            }

            //-->
        </script>
    </head>
    <body>
        <?php echo 'Hi' ?>
    </body>
</html>

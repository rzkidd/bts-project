<?php
    require 'query.php';
    
    if(update($_POST)){
        echo '
        <script>
            alert("Berhasil mengupdate data!")
            document.location.href = "../view/data/dataMonitoring.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Gagal mengupdate data!")
            document.location.href = "../view/data/dataMonitoring.php";
        </script>';
    }
?>
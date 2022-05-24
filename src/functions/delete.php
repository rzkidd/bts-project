<?php
    require 'query.php';
    
    if(delete($_GET['id'])){
        echo '
        <script>
            alert("Berhasil menghapus data!")
            document.location.href = "../view/data/dataMonitoring.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Gagal menghapus data!")
            document.location.href = "../view/data/dataMonitoring.php";
        </script>';
    }
?>
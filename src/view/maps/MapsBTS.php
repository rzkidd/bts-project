<?php
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
        if($_SESSION['email'] != "admin@admin.com"){
            // echo '
            //     <script>
            //         alert("Akses dilarang!");
            //         document.location.href = /bts-project;
            //     </script>
            // ';
            header("Location: /bts-project");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body> 
    <?php include '../../partials/sidebar.php'; ?>

    <main class="flex-fill ms-4">
        <div aria-label="breadcrumb" class="container py-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../home/index.html" class=" text-black">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Maps</li>
            </ol>
        </div>

        <!-- Tambahin disini.... -->
        <div class = "ps-3 bg-light" style="width: 1080px; height: 617px";>
            <div class="d-flex align-items-center">
                <h2>
                    Pemetaan Lokasi BTS
                </h2>
            </div>
            <div>
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3832582.65742806!2d107.20947990505394!3d-6.353576885707641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sBase%20Transceiver%20Station%20(BTS)!5e0!3m2!1sen!2sid!4v1650896172038!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>    
        
    </main>

          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<?php 
    } else {
        header('Location: ../login/index.php');
        exit();
    }
?>
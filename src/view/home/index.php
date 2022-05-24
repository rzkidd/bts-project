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

        include '../../functions/query.php';
        $countBTS = select("select count(id) from bts");
        $countOperator = select("select count(id) from users");
        $countMonitoring = select("select count(id) from monitorings");
        // var_dump($countBTS);
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
              <li class="breadcrumb-item"><a href="#" class=" text-black">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <!-- Tambahin disini.... --> 
        <div class="container bg-light pb-5">
            <h3 class="">Welcome, Admin.</h3>
    
            <div class="row mt-3 ms-0">
                <div class="col-md-3 bg-success d-flex flex-column rounded me-5 text-white">
                    <h2 class=""><?= $countBTS[0]['count(id)'] ?></h2>
                    <p class="pb-0 mb-0">BTS</p>
                    <a href="../data/dataBTS.php" class="btn  my-2 text-decoration-none text-white d-flex justify-content-between border-top border-white" >Show more <i class="bi bi-chevron-right "></i></a>
                </div>
                <div class="col-md-3 bg-primary d-flex flex-column rounded me-5 text-white">
                    <h2 class=""><?= $countOperator[0]['count(id)'] ?></h2>
                    <p class="pb-0 mb-0">Operator</p>
                    <a href="../data/dataOperator.php" class="btn  my-2 text-decoration-none text-white d-flex justify-content-between border-top border-white" >Show more <i class="bi bi-chevron-right "></i></a>
                </div>
                <div class="col-md-3 bg-warning d-flex flex-column rounded me-5 text-white">
                    <h2 class=""><?= $countMonitoring[0]['count(id)'] ?></h2>
                    <p class="pb-0 mb-0">Monitoring</p>
                    <a href="../data/dataMonitoring.php" class="btn  my-2 text-decoration-none text-white d-flex justify-content-between border-top border-white" >Show more <i class="bi bi-chevron-right "></i></a>
                </div>
                
            </div>

            <div class="row mt-5">
                <div class="col-md-4 me-3">
                    <div class="card">
                        <div class="card-header bg-info fw-bold">
                          Recent Activity
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-plus-circle"></i> <a href="#" class="fw-bold text-decoration-none text-black" id="profileLink">Admin</a> add new BTS</p>
                              <!-- hover card -->
                              <div class="card collapse position-absolute" style="width: 14rem;" id="profileHover">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc3j_jlYp_6GSfnlumRrqQEfP2vdo_BF8h8A&usqp=CAU" class="card-img-top" alt="Profile Picture" style="width: 100%;">
                                <div class="card-body">
                                  <h5 class="card-title">Admin</h5>
                                  <p class="card-text">admin@gmail.com</p>
                                  <a href="#" class="btn btn-primary">Go to profile <i class="bi bi-arrow-right"></i></a>
                                </div>
                              </div>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-pencil-square"></i> <span class="fw-bold">Admin</span> edit BTS-959</p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-pencil-square"></i> <span class="fw-bold">Kania Andriani</span> edit BTS-452</p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-plus-circle"></i> <span class="fw-bold">Jaya Situmorang M.Kom.</span> add new operator</p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-trash"></i> <span class="fw-bold">Admin</span> delete BTS-223</p>
                          </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info fw-bold">
                          Last Login
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Admin</span></p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Gina Vanesa Uyainah S.Psi</span></p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Admin</span></p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Kania Andriani</span></p>
                          </li>
                          <li class="list-group-item">
                              <p class="text-black-50">2022-04-04 16:23:24</p>
                              <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Jaya Situmorang M.Kom.</span></p>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#profileLink').mousedown(function(){
                $('#profileHover').toggle(500)
                $('#profileHover').mouseleave(function(){
                    $(this).hide(500)
                })
            })
        })

    </script>
</body>
</html>

<?php 
    } else {
        header('Location: ../login/index.php');
        exit();
    }
?>
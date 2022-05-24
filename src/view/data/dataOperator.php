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
            <li class="breadcrumb-item active" aria-current="page">Data Operator</li>
          </ol>
        </div>

        <!-- Tambahin disini.... -->
        <div class = "ps-3 bg-light" style="width: 1080px; height: 617px";>
            <div class="d-flex align-items-center">
                <h2>
                    Data Operator
                </h2>
            </div>
            <div class="bg-white" style="margin-right: 15px; margin-left: 15px; height: 500px";>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-plus-square-fill"></i> 
                    Tambah Data 
                    </button>
                    <button type="button" class="btn btn-danger" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-file-pdf"></i> PDF </button>
                     </button>
                    <button type="button" class="btn btn-success" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-file-excel"></i> Excel </button>
                <div>
                <div class="d-flex mt-3 mb-3 mr-30 ml-15 ps-3">
                    <div class="p-2 flex-fill"><label for="show" class="form-label">Show</label></div>
                        <select class="form-select" name="show">
                            <option>10</option>
                            <option>100</option>
                            <option>500</option>
                            <option>1000</option>
                        </select>
                    <div class="p-2 flex-fill">               </div>
                    <div class="p-2 flex-fill">Search</div> <input type="text" name="search" class="form-control" placeholder="ketik keyword ...">
                </div>

                <div class=d-flex >
                    
                </div>
                    <table class="table table-striped border-top" style="width: 1000px; margin-top: 10px; margin-right: 15px; margin-left: 15px;">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Operator</th>
                          <th scope="col">Email</th>
                          <th scope="col" colspan="3">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Gina Vanesa Uyainah S.Psi</td>
                          <td>panji.prasetyo@example.com</td>
                          <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myEdit1"><i class="bi-pencil-square"></i></button></td>
                          <td onclick="javascript: confirm('Anda yakin data ini dihapus?')"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myTrash1"><i class="bi-trash"></i></button>
                          </td>
                          <td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myDetail1"><i class="bi-bag-plus"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jaya Situmorang M.Kom.</td>
                          <td>nsetiawan@example.net</td>
                          <td><div class="btn btn-primary btn-sm"><i class="bi-pencil-square"></i></div></td>
                          <td><div class="btn btn-danger btn-sm"><i class="bi-trash"></i></div>
                          </td>
                          <td><div class="btn btn-success btn-sm"><i class="bi-bag-plus"></i></div></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Kania Andriani</td>
                          <td>farhunnisa30@example.net</td>
                          <td><div class="btn btn-primary btn-sm"><i class="bi-pencil-square"></i></div></td>
                          <td><div class="btn btn-danger btn-sm"><i class="bi-trash"></i></div>
                          </td>
                          <td><div class="btn btn-success btn-sm"><i class="bi-bag-plus"></i></div></td>
                        </tr>
                      </tbody>
                    </table>
                    <ul class="pagination mr-30 ml-15 ps-3">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> 
            </div>
        </div>
        

        <!-- The Modal Input -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Input Data BTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" required></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" action=" ">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>File Foto</label>
                        <input type="file" name="foto_op" class="form-control">
                    </div>
                </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <section>
                <button type="submit" class="btn btn-primary">Submit</button>
                </section>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <!-- The Modal Edit -->
        <div class="modal fade" id="myEdit1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Data BTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" action=" ">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="Gina Vanesa Uyainah S.Psi">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="panji.prasetyo@example.com">
                    </div>
                    <div class="form-group">
                        <label>File Foto</label>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc3j_jlYp_6GSfnlumRrqQEfP2vdo_BF8h8A&usqp=CAU" style="width: 200px; height: 200px" class="mt-10">
                        <input type="file" name="foto_op" class="form-control">
                    </div>

                </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

         <!-- The Modal Detail -->
        <div class="modal" id="myDetail1">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">DETAIL DATA BTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <table class="table">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc3j_jlYp_6GSfnlumRrqQEfP2vdo_BF8h8A&usqp=CAU" style="width: 300px; height: 300px" class="mx-auto d-block">
                    <tr>
                        <th>Nama BTS</th>
                        <td>Gina Vanesa Uyainah S.Psi</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>panji.prasetyo@example.com</td>
                    </tr>
                </table>
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
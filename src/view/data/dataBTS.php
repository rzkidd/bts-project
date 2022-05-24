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
              <li class="breadcrumb-item active" aria-current="page">Data BTS</li>
            </ol>
        </div>

        <!-- Tambahin disini.... -->
        <div class = "ps-3 bg-light " style="width: 1080px; height: 617px";>
            <div class="d-flex align-items-center">
                <h2>
                    Data BTS
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
                          <th scope="col">Nama BTS</th>
                          <th scope="col">Lokasi</th>
                          <th scope="col">Latitude</th>
                          <th scope="col">Longitude</th>
                          <th scope="col" colspan="3">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>BTS-959</td>
                          <td>Gg. Nakula No. 127, Pematangsiantar 75958, Sulbar</td>
                          <td>50.927549</td>
                          <td>-133.87823</td>
                          <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myEdit1"><i class="bi-pencil-square"></i></button></td>
                          <td onclick="javascript: confirm('Anda yakin data ini dihapus?')"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myTrash1"><i class="bi-trash"></i></button>
                          </td>
                          <td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myDetail1"><i class="bi-bag-plus"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>BTS-431</td>
                          <td>Ki. Ketandan No. 9, Surabaya 39314, Kaltim</td>
                          <td>-2.544021</td>
                          <td>162.56323</td>
                          <td><div class="btn btn-primary btn-sm"><i class="bi-pencil-square"></i></div></td>
                          <td><div class="btn btn-danger btn-sm"><i class="bi-trash"></i></div>
                          </td>
                          <td><div class="btn btn-success btn-sm"><i class="bi-bag-plus"></i></div></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>BTS-452</td>
                          <td>Jr. Thamrin No. 661, Bengkulu 72071, Jatim</td>
                          <td>-69.253395</td>
                          <td>103.47447</td>
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
                        <label for="jenis_bts" class="form-label">Jenis BTS</label>
                        <select class="form-select" id="jenis_bts" name="jenis_bts">
                            <option>Triangle</option>
                            <option>Mono</option>
                            <option>4 Kaki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pemilik</label>
                        <input type="text" name="pemilik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tinggi Tower</label>
                        <input type="text" name="tinggi_tower" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Panjang Tanah</label>
                        <input type="text" name="panjang_tanah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ada_genset" class="form-label">Ada Genset</label>
                        <select class="form-select" id="ada_genset" name="ada_genset">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="ada_tembok_batas" class="form-label">Ada Tembok Batas</label>
                        <select class="form-select" id="ada_tembok_batas" name="ada_tembok_batas">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Foto</label>
                        <input type="file" name="foto" class="form-control">
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
                        <input type="text" name="nama" class="form-control" value="BTS-959">
                    </div>
                     <div class="form-group">
                        <label for="jenis_bts" class="form-label">Jenis BTS</label>
                        <select class="form-select" id="jenis_bts" name="jenis_bts" value="4 Kaki">
                            <option>Triangle</option>
                            <option>Mono</option>
                            <option>4 Kaki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pemilik</label>
                        <input type="text" name="pemilik" class="form-control" value="Lintang Susanti">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="Solok">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="50.927549">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="-133.878236">
                    </div>
                    <div class="form-group">
                        <label>Tinggi Tower</label>
                        <input type="text" name="tinggi_tower" class="form-control" value="19">
                    </div>
                    <div class="form-group">
                        <label>Panjang Tanah</label>
                        <input type="text" name="panjang_tanah" class="form-control" value="30">
                    </div>
                    <div class="form-group">
                        <label for="ada_genset" class="form-label">Ada Genset</label>
                        <select class="form-select" id="ada_genset" name="ada_genset" value="Ada">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="ada_tembok_batas" class="form-label">Ada Tembok Batas</label>
                        <select class="form-select" id="ada_tembok_batas" name="ada_tembok_batas" value="Tidak Ada">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Foto</label>
                        <img src="https://1.bp.blogspot.com/-aRO27s7V6W0/YP9VzbTDr_I/AAAAAAAABd0/Fsu2PoKVUEwD700N-TpFUSbWTkgTX3kAQCLcBGAsYHQ/s586/BTS%2BPertama%2BTelkomsel.JPG" style="width: 200px; height: 200px" class="mt-10">
                        <input type="file" name="foto" class="form-control">
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
                    <img src="https://1.bp.blogspot.com/-aRO27s7V6W0/YP9VzbTDr_I/AAAAAAAABd0/Fsu2PoKVUEwD700N-TpFUSbWTkgTX3kAQCLcBGAsYHQ/s586/BTS%2BPertama%2BTelkomsel.JPG" style="width: 300px; height: 300px" class="mx-auto d-block">>
                    <tr>
                        <th>Nama BTS</th>
                        <td>BTS-959</td>
                    </tr>
                    <tr>
                        <th>Jenis BTS</th>
                        <td>4 Kaki</td>
                    </tr>
                    <tr>
                        <th>Pemilik</th>
                        <td>Lintang Susanti</td> 
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>Solok</td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>50.927549</td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td>-133.878236</td>
                    </tr>
                    <tr>
                        <th>Tinggi Tower</th>
                        <td>19</td>
                    </tr>
                    <tr>
                        <th>Panjang Tanah</th>
                        <td>30</td>
                    </tr>
                    <tr>
                        <th>Lebar Tanah</th>
                        <td>27</td>
                    </tr>
                    <tr>
                        <th>Ada Genset</th>
                        <td>Ada</td>
                    </tr>
                    <tr>
                        <th>Ada Tembok Batas</th>
                        <td>Tidak Ada</td>
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
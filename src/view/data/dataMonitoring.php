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
  $dataMonitoring = select("select * from monitorings");
  $dataBts = select("select * from bts");
  if (isset($_GET['bts'])) {
    $selectedBts = select("select * from monitorings where bts_id = " . $_GET['bts']);
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

  <main class="flex-fill ms-4 ">
    <div aria-label="breadcrumb" class="container py-2">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../home/index.php" class=" text-black">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Monitoring</li>
      </ol>
    </div>

    <!-- Tambahin disini.... -->
    <div class="ps-3 bg-light " style="width: 1080px; height: 617px" ;>
      <div class="d-flex align-items-center">
        <h2>
          Data Monitoring
        </h2>
      </div>

      <!-- Select BTS -->
      <div class="bg-white" style="margin-right: 15px; margin-left: 15px; height: 500px" ;>
        <div class="pt-3 ps-3">
          <form action="#" method="get">
            <label for="bts" class="form-label">Select BTS</label>
            <select name="bts" id="bts" class="form-select" onchange="submit();">
              <?php if(empty($_GET['bts'])) : ?>
                <option value=""></option>
              <?php endif; ?>
              <?php foreach ($dataBts as $row) : ?>
                <?php if ($_GET['bts'] == $row['id']) : ?>
                  <option value="<?= $row['id'] ?>" selected><?= $row['nama'] ?></option>
                <?php else : ?>
                  <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </form>
        </div>

        <div>
          <button type="button" class="btn btn-danger" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;" ><i class="bi-file-pdf"></i> PDF </button>
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
              <div class="p-2 flex-fill"> </div>
              <div class="p-2 flex-fill">Search</div> <input type="text" name="search" class="form-control" placeholder="ketik keyword ...">
            </div>

            <table class="table table-striped border-top mx-3 mt-4" style="width: 1000px;">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">BTS</th>
                  <th scope="col">Tanggal Kunjungan</th>
                  <th scope="col">Kondisi</th>
                  <th scope="col">Surveyor</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $count = 1; ?>
                <?php if (isset($selectedBts)) { foreach ($selectedBts as $row) { ?>
                  <tr>
                    <th scope="row"><?= $count ?></th>
                    <td id="tahun"><?= $row['tahun'] ?></td>
                    <td id="bts_tabel"><?php $bts_tabel = select("SELECT nama FROM bts WHERE id = " . $row['bts_id']); echo $bts_tabel[0]['nama']; ?></td>
                    <td id="tgl_kunjungan"><?= $row['tgl_kunjungan'] ?></td>
                    <td id="kondisi_id"><?php $kondisi = select("select nama from kondisi_bts where id = " . $row['kondisi_bts_id']);
                        echo $kondisi[0]['nama']; ?></td>
                    <td id="surveyor_id"><?php $surveyor = select("select name from users where id = " . $row['user_surveyor_id']);
                        echo $surveyor[0]['name']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#myEdit1" data-id="<?= $row['id'] ?>" data-bts_id="<?= $_GET['bts'] ?>" data-surveyor_id="<?= $row['user_surveyor_id'] ?>" data-kondisi_id="<?= $row['kondisi_bts_id'] ?>"><i class="bi-pencil-square"></i></button>
                        <a href="../../functions/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm me-3" onclick="return confirm('Anda yakin?');"><i class="bi-trash"></i></a>
                        <a href="#" class="btn btn-success btn-sm "><i class="bi-arrow-right"></i></a>
                    </td>
                  </tr>
                <?php $count += 1; }
                } else { foreach ($dataMonitoring as $row) { ?>
                  <tr>
                    <th scope="row"><?= $count ?></th>
                    <td id="tahun"><?= $row['tahun'] ?></td>
                    <td id="bts_tabel"><?php $bts_tabel = select("SELECT nama FROM bts WHERE id = " . $row['bts_id']); echo $bts_tabel[0]['nama']; ?></td>
                    <td id="tgl_kunjungan"><?= $row['tgl_kunjungan'] ?></td>
                    <td id="kondisi_id"><?php $kondisi = select("select nama from kondisi_bts where id = " . $row['kondisi_bts_id']);
                        echo $kondisi[0]['nama']; ?></td>
                    <td id="surveyor_id"><?php $surveyor = select("select name from users where id = " . $row['user_surveyor_id']);
                        echo $surveyor[0]['name']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#myEdit1" data-id="<?= $row['id'] ?>" data-bts_id="<?= $row['bts_id'] ?>" data-surveyor_id="<?= $row['user_surveyor_id'] ?>" data-kondisi_id="<?= $row['kondisi_bts_id'] ?>"><i class="bi-pencil-square"></i></button>
                        <a href="../../functions/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm me-3" onclick="return confirm('Anda yakin?');"><i class="bi-trash"></i></a>
                        <a href="#" class="btn btn-success btn-sm "><i class="bi-arrow-right"></i></a>
                    </td>
                  </tr>
                <?php $count += 1; }}
                ?>

              </tbody>
            </table>
            
            <ul class="pagination mr-30 ml-15 ps-3 ">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </div>
        </div>

        <!-- The Modal Edit -->
        <div class="modal fade" id="myEdit1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Data Monitoring</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" action="../../functions/update.php">
                  <input type="hidden" name="id" value="">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="bts" class="form-label">BTS</label>
                    <select class="form-select" id="bts" name="bts" value="">
                      <?php foreach ($dataBts as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                    <input type="date" name="tgl_kunjungan" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label>Kondisi BTS</label>
                    <select class="form-select" id="kondisi_bts" name="kondisi_bts" value="">
                      <?php $kondisiBts = select("select * from kondisi_bts"); ?>
                      <?php foreach ($kondisiBts as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Surveyor</label>
                    <select class="form-select" id="surveyor" name="surveyor" value="">
                      <?php $surveyor = select("select * from users"); ?>
                      <?php foreach ($surveyor as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>


            </div>
          </div>
        </div>


  </main>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    $('#myEdit1').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      var tahun = $('#tahun').text();
      var bts = $(e.relatedTarget).data('bts_id');
      var tgl_kunjungan = $('#tgl_kunjungan').text();
      var kondisi_id = $(e.relatedTarget).data('kondisi_id');
      var surveyor_id = $(e.relatedTarget).data('surveyor_id');

      $(e.currentTarget).find('input[name="id"]').val(id);
      $(e.currentTarget).find('input[name="tahun"]').val(tahun);
      $(e.currentTarget).find('select[name="bts"]').val(bts);
      $(e.currentTarget).find('input[name="tgl_kunjungan"]').val(tgl_kunjungan);
      $(e.currentTarget).find('select[name="kondisi_bts"]').val(kondisi_id);
      $(e.currentTarget).find('select[name="surveyor"]').val(surveyor_id);
    });

    if(/index/.test(window.location.href)) {
        $('[href="../home/index.php"]').addClass("active");
    } else if (/dataBTS/.test(window.location.href) || /dataMonitoring/.test(window.location.href) || /dataOperator/.test(window.location.href)){
        $('#masterData').addClass("active");
    } else if (/MapsBTS/.test(window.location.href)){
        $('[href="/bts-project/src/view/maps/MapsBTS.php"]').addClass("active");
    } else {
        alert(window.location.href);
    }

  </script>

</body>

</html>

<?php 
    } else {
        header('Location: ../login/index.php');
        exit();
    }
?>
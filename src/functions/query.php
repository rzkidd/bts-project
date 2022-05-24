<?php
    $mysqli = new mysqli("localhost","root","","bts-project");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } 

    function select($query){
        global $mysqli;
        if ($result = $mysqli->query($query)) {
            $row = $result -> fetch_all(MYSQLI_ASSOC);
        }
        return $row;
    }

    function update($request){
        global $mysqli;
        $id = $request['id'];
        $tahun = $request['tahun'];
        $bts = $request['bts'];
        $tgl_kunjungan = $request['tgl_kunjungan'];
        $kondisi_bts = $request['kondisi_bts'];
        $surveyor = $request['surveyor'];

        $query = "update monitorings set tahun = '$tahun', bts_id = $bts, tgl_kunjungan = '$tgl_kunjungan', kondisi_bts_id = $kondisi_bts, user_surveyor_id = $surveyor where id = $id";

        if ($result = $mysqli->query($query)){
            return $result;
        } else {
            echo $mysqli->error;
        }

    }

    function delete($id){
        global $mysqli;
        $query = "delete from monitorings where id = $id";

        if ($result = $mysqli->query($query)){
            return $result;
        } else {
            echo $mysqli->error;
        }
    }
?>
<?php

namespace Master;

use Config\Query_builder;

class Peminjam
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table(' peminjam ')->get()->resultArray();
        $res = '<a href="?target=peminjam&act=tambah_peminjam" class="btn btn-info btn-sm">Tambah peminjam</a><br><br>
    <div class="table-responsive">
    <table class="table table-striped">
    <thead class="table-primary">
    <tr>
    <th>No</th>
    <th>ID </th>
    <th>NAMA PEMINJAM</th>
    <th>ALAMAT</th>
    <th>KEPENTINGAN</th>

    <th>Act</th>
    </tr>
    </thead>
    <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
            <td width="10">' . $no . '</td>
            <td width="15">' . $r['id_peminjam'] . '</td>
            <td width="150">' . $r['nama_peminjam'] . '</td>
            <td width="150">' . $r['alamat'] . '</td>
            <td width="200">' . $r['kepentingan'] . '</td>
            <td width="100">
        <a href="?target=peminjam&act=edit_peminjam&id_peminjam=' . $r['id_peminjam'] . '" class="btn btn-success btn-sm">Edit</a>
        <a href="?target=peminjam&act=delete_peminjam&id_peminjam=' . $r['id_peminjam'] . '" class="btn btn-danger btn-sm">Hapus</a>
        </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=peminjam" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=peminjam&act=simpan_peminjam">
    <div class="mb-3">
    <label for="id_peminjam" class="form-label">Id Peminjam</label>
    <input type="text" class="form-control" id="id_peminjam" name="id_peminjam">
    </div>
    <div class="mb-3">
    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
    <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
    </div>
    <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
    <div class="mb-3">
    <label for="kepentingan" class="form-label">Kepentingan</label>
    <input type="text" class="form-control" id="kepentingan" name="kepentingan">
    </div>


    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>';
        return $res;
    }
    public function simpan()
    {
        $id_peminjam = $_POST['id_peminjam'];
        $nama_peminjam = $_POST['nama_peminjam'];
        $alamat = $_POST['alamat'];
        $kepentingan = $_POST['kepentingan'];

        $data = array(
            'id_peminjam' => $id_peminjam,
            'nama_peminjam' => $nama_peminjam,
            'alamat' => $alamat,
            'kepentingan' => $kepentingan,
        );
        return $this->db->table('peminjam')->insert($data);
    }
    public function edit($id_peminjam)
    {
        // get data peminjam
        $r = $this->db->table('peminjam ')->where(" id_peminjam='$id_peminjam'")->get()->rowArray();
        //cek radio

        $res = '<a href="?taget=peminjam" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=peminjam&act=update_peminjam">
    <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_peminjam'] . '">

    <div class="mb-3">
        <label for="id_peminjam" class="form-label">Id Peminjam</label>
        <input type="text" class="form-control" id="id_peminjam" name="id_peminjam" value="' . $r['id_peminjam'] . '">
    </div>
    <div class="mb-3">
        <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="' . $r['nama_peminjam'] . '">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="' . $r['alamat'] . '">
    </div>
    <div class="mb-3">
        <label for="kepentingan" class="form-label"Kepentingan</label>
        <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="' . $r['kepentingan'] . '">
    </div>

    </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form> ';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
        $id_peminjam = $_POST['id_peminjam'];
        $nama_peminjam = $_POST['nama_peminjam'];
        $alamat = $_POST['alamat'];
        $kepentingan = $_POST['kepentingan'];

        $data = array(
            'id_peminjam' => $id_peminjam,
            'nama_peminjam' => $nama_peminjam,
            'alamat' => $alamat,
            'kepentingan' => $kepentingan,

        );
        return $this->db->table('peminjam ')->where(" id_peminjam='$param'")->update($data);
    }
    public function delete($id_peminjam)
    {
        return $this->db->table('peminjam')->where(" id_peminjam='$id_peminjam' ")->delete();
    }

}

<?php
namespace Master;

use Config\Query_builder;

class Prototipe
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table(' prototipe ')->get()->resultArray();
        $res = '<a href="?target=prototipe&act=tambah_prototipe" class="btn btn-info btn-sm">Tambah prototipe</a><br><br>
    <div class="table-responsive">
    <table class="table table-striped">
    <thead class="table-primary">
    <tr>
    <th>No</th>
    <th>ID Prototipe</th>
    <th>ID Tema</th>
    <th>NAMA PROTOTIPE</th>
    <th>JUMLAH</th>
    <th>TANGGAL MASUK</th>
    <th>PEMBUAT</th>
    <th>Act</th>
    </tr>
    </thead>
    <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
        <td width="10">' . $no . '</td>
        <td width="100">' . $r['id_prototipe'] . '</td>
        <td width="100">' . $r['id_tema'] . '</td>
        <td width="200">' . $r['nama_prototipe'] . '</td>
        <td width="100">' . $r['jumlah'] . '</td>
        <td width="200">' . $r['tanggal_masuk'] . '</td>
        <td width="200">' . $r['pembuat'] . '</td>
        <td width="100">
        <a href="?target=prototipe&act=edit_prototipe&id_prototipe=' . $r['id_prototipe'] . '" class="btn btn-success btn-sm">Edit</a>
        <a href="?target=prototipe&act=delete_prototipe&id_prototipe=' . $r['id_prototipe'] . '" class="btn btn-danger btn-sm">Hapus</a>
        </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=prototipe" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=prototipe&act=simpan_prototipe">
    <div class="mb-3">
    <label for="id_prototipe" class="form-label">Id Prototipe</label>
    <input type="text" class="form-control" id="id_prototipe" name="id_prototipe">
    </div>
    <div class="mb-3">
    <label for="id_tema" class="form-label">Id Tema</label>
    <input type="text" class="form-control" id_tema="id_tema" name="id_tema">
    </div>
    <div class="mb-3">
    <label for="nama_prototipe" class="form-label">Nama Prototipe</label>
    <input type="text" class="form-control" id="nama_prototipe" name="nama_prototipe">
    </div>
    <div class="mb-3">
    <label for="jumlah" class="form-label">Jumlah</label>
    <input type="text" class="form-control" id="jumlah" name="jumlah">
    </div>
    <div class="mb-3">
    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
    </div>
    <div class="mb-3">
    <label for="pembuat" class="form-label">Pembuat</label>
    <input type="text" class="form-control" id="pembuat" name="pembuat">
    </div>

    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>';
        return $res;
    }
    public function simpan()
    {
        $id_prototipe = $_POST['id_prototipe'];
        $id_tema = $_POST['id_tema'];
        $nama_prototipe = $_POST['nama_prototipe'];
        $jumlah = $_POST['jumlah'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $pembuat = $_POST['pembuat'];

        $data = array(
            'id_prototipe' => $id_prototipe,
            'id_tema' => $id_tema,
            'nama_prototipe' => $nama_prototipe,
            'jumlah' => $jumlah,
            'tanggal_masuk' => $tanggal_masuk,
            'pembuat' => $pembuat,
        );
        return $this->db->table('prototipe')->insert($data);
    }
    public function edit($id_prototipe)
    {
        // get data prototipe
        $r = $this->db->table('prototipe ')->where(" id_prototipe='$id_prototipe'")->get()->rowArray();
        //cek radio

        $res = '<a href="?taget=prototipe" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=prototipe&act=update_prototipe">
    <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_prototipe'] . '">

    <div class="mb-3">
        <label for="id_prototipe" class="form-label">id prototipe</label>
        <input type="text" class="form-control" id="id_prototipe" name="id_prototipe" value="' . $r['id_prototipe'] . '">
    </div>
    <div class="mb-3">
        <label for="id_tema" class="form-label">id_tema</label>
        <input type="text" class="form-control" id_tema="id_tema" name="id_tema" value="' . $r['id_tema'] . '">
    </div>
    <div class="mb-3">
        <label for="nama_prototipe" class="form-label">Nama_prototipe</label>
        <input type="text" class="form-control" id="nama_prototipe" name="nama_prototipe" value="' . $r['nama_prototipe'] . '">
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">jumlah</label>
        <input type="text" class="form-control" id="jumlah" name="jumlah" value="' . $r['jumlah'] . '">
    </div>
    <div class="mb-3">
        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="' . $r['tanggal_masuk'] . '">
    </div>
    <div class="mb-3">
        <label for="pembuat" class="form-label">pembuat</label>
        <input type="text" class="form-control" id="pembuat" name="pembuat" value="' . $r['pembuat'] . '">
    </div>

    </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form> ';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
        $id_prototipe = $_POST['id_prototipe'];
        $id_tema = $_POST['id_tema'];
        $jumlah = $_POST['jumlah'];
        $nama_prototipe = $_POST['nama_prototipe'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $pembuat = $_POST['pembuat'];

        $data = array(
            'id_prototipe' => $id_prototipe,
            'id_tema' => $id_tema,
            'nama_prototipe' => $nama_prototipe,
            'jumlah' => $jumlah,
            'tanggal_masuk' => $tanggal_masuk,
            'pembuat' => $pembuat,
        );
        return $this->db->table('prototipe ')->where(" id_prototipe='$param'")->update($data);
    }
    public function delete($id_prototipe)
    {
        return $this->db->table('prototipe')->where(" id_prototipe='$id_prototipe' ")->delete();
    }

}

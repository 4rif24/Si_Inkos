<?php

namespace Master;

use Config\Query_builder;

class Tema
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table(' tema ')->get()->resultArray();
        $res = '<a href="?target=tema&act=tambah_tema" class="btn btn-info btn-sm">Tambah tema</a><br><br>
    <div class="table-responsive">
    <table class="table table-striped">
    <thead class="table-primary">
    <tr>
    <th>No</th>
    <th>ID TEMAZ</th>
    <th>NAMA</th>
    <th>TAHUN</th>
    <th>JUMLAH PROTOTIPE</th>
    <th>PENYUSUN</th>
    <th>Act</th>
    </tr>
    </thead>
    <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
       <td width="10">' . $no . '</td>
        <td width="100">' . $r['id_tema'] . '</td>
        <td width="200">' . $r['nama'] . '</td>
        <td width="50">' . $r['tahun'] . '</td>
        <td width="100">' . $r['jumlah_prototipe'] . '</td>
        <td width="100">' . $r['penyusun'] . '</td>
        <td width="100">
        <a href="?target=tema&act=edit_tema&id_tema=' . $r['id_tema'] . '" class="btn btn-success btn-sm">Edit</a>
        <a href="?target=tema&act=delete_tema&id_tema=' . $r['id_tema'] . '" class="btn btn-danger btn-sm">Hapus</a>
        </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=tema" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tema&act=simpan_tema">
    <div class="mb-3">
    <label for="id_tema" class="form-label">id_tema</label>
    <input type="text" class="form-control" id="id_tema" name="id_tema">
    </div>
    <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
    <label for="tahun" class="form-label">Tahun</label>
    <input type="text" class="form-control" id="tahun" name="tahun">
    </div>
    <div class="mb-3">
    <label for="jumlah_prototipe" class="form-label">Jumlah_Prototipe</label>
    <input type="text" class="form-control" id="jumlah_prototipe" name="jumlah_prototipe">
    </div>
    <div class="mb-3">
    <label for="penyusun" class="form-label">Penyusun</label>
    <input type="text" class="form-control" id="penyusun" name="penyusun">
    </div>

    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>';
        return $res;
    }
    public function simpan()
    {
        $id_tema = $_POST['id_tema'];
        $nama = $_POST['nama'];
        $tahun = $_POST['tahun'];
        $jumlah_prototipe = $_POST['jumlah_prototipe'];
        $penyusun = $_POST['penyusun'];

        $data = array(
            'id_tema' => $id_tema,
            'nama' => $nama,
            'tahun' => $tahun,
            'jumlah_prototipe' => $jumlah_prototipe,
            'penyusun' => $penyusun,
        );
        return $this->db->table('tema')->insert($data);
    }
    public function edit($id_tema)
    {
        // get data tema
        $r = $this->db->table('tema')->where(" id_tema='$id_tema'")->get()->rowArray();
        //cek radio

        $res = '<a href="?taget=tema" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tema&act=update_tema">
    <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_tema'] . '">

    <div class="mb-3">
        <label for="id_tema" class="form-label">id_tema</label>
        <input type="text" class="form-control" id="id_tema" name="id_tema" value="' . $r['id_tema'] . '">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
    </div>
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="text" class="form-control" id="tahun" name="tahun" value="' . $r['tahun'] . '">
    </div>
    <div class="mb-3">
        <label for="jumlah_prototipe" class="form-label"Jumlah Prototipe</label>
        <input type="text" class="form-control" id="jumlah_prototipe" name="jumlah_prototipe" value="' . $r['jumlah_prototipe'] . '">
    </div>
    <div class="mb-3">
        <label for="penyusun" class="form-label">penyusun</label>
        <input type="text" class="form-control" id="penyusun" name="penyusun" value="' . $r['penyusun'] . '">
    </div>

    </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form> ';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
        $id_tema = $_POST['id_tema'];
        $nama = $_POST['nama'];
        $tahun = $_POST['tahun'];
        $jumlah_prototipe = $_POST['jumlah_prototipe'];
        $penyusun = $_POST['penyusun'];

        $data = array(
            'id_tema' => $id_tema,
            'nama' => $nama,
            'tahun' => $tahun,
            'jumlah_prototipe' => $jumlah_prototipe,
            'penyusun' => $penyusun,
        );
        return $this->db->table('tema')->where(" id_tema='$param'")->update($data);
    }
    public function delete($id_tema)
    {
        return $this->db->table('tema')->where(" id_tema='$id_tema' ")->delete();
    }

}

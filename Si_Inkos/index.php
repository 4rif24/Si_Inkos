<?php

use Master\Menu;
use Master\Peminjam;
use Master\Prototipe;
use Master\Tema;

include 'autoload.php';
include 'Config/Database.php';

$menu = new Menu();
$tema = new Tema($dataKoneksi);
$prototipe = new Prototipe($dataKoneksi);
$peminjam = new Peminjam($dataKoneksi);
// $tema->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Si_Inkos</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand"><img src="assets/bwi-fest.jpg" width="200px" height="60"px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
foreach ($menu->topMenu() as $r) {
    ?>
                        <li class="nav-tem">
                            <a href="<?php echo $r['Link']; ?>" class="nav-link">
                            <?php echo $r['Text']; ?>
                        </a>
                        </li>
                        <?php
}
?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Data <?php echo strtoupper($target); ?></h5>
            <?php
if (!isset($target) or $target == "home") {
    echo "Hai, Selamat Datang Di Beranda";
    // ================= strat kontent tema ======================
} elseif ($target == "tema") {
    if ($act == "tambah_tema") {
        echo $tema->tambah();
    } elseif ($act == "simpan_tema") {
        if ($tema->simpan()) {
            echo "<script>
                              alert('data sukses disimpan');
                              window.location.href='?target=tema';
                              </script>";
        } else {
            echo "<script>
                              alert('data gagal disimpan');
                              window.location.href='?target=tema';
                              </script>";
        }
    } elseif ($act == "edit_tema") {
        $id_tema = $_GET['id_tema'];
        echo $tema->edit($id_tema);
    } elseif ($act == "update_tema") {
        if ($tema->update()) {
            echo "<script>
                              alert('data sucses di ubah');
                              window.location.href='?target=tema';
                              </script>";
        } else {
            echo "<script>
                              alert('data gagal di ubah');
                              window.location.href='?target=tema';
                              </script>";
        }
    } elseif ($act == "delete_tema") {
        $id_tema = $_GET['id_tema'];
        if ($tema->delete($id_tema)) {
            echo "<script>
                        alert('data sukses di hapus');
                        window.location.href='?target=tema';
                            </script>";
        } else {
            echo "<script>
                        alert('data gagal di hapus');
                        window.location.href='?target=tema';
                              </script>";

        }
    } else {
        echo $tema->index();
    }

} elseif ($target == "prototipe") {
    if ($act == "tambah_prototipe") {
        echo $prototipe->tambah();
    } elseif ($act == "simpan_prototipe") {
        if ($prototipe->simpan()) {
            echo "<script>
                              alert('data sukses disimpan');
                              window.location.href='?target=prototipe';
                              </script>";
        } else {
            echo "<script>
                              alert('data gagal disimpan');
                              window.location.href='?target=prototipe';
                              </script>";
        }
    } elseif ($act == "edit_prototipe") {
        $id_prototipe = $_GET['id_prototipe'];
        echo $prototipe->edit($id_prototipe);
    } elseif ($act == "update_prototipe") {
        if ($prototipe->update()) {
            echo "<script>
                              alert('data sucses di ubah');
                              window.location.href='?target=prototipe';
                              </script>";
        } else {
            echo "<script>
                              alert('data gagal di ubah');
                              window.location.href='?target=prototipe';
                              </script>";
        }
    } elseif ($act == "delete_prototipe") {
        $id_prototipe = $_GET['id_prototipe'];
        if ($prototipe->delete($id_prototipe)) {
            echo "<script>
                        alert('data sukses di hapus');
                        window.location.href='?target=prototipe';
                            </script>";
        } else {
            echo "<script>
                        alert('data gagal di hapus');
                        window.location.href='?target=prototipe';
                              </script>";

        }
    } else {
        echo $prototipe->index();
    }
} elseif ($target == "peminjam") {
    if ($act == "tambah_peminjam") {
        echo $peminjam->tambah();
    } elseif ($act == "simpan_peminjam") {
        if ($peminjam->simpan()) {
            echo "<script>
                              alert('data sukses disimpan');
                              window.location.href='?target=peminjam';
                              </script>";
        } else {
            echo "<script>
                              alert('data gagal disimpan');
                              window.location.href='?target=peminjam';
                              </script>";
        }
    } elseif ($act == "edit_peminjam") {
        $id_peminjam = $_GET['id_peminjam'];
        echo $peminjam->edit($id_peminjam);
    } elseif ($act == "update_peminjam") {
        if ($peminjam->update()) {
            echo "<script>
                              alert('data sucses di ubah');
                              window.location.href='?target=peminjam';
                              </script>";
        } else {
            echo "<script>
                              alert('data gagal di ubah');
                              window.location.href='?target=peminjam';
                              </script>";
        }
    } elseif ($act == "delete_peminjam") {
        $id_peminjam = $_GET['id_peminjam'];
        if ($peminjam->delete($id_peminjam)) {
            echo "<script>
                        alert('data sukses di hapus');
                        window.location.href='?target=peminjam';
                            </script>";
        } else {
            echo "<script>
                        alert('data gagal di hapus');
                        window.location.href='?target=peminjam';
                              </script>";

        }
    } else {
        echo $peminjam->index();
    }
} else {
    echo "page 404 Not found";
}
?>
        </div>
    </div>
</body>
</html>
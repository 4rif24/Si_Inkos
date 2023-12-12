<?php
namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/ZAINULARIFIN2021503053/Si_Inkos/index.php?target=";
        $data = [
            array('Text' => 'Home', 'Link' => $base . 'home'),
            array('Text' => 'Tema', 'Link' => $base . 'tema'),
            array('Text' => 'Prototipe Kostum', 'Link' => $base . 'prototipe'),
            array('Text' => 'Peminjam', 'Link' => $base . 'peminjam'),
        ];
        return $data;
    }
}

<?php

// class: blueprint untuk menghasilkan sebuah object
//  property : {nama: reza}
// variable di dalam class
// method/function :
// object/instance : menghasilkan sebuah object

class Siswa
{
    public $nama;
    public $nik;
    public $jurusan;
    public $nilai;


    public function __construct($nama, $nik, $jurusan, $nilai)
    {
        $this->nama = $nama;
        $this->nik = $nik;
        $this->jurusan = $jurusan;
        $this->nilai = $nilai;

        echo "Selamat Datang {$this->nama} ({$this->nik}) <br>";
    }

    public function callName()
    {
        return "Halo " . $this->nama;
    }

    public function getNik()
    {
        return $this->nik;
    }
}

$siswa = new Siswa("Rudi Hartanto", "2011330056", "Web Programming", 100);
$siswa2 = new Siswa("Budi Hartanto", "2011330057", "Web Programming", 52);

echo "Nama : " . $siswa->nama . "<br>";
echo "Nik: " . $siswa->nik . "<br>";
echo "Jurusan: " . $siswa->jurusan . "<br>";
echo "Nilai: " . $siswa->nilai . "<br>";

echo $siswa2->callName();

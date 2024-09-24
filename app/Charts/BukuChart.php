<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penuli;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
class BukuChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build()
    {

        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenuli = Penuli::count();
        $jumlahkategori = Kategori::count();
        
        return $this->chart->barChart()
            ->addData('Buku', [$jumlahbuku])
            ->addData('Penerbit', [$jumlahpenerbit])
            ->addData('Penulis', [$jumlahpenuli])
            ->addData('Kategori', [$jumlahkategori])
            ->setHeight(350)
            ->setWidth(500)
            ->setXAxis(['Data']);
            // ->setColors(['#FF5733', '#33FF57', '#3357FF', '#F1C40F']);
     }
    
}
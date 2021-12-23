<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Barang;
use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use \Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});
class OrderExport2 implements FromView
{
    protected $id, $x, $y;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function registerEvents(): array
    {
        $styleBold = [
            'font' => [
                'bold' => true,
            ]
        ];

        return [
            AfterSheet::class => function (AfterSheet $event) use ($styleBold) {
                $cellRange = 'A1:W1'; // All headers
                $cellRange1 = 'A3:' . $this->x . $this->y;
                $event->sheet->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getStyle('A1:Z4')->applyFromArray($styleBold);
                $event->sheet->getStyle('A1:B20')->applyFromArray($styleBold);
                $event->sheet->styleCells(
                    $cellRange1,
                    [
                        'borders' => [
                            'inside' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => '000000'],
                            ],
                        ]
                    ]
                );

                $event->sheet->styleCells(
                    $cellRange1,
                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => '000000'],
                            ],
                        ]
                    ]
                );
            },
        ];
    }

    public function view(): View
    {
        $data = Order::find($this->id);
        $data2 = DB::table('barang')
            ->rightjoin('hasilproduksi', 'hasilproduksi.id_barang', '=', 'barang.id_barang')
            ->select('hasilproduksi.*', 'barang.*')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $data3 = DB::table('pembelian')
            ->join('hasilproduksi', 'pembelian.id_produksi', '=', 'hasilproduksi.id_produksi')
            ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->selectRaw('pembelian.id_barang, pembelian.tgl_pembelian, pembelian.total_harga, pembelian.id_aksesoris, aksesoris.nama_aksesoris, SUM(pembelian.total_harga) as jml_pembelian')
            ->groupByRaw('id_barang, id_aksesoris')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $datakbt = DB::table('kebutuhan')
            ->join('hasilproduksi', 'hasilproduksi.id_barang', '=', 'kebutuhan.id_barang')
            ->join('barang', 'barang.id_barang', '=', 'kebutuhan.id_barang')
            ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'kebutuhan.id_aksesoris')
            ->select('aksesoris.id_aksesoris', 'aksesoris.nama_aksesoris', 'kebutuhan.*', 'hasilproduksi.id_produksi')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $dataused = DB::table('hasilproduksi')
            ->join('kebutuhan', 'kebutuhan.id_barang', '=', 'hasilproduksi.id_barang')
            ->select('kebutuhan.*')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $dataacc = DB::table('aksesoris')
            ->join('pembelian', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->join('hasilproduksi', 'pembelian.id_produksi', '=', 'hasilproduksi.id_produksi')
            ->select('aksesoris.nama_aksesoris', 'aksesoris.id_aksesoris')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->groupBy('aksesoris.id_aksesoris')
            ->get();
        $datatotal = DB::table('aksesoris')
            ->join('pembelian', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->join('hasilproduksi', 'pembelian.id_produksi', '=', 'hasilproduksi.id_produksi')
            ->selectRaw('SUM(pembelian.jml_pembelian) as jml')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->groupBy('pembelian.id_aksesoris')
            ->get();

        $a = count($dataacc);
        if ($a == 1) {
            $this->x = 'H';
        } else if ($a == 2) {
            $this->x = 'K';
        } else if ($a == 3) {
            $this->x = 'N';
        } else if ($a == 4) {
            $this->x = 'Q';
        } else if ($a == 5) {
            $this->x = 'T';
        } else if ($a == 6) {
            $this->x = 'W';
        } else if ($a == 7) {
            $this->x = 'Z';
        } else if ($a == 8) {
            $this->x = 'AC';
        } else if ($a == 9) {
            $this->x = 'AF';
        } else if ($a == 10) {
            $this->x = 'AJ';
        } else {
            $this->x = 'E';
        }

        $this->y = count($data2) + 6;

        return view('data', [
            'order' => $data,
            'produksi' => $data2,
            'pembelian' => $data3,
            'kebutuhan' => $datakbt,
            'aksesoris' => $dataacc,
            'total' => $datatotal,
            'used' => $dataused
        ]);
    }
}
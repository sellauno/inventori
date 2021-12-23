<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Barang;
use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use \Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class OrderSheet implements WithMultipleSheets
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function sheets(): array
    {
        $sheets = [];

        return [
            new OrderExport($this->id),
            new OrderExport2($this->id),
        ];
    }
}

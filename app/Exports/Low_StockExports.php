<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Override;

class Low_StockExports implements FromQuery, WithHeadings{
    use Exportable;
    private $colummn = ["product_name","sku","created_at"];
    public function query(){
        return Product::query()
        ->select($this->colummn)
        ->whereColumn("stock","<","min_stock");
    }
    #[Override]
    public function headings(): array
    {
        return $this->colummn;
    }
}
?>
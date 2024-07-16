<?php
namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'] ?? 'No Name',
            'description' => $row['description'] ?? 'No Description',
            'categories' => $row['categories'] ?? 'No category',
            'price' => $row['price'] ?? 0,
            'image' => $row['image'] ?? null,
        ]);
    }
}

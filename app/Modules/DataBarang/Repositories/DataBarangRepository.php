<?php

namespace App\Modules\DataBarang\Repositories;

use App\Modules\DataBarang\Models\DataBarang;

class DataBarangRepository
{
    public static function datatable($per_page = 15)
    {
        $data = DataBarang::paginate($per_page);
        return $data;
    }
    public static function get($data_barang_id)
    {
        $data_barang = DataBarang::where('id', $data_barang_id)->first();
        return $data_barang;
    }
    public static function create($data_barang)
    {
        $data_barang = DataBarang::create($data_barang);
        return $data_barang;
    }

    public static function update($data_barang_id, $data_barang)
    {
        DataBarang::where('id', $data_barang_id)->update($data_barang);
        $data_barang = DataBarang::where('id', $data_barang_id)->first();
        return $data_barang;
    }

    public static function delete($data_barang_id)
    {
        $delete = DataBarang::where('id', $data_barang_id)->delete();
        return $delete;
    }
}

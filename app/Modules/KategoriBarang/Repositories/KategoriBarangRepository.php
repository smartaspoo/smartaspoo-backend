<?php

namespace App\Modules\KategoriBarang\Repositories;

use App\Modules\KategoriBarang\Models\KategoriBarang;

class KategoriBarangRepository
{
    public static function datatable($per_page = 15)
    {
        $data = KategoriBarang::paginate($per_page);
        return $data;
    }
    public static function get($kategori_barang_id)
    {
        $kategori_barang = KategoriBarang::where('id', $kategori_barang_id)->first();
        return $kategori_barang;
    }
    public static function create($kategori_barang)
    {
        $kategori_barang = KategoriBarang::create($kategori_barang);
        return $kategori_barang;
    }

    public static function update($kategori_barang_id, $kategori_barang)
    {
        KategoriBarang::where('id', $kategori_barang_id)->update($kategori_barang);
        $kategori_barang = KategoriBarang::where('id', $kategori_barang_id)->first();
        return $kategori_barang;
    }

    public static function delete($kategori_barang_id)
    {
        $delete = KategoriBarang::where('id', $kategori_barang_id)->delete();
        return $delete;
    }
}

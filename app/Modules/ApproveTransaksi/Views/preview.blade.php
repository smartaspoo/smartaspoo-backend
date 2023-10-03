@extends('dashboard_layout.index')
@section('content')
    @php
        function rupiah($angka)
        {
            $rupiah = 'Rp. ' . number_format($angka, 0, ',', '.');
            return $rupiah;
        }
    @endphp
    <div class="container mt-4 mb-0" id="container">
        <section class="card mb-0">
            <div class="card-header">
                <div class="card-title">Detail Transaksi</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <section class="col-md-12">
                        <section class="row">
                            <div class="col-md-6">
                                <p><b>Kode Transaksi : </b> {{ $data->kode_transaksi }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Alamat : </b> {{ $data->alamat }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Pesan : </b> {{ $data->pesan }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Pembeli : </b> {{ $data->pembeli->name }}</p>
                            </div>
                        </section>
                    </section>
                    <hr>
                    <section class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nomor</td>
                                    <td>Foto</td>
                                    <td>Nama Barang</td>
                                    <td>Harga</td>
                                    <td>Quantity</td>
                                    <td>Total Harga</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $total = 0;
                                @endphp
                                @foreach ($data->dataChildren as $child)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> <img src="{{ url('') . $child->barang->thumbnail }}" width="30px"
                                                height="30px">
                                        </td>
                                        <td>{{ $child->barang->nama_barang }}</td>
                                        <td>{{ rupiah($child->harga) }}</td>
                                        <td>{{ $child->jumlah }}</td>
                                        <td>{{ rupiah(intval($child->jumlah) * intval($child->harga)) }}</td>
                                        @php
                                            $total += intval($child->jumlah) * intval($child->harga);
                                        @endphp
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-center">Total Pembelian</td>
                                    <td>{{ rupiah($total) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </section>
                    <section class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Penjual : </b> {{ $data->penjual->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Tanggal Transaksi : </b> {{ $data->created_at }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Biaya Pengiriman : </b> {{ $data->biaya_pengiriman }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Kurir : </b> {{ $data->kurir_pengiriman }}</p>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <h3 class="text-danger"><b>Grand Total : </b>
                                    {{ rupiah($total + $data->biaya_pengiriman) }}</h3>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button @click="approve('{{ $data->kode_transaksi }}')" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </section>
    </div>

    <script>
        Vue.createApp({
            methods: {
                async approve(kode) {
                    console.log(kode)
                    try {
                        showLoading()
                        const response = await httpClient.post("{!! url('approve-transaksi/preview/') !!}",{kode})
                        hideLoading()
                        showToast({
                            message: "Data berhasil di Approve!"
                        })
                        history.back()

                    } catch (err) {
                        hideLoading()
                        showToast({
                            message: err.message,
                            type: 'error'
                        })
                    }
                }
            }
        }).mount("#container")
    </script>
@endsection

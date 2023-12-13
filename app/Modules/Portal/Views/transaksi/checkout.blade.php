@extends('portal_layout.templates')
@section('content')
    @php
        function rupiah($angka)
        {
            $rupiah = 'Rp ' . number_format($angka, 0, ',', '.');
            return $rupiah;
        }
        $totalHarga = 0;
    @endphp
    <main class="container" id="container" style="margin-top: 50px; font-size: 16px;">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ URL::asset('/img/portal/Address.png') }}" alt="alamat" class="img-fluid">
                    </div>
                    <div class="col-md-10">
                        <h4><b>Alamat Pengiriman</b></h4>
                        <p>{{ $user->name }} | {{ @$user->detail->telepon }} <br>
                            {{ @$user->detail->alamat }}
                        </p>
                    </div>
                </div>
                <hr class="border border-danger border-2 opacity-50">

            </div>
            <?php
            $iteration = 0;
            ?>
            @foreach ($data as $data_group_seller_id)
                @if ($data_group_seller_id[0]->barang->harga_user != null)
                    <div class="col-md-12">
                        <span class="badge badge-danger"> <span class="badge badge-danger">Penjual
                                {{ @$data_group_seller_id[0]->barang->user->nama }}</span>
                        </span>
                    </div>
                @endif
                <?php
                $totalHargaPerSeller = 0;
                ?>
                @foreach ($data_group_seller_id as $keranjang)
                        <?php $barang = $keranjang->barang?>
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ $barang->thumbnail_readable }}" alt="Product Image"
                                                class="product-image" height="100">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row justify-content-between">
                                                <div class="col-md-6">
                                                    <p style="font-size: 18px"><b>{{ $barang->nama_barang }}</b></p>
                                                    {{-- <p>{{ rupiah($barang->harga_user) }}</p> --}}
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                        $satuanTotalHarga = $barang->harga_user * $keranjang->jumlah;
                                                        $totalHarga += $satuanTotalHarga;
                                                        $totalHargaPerSeller += $satuanTotalHarga;
                                                    @endphp
                                                    <br>
                                                    <p style="text-align: right">X {{ $keranjang->jumlah }}</p>
                                                    <p style="text-align: right">Total Harga : <b>
                                                            {{ rupiah($satuanTotalHarga) }}</b></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                @if ($data_group_seller_id[0]->barang->harga_user != null)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ongkir</label>
                            <input type="number" v-model="transaksi.ongkir[{{ $iteration }}]"
                                @input="countTotalPembayaran()" value="20000" name="ongkir[]" min="0"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <input type="text" v-model="transaksi.pesan[{{ $iteration }}]" value=" "
                                name="pesan[]" class="form-control">
                        </div>
                        <hr class="border border-danger border-2 opacity-50">

                    </div>
                    <?php $iteration++; ?>
                @endif
            @endforeach
            <div class="col-md-12">
                <h2>Rincian Pembayaran</h2>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <p>Subtotal Untuk Produk</p>
                            </div>
                            <div class="col-md-9">
                                {{ rupiah($totalHarga) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <p>Subtotal Untuk Pengiriman</p>
                            </div>
                            <div class="col-md-9">
                                @{{ rupiah(totalPengiriman) }}
                            </div>
                        </div>
                    </div>
               
                    <div class="col-md-12">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <p>Kode Unik</p>
                            </div>
                            <div class="col-md-9">
                                {{ rupiah($kodeUnik)}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <p>Total Pembayaran</p>
                            </div>
                            <div class="col-md-9">
                                @{{ rupiah(parseInt(totalPembayaran) + totalPengiriman + parseInt(kodeUnik)) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <button class="btn btn-danger btn-block" @click='saveCheckout()'>Buat Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        createApp({
            data() {
                return {
                    checkout: {
                        pesan: null,
                        ongkir: 20000,
                        alamat: "{{ $userdetail->alamat }}",
                    },
                    transaksi: {
                        ongkir: [],
                        pesan: [],
                    },
                    totalPengiriman: 0,
                    totalPembayaran: "{{ $totalHarga }}",
                    kodeUnik : "{{$kodeUnik}}"
                }
            },
            methods: {
                countTotalPembayaran() {
                    this.totalPengiriman = 0;
                    console.log(this.transaksi)
                    this.transaksi.ongkir.forEach(e => {
                        this.totalPengiriman += parseInt(e)
                    })
                },
                rupiah(amount) {
                    const rupiahFormat = "Rp " + amount.toLocaleString("id-ID");
                    return rupiahFormat;
                },
                async saveCheckout() {
                    try {
                        showLoading()
                        var data = {
                            "checkout": this.checkout,
                            "transaksi": this.transaksi,
                            "totalPengiriman": this.totalPengiriman,
                            "totalPembayaran": this.totalPembayaran,
                            'kodeUnik' : this.kodeUnik
                        }

                        const response = await httpClient.post("{{ url()->current() }}", data)
                        console.log(response)
                        
                        hideLoading()
                        showToast({
                            message: "Data berhasil ditambahkan"
                        })

                        var data =  response.data.result
                        window.location.href = `{{url("/")}}/p/checkout/success?kode=${data.kode_transaksi}`

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

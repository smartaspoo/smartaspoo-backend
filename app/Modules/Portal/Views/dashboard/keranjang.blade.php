@extends('portal_layout.templates')
@section('content')
    <div class="container mt-5" id="container">
        <div class="frame">
            <div class="title">
                <h2>Keranjang Belanja</h2>
            </div>

            <div class="content">
                <div class="cart-box">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="keranjang in keranjangList ">
                                <td><img :src="keranjang.barang.thumbnail_readable" alt="Product" style="width: 100px;">
                                </td>
                                <td>@{{ keranjang.barang.nama_barang }}</td>
                                <td class="product-price">@{{ rupiah(keranjang.barang.harga_user) }}</td>
                                <td>
                                    <input class="form-control-sm form-control" type="number" name="quantity"
                                        value="1" min="1" v-model="keranjang.jumlah">
                                </td>
                                <td><span class="total-sar">@{{ rupiah(keranjang.barang.harga_user * keranjang.jumlah) }}</span></td>
                                <td><button @click="hapusKeranjang(keranjang.id)" class="btn btn-danger">Hapus</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="payment-box float-right">
                    <div class="payment-info">
                        <div class="payment-section total-section">
                            <b>Total Sementara: <span class="payment-amount"
                                    id="total">@{{ totalKeranjang() }}</span></b><br>
                            <small class="text-secondary">*Total belum termasuk biaya ongkir</small>
                        </div>
                    </div><br>
                    <button class="btn btn-primary btn-block" @click="checkout()">Checkout</button>
                </div>
                <br><br><br>
                <br>
            </div>
        </div>
    </div>
    <script>
        createApp({
            data() {
                return {
                    keranjangList: [],
                    userRole: null,
                    keranjangTotal: 0,
                };
            },

            methods: {
                async checkout(){
                    try {
                        showLoading()
                        data = {data : JSON.stringify(this.keranjangList)}
                        const response = await httpClient.post(`{{ url('') }}/p/keranjang`,data)
                        hideLoading()
                        showToast({
                            message: "Berhasil checkout! Anda akan diarahkan ke halaman Checkout"
                        })

                    } catch (err) {
                        hideLoading()
                        showToast({
                            message: err.message,
                            type: 'error'
                        })
                    }
                },
                totalKeranjang() {
                    this.keranjangTotal = 0;
                    this.keranjangList.map(keranjang => {
                        this.keranjangTotal += keranjang.jumlah * keranjang.barang.harga_user
                    })

                    return this.rupiah(this.keranjangTotal)
                },
                rupiah(amount) {
                    const rupiahFormat = "Rp " + amount.toLocaleString("id-ID");
                    return rupiahFormat;
                },
                async hapusKeranjang(id) {
                    try {
                        showLoading()
                        const response = await httpClient.delete(`{{ url('') }}/p/keranjang/${id}`)
                        await this.fetchData()
                        await this.fetchUserRole()
                        hideLoading()
                        showToast({
                            message: "Data berhasil dihapus!"
                        })


                    } catch (err) {
                        hideLoading()
                        showToast({
                            message: err.message,
                            type: 'error'
                        })
                    }
                },
                async fetchData() {
                    const response = await httpClient.post('{{ url('') }}/p/keranjang/data')
                    this.keranjangList = response.data.result;
                    this.keranjangTotal = 0;
                    console.log(this.keranjangList)

                },
                async fetchUserRole() {
                    const response = await httpClient.post('{{ url('') }}/p/user-role')
                    this.userRole = response.data.result;
                    console.log("ROle User", this.userRole)
                }
            },
            async created() {
                await this.fetchData();
                await this.fetchUserRole();
            },
            watch: {}
        }).mount('#container');
    </script>
@endsection

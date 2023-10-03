@extends("portal_layout.templates")
@section("content")
<div class="container mt-5" id="container">
    <div class="frame">
        <div class="title">Keranjang Belanja</div>
        <div class="sub-title">
            <a href="{{ url('/p') }}" class="back-to-home" style="text-decoration: none; font-size:15px">← Kembali
                ke Beranda</a>
        </div>
        <div class="content">
            <div class="cart-box">
                <h3>Daftar Belanja</h3>
                <table id="table" class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total SAR</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="keranjang in keranjangList ">
                            <td><img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product" style="width: 100px;"></td>
                            <td>@{{ keranjang.barang.nama_barang }}</td>
                            <td class="product-price">Rp 10000</td>
                            <td>
                                <label class="quantity-label" for="quantity">Quantity:</label>
                                <input type="number" class="quantity-input" name="quantity" value="1" min="1" max="10">
                            </td>
                            <td><span class="total-sar">10,000</span></td>
                            <td><i class="fa-solid fa-trash-can"></i></td>
                        </tr>
                 
                    </tbody>
                </table>
            </div>
            <div class="payment-box">
                <div class="payment-info">
                    <div class="payment-section subtotal-section">
                        Subtotal: <span class="payment-amount" id="subtotal">Rp 0</span>
                    </div>
                    <div class="payment-section shipping-section">
                        Shipping: <span class="payment-amount" id="shipping">Rp 0</span>
                    </div>
                    <div class="payment-section total-section">
                        <b>Total: <span class="payment-amount" id="total">Rp 0</span></b>
                    </div>
                </div>
                <button onclick="location.href='/p/checkout'" class="checkout-button">Checkout</button>
            </div>
        </div>
    </div>
</div>
<script>
    createApp({
        data() {
            return {
                keranjangList : [],
                keranjang : null,
                userRole : null
            };
        },
        methods: {
            async fetchData() {
                const response = await httpClient.post('{{url("")}}/p/keranjang-data')
                this.keranjangList = response.data.result;
                console.log(this.keranjangList)

            },
            async fetchUserRole(){
                const response = await httpClient.post('{{url("")}}/p/user-role')
                this.userRole = response.data.result;
                console.log("ROle User",this.userRole)
            }
        },
        async created() {
            await this.fetchData();
            await this.fetchUserRole();
        },
        watch : {}
    }).mount('#container');
</script>
<script>
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const productPrices = document.querySelectorAll('.product-price');
    const totalSARSpans = document.querySelectorAll('.total-sar');

    function calculateTotal() {
        let subtotal = 0;

        quantityInputs.forEach((quantityInput, index) => {
            const quantity = parseInt(quantityInput.value);
            const price = parseInt(productPrices[index].textContent.replace(/[^0-9]/g, ''));
            const total = quantity * price;
            totalSARSpans[index].textContent = formatCurrency(total);
            subtotal += total;
        });

        const shipping = 10000; // Example shipping cost
        const total = subtotal + shipping;

        const subtotalSpan = document.getElementById('subtotal');
        const shippingSpan = document.getElementById('shipping');
        const totalSpan = document.getElementById('total');

        subtotalSpan.textContent = formatCurrency(subtotal);
        shippingSpan.textContent = formatCurrency(shipping);
        totalSpan.textContent = formatCurrency(total);
    }

    // Format currency with Indonesian Rupiah format
    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(amount);
    }

    // Add input event listener to each quantity input
    quantityInputs.forEach(quantityInput => {
        quantityInput.addEventListener('input', calculateTotal);
    });

    // Initial calculation
    calculateTotal();
</script>
@endsection
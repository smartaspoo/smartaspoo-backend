@extends("portal_layout.templates")
@section("content")
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .frame {
            background-color: #F0F0F0;
            padding: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: 600;
        }
        .sub-title {
            font-size: 16px;
            margin-top: 10px;
        }
        .back-to-home {
            font-size: 14px;
            margin-top: 5px;
            cursor: pointer;
            color: #606C5D;
            transition: color 0.3s;
        }
        .back-to-home:hover {
            color: #5E745C;
        }
        .content {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .cart-box {
            width: 70%; 
            padding: 20px;
            margin-top: 20px;
            margin-right: 20px;
            background-color: #FFF;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .payment-box {
            width: 28%; 
            padding: 20px;
            margin-top: 20px;
            background-color: #FFF;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .button {
            background-color: #606C5D;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #5E745C;
        }
        .voucher-title {
            font-size: 16px;
            font-weight: 600;
            margin-top: 20px;
        }
        .voucher-section {
            display: flex;
            margin-top: 15px;
        }
        .voucher-input {
            flex: 2;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }
        .redeem-button {
            flex: 1;
            margin-left: 10px;
            margin-top: 5px;
            background-color: #606C5D;
            color: #fff;
            border: none;
        }
        .payment-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 20px;
        }
        .payment-section {
            font-weight: 600;
            margin-top: 15px;
            margin-left: 10px;
        }
        .payment-amount {
            font-size: 16px;
            color: #FF5733;
            margin-top: 5px;
        }
        .subtotal-title {
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
        }
        .subtotal-amount {
            font-size: 16px;
            font-weight: 600;
            color: #FF5733;
            margin-top: 5px;
        }
        .shipping-title {
            font-size: 16px;
            font-weight: 600;
            margin-top: 15px;
        }
        .total-title {
            font-size: 20px;
            font-weight: 600;
            margin-top: 20px;
            color: #FF5733;
        }
        .subtotal-section,
        .shipping-section,
        .total-section {
            margin-top: 15px;
            margin-left: 10px;
            font-weight: 500;
        }
        .total-section {
            margin-top: 10px;
        }
        .checkout-button {
            background-color: #606C5D;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }
        .checkout-button:hover {
            background-color: #E65100;
        }
        .recently-viewed {
            text-align: center;
            margin-top: 30px;
        }

        .recently-viewed {
            text-align: center;
            margin-top: 30px;
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .carousel-container {
            width: 80%; /* Lebar kontainer diatur menjadi 80% */
            margin: 0 auto; /* Menengahkan kontainer */
            overflow: hidden;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .card {
            flex: 0 0 calc(25% - 10px); 
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center;
            padding: 10px;
        }

        .card img {
            display: block; 
            margin: 0 auto; 
            max-width: 100%;
            height: auto;
            width: 100px;
            height: 100px;
        }

        .product-name {
            font-size: 14px; 
            font-weight: 600; 
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .table {
        table-layout: auto;
        width: 100%;
        overflow-x: auto;
        }
        .table th,
        .table td {
            white-space: nowrap;
        }
        .cart-box {
            overflow: auto;
        }
        .content {
            flex-direction: column;
        }
        .cart-box, .payment-box {
            width: 100%;
            margin-right: 0;
        }
    }
    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="frame">
        <div class="title">Keranjang Belanja</div>
        <div class="sub-title">
            <a href="/p" class="back-to-home" style="text-decoration: none; font-size:15px">← Kembali ke Beranda</a>
        </div>
        <div class="content">
                <div class="cart-box">
            <h3>Daftar Belanja</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total SAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product" style="width: 100px;"></td>
                            <td>Bandeng Juwana</td>
                            <td class="product-price">Rp 10000</td>
                            <td>
                                <label class="quantity-label" for="quantity">Quantity:</label>
                                <input type="number" class="quantity-input" name="quantity" value="1" min="1" max="10">
                            </td>
                            <td><span class="total-sar">10,000</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product" style="width: 100px;"></td>
                            <td>Dodol Cap Garut</td>
                            <td class="product-price">Rp 20000</td>
                            <td>
                                <label class="quantity-label" for="quantity">Quantity:</label>
                                <input type="number" class="quantity-input" name="quantity" value="1" min="1" max="10">
                            </td>
                            <td><span class="total-sar">20,000</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product" style="width: 100px;"></td>
                            <td>Lumpia Semarang</td>
                            <td class="product-price">Rp 25000</td>
                            <td>
                                <label class="quantity-label" for="quantity">Quantity:</label>
                                <input type="number" class="quantity-input" name="quantity" value="1" min="1" max="10">
                            </td>
                            <td><span class="total-sar">25,000</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-box">
             <h3>Apakah Kamu Punya Voucher?</h3>
                <div class="voucher-section">
                    <input type="text" placeholder="Masukkan kode voucher" class="voucher-input">
                    <button class="redeem-button">Redeem</button>
                </div>
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
                    <button class="checkout-button">Checkout</button>
        </div>
    </div>

    <div class="recently-viewed">
        <h3 class="title">Terakhir Dilihat</h3>
        <div class="carousel-container">
            <div class="carousel">
                <div class="card">
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product 1">
                    <div class="product-name">Dodol Cap Garut</div>
                </div>
                <div class="card">
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product 2">
                    <div class="product-name">Caping Gunung</div>
                </div>
                <div class="card">
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product 3">
                    <div class="product-name">Lumpia Semarang</div>
                </div>
                <!-- Tambahkan lebih banyak card sesuai produk yang dilihat -->
                <div class="card">
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product 3">
                    <div class="product-name">Tahu Bakso</div>
                </div>
                <div class="card">
                    <img src="{{URL::asset('/img/portal/produk.png')}}" alt="Product 3">
                    <div class="product-name">Tahu Bakso</div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
    }

    // Add input event listener to each quantity input
    quantityInputs.forEach(quantityInput => {
        quantityInput.addEventListener('input', calculateTotal);
    });

    // Initial calculation
    calculateTotal();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
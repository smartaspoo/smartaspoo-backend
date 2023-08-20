@extends("portal_layout.templates")
@section("content")
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    .setelahcheckout {
        font-family: 'Poppins';
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 150px;
    }
    h1 {
        margin-bottom: 20px;
    }

    .btn-kembali {
        margin-top: 50px; 
        background-color: #606C5D;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-kembali:hover {
        background-color: #0056b3;
    }
</style>
    <div class="setelahcheckout">
        <h1>PESANANMU SEDANG DALAM PROSES</h1>
        <button class="btn-kembali">Kembali ke Toko</button>
    </div>
@endsection
<!DOCTYPE html>
<?php
use Illuminate\Support\Facades\DB;
?>
 @foreach($user as $usr)
 <?php
$idUser = $usr -> id;
?>
@endforeach
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SiTokoo Hompeage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <style>
            .bg-custom{background-color:#19aa8d!important}
            .text-right{text-align:right!important}
            .font-weight-light{font-weight:300!important}
            
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-white"  href="/user/{{$idUser}}/dashboard/">SiTokoo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item "><a class="nav-link active text-white" aria-current="page" href="/user/{{$idUser}}/dashboard/">Home</a></li>
                    
                        <li class="nav-item "><a class="nav-link  text-white" aria-current="page" href="/user/pesanan/{{$idUser}}">Pesanan</a></li>
                    </ul>
                    <form class="d-flex">
                        <?php
                            $nCart = DB::table("cart") -> where("id_user","=",$idUser)->count();
                        ?>
                        <a href="/user/viewcart/{{$idUser}}" class="btn btn-outline-light" name="cart" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{$nCart}}</span>
                        </a>
                    </form>
                    
                    <form action="{{ route('logout') }}" style="right:-2%;position:relative" class="d-flex">
                        <button class="btn btn-outline-danger" name="logout" type="submit">
                            <i class="bi bi-power"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-custom py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    <!-- <div class="col mb-5"> -->
                        <!-- <div class="card h-100"> -->
                            <!-- Sale badge -->
                            <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                            <!-- Product image-->
                            <!-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." /> -->
                            <!-- Product details-->
                            <!-- <div class="card-body p-4"> -->
                                <!-- <div class="text-center"> -->
                                    <!-- Product name-->
                                    <!-- <h5 class="fw-bolder">Sale Item</h5> -->
                                    <!-- Product price-->
                                    <!-- <span class="text-muted text-decoration-line-through">$50.00</span> -->
                                    <!-- $25.00 -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <!-- Product actions-->
                            <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent"> -->
                                <!-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <?php
                            $barang = DB::table("barang") -> get();
                        ?>
                    @foreach($barang as $brg)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ asset('/barang/'.$brg->gambar) }}" alt="..." />
                                <!-- Product details-->
                                <div style="background-color:#f2f2f2;" class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$brg -> nama}}</h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price--> 
                                    </div>
                                    <div class="text-center">
                                        Rp {{number_format($brg -> harga,"0","",".")}}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div style="background-color: #f2f2f2;" class="card-footer p-4 pt-0 border-top-0">
                                @foreach($user as $usr)
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto bg-black" href="/addToCart/{{$usr -> id}}/{{$brg -> id_barang}}">Add to cart</a></div>
                                    @endforeach
                                </div>
                                <div style="background-color: #f2f2f2;" >
                                        <h6 class="text-right font+-weight-light">Stok {{$brg -> stok}} </h6>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
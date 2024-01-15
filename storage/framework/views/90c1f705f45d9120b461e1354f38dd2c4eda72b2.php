<?php
    $toko = App\Alamat_toko::where('id', 1)->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e($toko->name_store); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/aos.css">

    <link rel="stylesheet" href="<?php echo e(asset('shopper')); ?>/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/be87c3e44a.js" crossorigin="anonymous"></script>



    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        img {
            overflow: hidden;
            position: relative;
            object-fit: cover;

        }

        

        #border {
            margin:0 auto;
            height: 300px;
            width: 900px;
          border-radius: 20px;
        }
        #bord {
            margin:0 auto;
            height: 400px;
            width: 900px;
          border-radius: 20px;
        }

        #gr {
            margin:0 auto;
            height: 90px;
            width: 450px;
            font-family: 'Blackletter';
        }
        #tr {
            margin:0 auto;
            height: 200px;
            width: 600px;
            border-radius: 10px
        }


        #btn {
            width: 50px;
            height: 30px;
            border-radius: 20px;
            background-color: rgb(20, 48, 228)90, 230);

        }



    </style>
</head>

<body>
     <?php if (isset($component)) { $__componentOriginalb6f177d8095a1fcd927fae6188f574056b0cd62e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DateTarget::class, []); ?>
<?php $component->withName('dateTarget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalb6f177d8095a1fcd927fae6188f574056b0cd62e)): ?>
<?php $component = $__componentOriginalb6f177d8095a1fcd927fae6188f574056b0cd62e; ?>
<?php unset($__componentOriginalb6f177d8095a1fcd927fae6188f574056b0cd62e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container p-3 rounded text-white bg-secondary">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <div class="font-weight-bold">
                                <a href="<?php echo e(route('home')); ?>"
                                    class="js-logo-clone d-sm-none d-lg-inline text-white"><?php echo e($toko->name_store); ?></a>
                            </div>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-left">
                            <form action="<?php echo e(route('user.produk.cari')); ?>" method="get"
                                class="site-block-top-search">
                                <?php echo csrf_field(); ?>
                                <input type="text" class="form-control border-0" name="cari" placeholder="Search">
                            </form>
                        </div>


                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="top-right links">
                                <div class="site-top-icons">
                                    <ul>
                                        <?php if(Route::has('login')): ?>
                                            <?php if(auth()->guard()->check()): ?>
                                                <li>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="icon icon-person"></span>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('user.alamat')); ?>">Pengaturan Alamat</a>
                                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                                                Logout
                                                            </a>

                                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>"
                                                                method="POST" style="display: none;">
                                                                <?php echo csrf_field(); ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <?php
                                                    $user_id = \Auth::user()->id;
                                                    $total_keranjang = \DB::table('keranjang')
                                                        ->select(DB::raw('count(id) as jumlah'))
                                                        ->where('user_id', $user_id)
                                                        ->first();
                                                    ?>
                                                    <a href="<?php echo e(route('user.keranjang')); ?>" class="site-cart">
                                                        <span class="icon icon-add_shopping_cart text-white"></span>
                                                        <span class="count"><?php echo e($total_keranjang->jumlah); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <?php
                                                    $user_id = \Auth::user()->id;
                                                    $total_order = \DB::table('order')
                                                        ->select(DB::raw('count(id) as jumlah'))
                                                        ->where('user_id', $user_id)
                                                        ->where('status_order_id', '!=', 5)
                                                        ->where('status_order_id', '!=', 6)
                                                        ->first();
                                                    ?>
                                                    <a href="<?php echo e(route('user.order')); ?>" class="site-cart">
                                                        <span class="icon icon-shopping_cart text-white"></span>
                                                        <span class="count"><?php echo e($total_order->jumlah); ?></span>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="icon icon-person"></span>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Masuk</a>
                                                        <?php if(Route::has('register')): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('register')); ?>">Daftar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <li class="d-inline-block d-md-none ml-md-0"><a
                                                href="#"class="site-menu-toggle js-menu-toggle"><span
                                                    class="icon-menu text-white"></span></a></li>
                                </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <div class="container">
                        <ul class="site-menu js-clone-nav d-none d-md-block">
                            <li class="<?php echo e(Request::path() === '/' ? '' : ''); ?>"><a
                                    href="<?php echo e(route('home')); ?>">Beranda</a>
                            </li>
                            <li class="<?php echo e(Request::path() === 'produk' ? '' : ''); ?>"><a
                                    href="<?php echo e(route('user.produk')); ?>">Produk</a></li>
                            <li class="<?php echo e(Request::path() === 'grooming' ? '' : ''); ?>"><a
                                    href="<?php echo e(route('grooming')); ?>">grooming</a></li>
                            <li class="<?php echo e(Request::path() === 'booking' ? '' : ''); ?>"><a
                                    href="<?php echo e(route('booking')); ?>">Pet Hotel</a></li>
                        </ul>
                    </div>
                </nav>
        </header>

        <?php echo $__env->yieldContent('content'); ?>

        <footer class="site-footer border-top">
            <div class="container bg-secondary p-5 rounded">
                <div class="row">
                    <div class="col-md mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="footer-heading mb-4 text-white font-weight-bold">Tentang Toko</h3>
                                <ul class="list-unstyled text-white">
                                    <p><?php echo e($toko->description); ?></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                        $city = App\City::where('city_id', $toko->city_id)->first();
                    ?>
                    <div class="col-md col-lg-4">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4 text-white font-weight-bold">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address text-white">
                                    <?php echo e($city->title); ?>, <?php echo e($toko->detail); ?>

                                </li>
                                <li class="phone"><a
                                        href="https://api.whatsapp.com/send/?phone=<?php echo e($toko->telp); ?>&text&type=phone_number&app_absent=0"
                                        class="text-white"><?php echo e($toko->telp); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="<?php echo e(asset('shopper')); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="<?php echo e(asset('shopper')); ?>/js/jquery-ui.js"></script>
    <script src="<?php echo e(asset('shopper')); ?>/js/popper.min.js"></script>
    <script src="<?php echo e(asset('shopper')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('shopper')); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo e(asset('shopper')); ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo e(asset('shopper')); ?>/js/aos.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <script src="<?php echo e(asset('shopper')); ?>/js/main.js"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\Petshop\resources\views/user/app.blade.php ENDPATH**/ ?>
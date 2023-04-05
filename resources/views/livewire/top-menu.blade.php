<div>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                        <li class="nav-item">
                            <a href="{{ route('front.home') }}" class="nav-link">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.shop.search') }}" class="nav-link">Shop</a>
                        </li>
                        @auth()
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="my-profile.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> My Profile</a>
                                <a class="dropdown-item" href="my-address.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> My Address</a>
                                <a class="dropdown-item" href="wishlist.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Wish List </a>
                                <a class="dropdown-item" href="orderlist.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Order List</a>
                            </div>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
            <div class="container">

            </div>
        </section>
    </div>
</div>

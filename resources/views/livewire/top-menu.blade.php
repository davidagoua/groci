<div>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light p-0 osahan-menu-2 pad-none-mobile">
            <div class="container-fluid p-0">
                <div class="collapse p-0 navbar-collapse" id="navbarText">
                    <div class="row align-content-stretch mr-auto p-0 mt-lg-0 margin-auto">
                        <div class="nav-item  col-4 rounded-0 ">
                            <a style="font-size: 1.6em;" href="{{ route('front.home') }}"  class="bg-ownred h-100 @if( request()->path() != '/') opacity-50 @endif d-flex rounded-0 py-3 align-items-center text-white btn  ">
                                <span style="font-size: 2em" class="mdi mdi-home"></span>&nbsp;&nbsp;
                                <span>Acceuil</span>
                            </a>
                        </div>
                        <div class="nav-item  col-4 rounded-0 ">
                            <a style="font-size: 1.6em;" href="{{ route('front.shop.search') }}"  class="bg-ownred h-100 @if( request()->path() != '/search') opacity-50 @endif d-flex rounded-0 py-3 align-items-center text-white btn  ">
                                <span style="font-size: 2em" class="mdi mdi-basket"></span>&nbsp;&nbsp;
                                <span>Selection par produit</span>
                            </a>
                        </div>
                        <div class="nav-item  col-4 rounded-0 ">
                            <a style="font-size: 1.6em;" href="{{ route('front.contact') }}"  class="bg-ownred h-100 @if( request()->path() != '/contact') opacity-50 @endif d-flex rounded-0 py-3 align-items-center text-white btn  ">
                                <span style="font-size: 2em" class="mdi mdi-comment-question"></span>&nbsp;&nbsp;
                                <span>Contact</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


    </div>
</div>

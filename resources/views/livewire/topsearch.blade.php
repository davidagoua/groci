<nav class="navbar navbar-light navbar-expand-lg bg-white bg-faded osahan-menu">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <a class="navbar-brand" href="{{ route('front.home') }}"> <img class="img-responsive" width="170"
                                                                           src="{{ asset('/images/cest_moin_cher_logo2.fw.png') }}"
                                                                           alt="logo"> </a>
        </div>
        <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse"
                data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNavDropdown ">
            <div class="navbar-nav mr-auto mt-5 mt-lg-2 margin-auto top-categories-search-main">
                <div class="top-categories-search">
                    <div class="input-group">

                        <input wire:model="terme" class="form-control" placeholder="Recherche..."
                               aria-label="Recherche..." type="text">
                        <span class="input-group-btn">
<button class="btn btn-secondary" type="button"><i class="mdi mdi-file-find"></i> Recherche</button>
</span>
                    </div>

                </div>
                @if(strlen($terme) > 3)
                    <div class="bg-white shadow"
                         style="position: absolute; z-index: 10; top: 60px; width: 545px; left: 373px "
                    >
                        <ul class="list-group">
                            @forelse( $produits as $prod)

                            <li class="list-group-item">
                                <a class="d-block" href="{{ route('front.shop.produit_details', ['produit'=>$prod]) }}">{{ $prod->nom }}</a>
                            </li>
                            @empty
                                <li class="list-group-item">
                                    Aucun Produits trouvé...
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endif
            </div>
            <div class="my-2 my-lg-0">
                <ul class="list-inline main-nav-right">
                    <livewire:cart-widget/>
                </ul>
            </div>
        </div>
    </div>
</nav>

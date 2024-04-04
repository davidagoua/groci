<x-filament::widget>
    <section class="bg-white rounded dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
            <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">

                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $nombre_stock }}</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">Produits Disponibles</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $nombre_indisponible }}</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">Produits Indisponible</dd>
                </div>
            </dl>
        </div>
    </section>
    <section>
        <div class="grid xl:grid-cols-4 md:grid-cols-3 grid-cols-1 mt-6 gap-6">


            <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="p-5 flex items-center justify-between">
                                    <span class="me-3">
                                        <span class="text-slate-400 block">Total Produits</span>
                                        <span class="flex items-center justify-between mt-1">
                                            <span class="text-2xl font-medium"><span class="counter-value" data-target="{{ $nombre_stock }}">{{ $nombre_stock }}</span></span>
                                        </span>
                                    </span>

                    <span class="flex justify-center items-center rounded-md h-12 w-12 min-w-[48px] bg-slate-50 dark:bg-slate-800 shadow shadow-gray-100 dark:shadow-gray-700 text-green-600">
                                        <i class="mdi mdi-account-group-outline text-[28px]"></i>
                                    </span>
                </div>
            </div><!--end-->

            <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="p-5 flex items-center justify-between">
                                    <span class="me-3">
                                        <span class="text-slate-400 block">Total Boutique</span>
                                        <span class="flex items-center justify-between mt-1">
                                            <span class="text-2xl font-medium"><span class="counter-value" data-target="{{ $nb_boutiques }}">{{ $nb_boutiques }}</span></span>
                                        </span>
                                    </span>

                    <span class="flex justify-center items-center rounded-md h-12 w-12 min-w-[48px] bg-slate-50 dark:bg-slate-800 shadow shadow-gray-100 dark:shadow-gray-700 text-green-600">
                                        <i class="mdi mdi-home-city-outline text-[28px]"></i>
                                    </span>
                </div>
            </div><!--end-->

            <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="p-5 flex items-center justify-between">
                                    <span class="me-3">
                                        <span class="text-slate-400 block">Total Gerants</span>
                                        <span class="flex items-center justify-between mt-1">
                                            <span class="text-2xl font-medium"><span class="counter-value" data-target="10">10</span></span>
                                        </span>
                                    </span>

                    <span class="flex justify-center items-center rounded-md h-12 w-12 min-w-[48px] bg-slate-50 dark:bg-slate-800 shadow shadow-gray-100 dark:shadow-gray-700 text-green-600">
                                        <i class="mdi mdi-home-lightning-bolt-outline text-[28px]"></i>
                                    </span>
                </div>
            </div><!--end-->

            <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="p-5 flex items-center justify-between">
                                    <span class="me-3">
                                        <span class="text-slate-400 block">Total Categorie</span>
                                        <span class="flex items-center justify-between mt-1">
                                            <span class="text-2xl font-medium"><span class="counter-value" data-target="15">15</span></span>
                                        </span>
                                    </span>

                    <span class="flex justify-center items-center rounded-md h-12 w-12 min-w-[48px] bg-slate-50 dark:bg-slate-800 shadow shadow-gray-100 dark:shadow-gray-700 text-green-600">
                                        <i class="mdi mdi-home-clock-outline text-[28px]"></i>
                                    </span>
                </div>
            </div><!--end-->
        </div>
    </section>
</x-filament::widget>

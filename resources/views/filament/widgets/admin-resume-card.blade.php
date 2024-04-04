<x-filament::widget>
    <section class="bg-white rounded dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
            <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">

                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $nb_produits }}</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">Produits</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $nb_boutiques }}</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">Boutiques</dd>
                </div>
            </dl>
        </div>
    </section>
</x-filament::widget>

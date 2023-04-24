<x-filament::widget>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-4 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            @foreach($boutiques as $boutique)

            <div class="col-span-3 p-3 text-center">
                <img src="{{ asset("/storage/".$boutique->image) }}" alt="mockup">
                <div class="text-xl">
                    {{ $boutique->nom }}
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-filament::widget>

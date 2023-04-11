<x-filament::widget>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">

            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset("/storage/".$boutique->image) }}" height="150px" width="150px" alt="mockup">
            </div>
        </div>
    </section>
</x-filament::widget>

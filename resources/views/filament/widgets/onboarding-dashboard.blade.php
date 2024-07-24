<x-filament::widget>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <section class="bg-white dark:bg-gray-900" x-data="{boutique_id: null}">
        <div class=" mx-auto max-w-screen-xl flex ">
            <div class="w-3/12 bg-red">
                <div >
                    <div>{{ $boutique_id }}
                        <select x-model="boutique_id"  name="boutique" id="boutique_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($boutiques as $bt)
                                <option  name="boutique_id" @wire:model="boutique_id" value="{{ $bt->id }}">{{ $bt->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="h-80 overflow-y-scroll text-sm font-medium text-gray-900 bg-white border border-gray-200  dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($propositions as $proposition)
                            <div x-show="boutique_id == {{ $proposition->boutique_id }}" class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
                                <a onclick="event.preventDefault(); getStatePrices({{ $proposition->id }})" class="hover:text-blue-500 hover:underline flex"  href="#">
                                    <span class="px-3 py-2">{{ $proposition->produit->nom }}</span>
                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-9/12">

                    <div class="w-full">
                        <canvas id="myChart"  class="w-full h-80"></canvas>
                    </div>
                    <script>
                        const ctx = document.getElementById('myChart');
                        var mychart = new Chart(ctx, {})

                        let getStatePrices = async(id)=>{
                            let {dates, prices} = await( await fetch('/stats/proposition/'+id)).json()

                            mychart.destroy()

                            mychart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: dates,
                                    datasets: [{
                                        label: '# of Votes',
                                        data: prices,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        }


                    </script>
            </div>
        </div>
    </section>
</x-filament::widget>

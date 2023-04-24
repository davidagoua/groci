<div class="flex rounded-md relative">
    <div class="flex">
        <div class="px-2 py-3">
            <div class="h-10 w-10">
                <img src="{{ asset('/storage/'.$image) }}" alt="" role="img" class="h-full w-full rounded-full overflow-hidden shadow object-cover" />
            </div>
        </div>

        <div class="flex flex-col justify-center pl-3 py-2">
            <p class="text-sm font-bold pb-1">{{ $name }} <span class="text-red-500">({{ $unite }})</span> </p>
        </div>
    </div>
</div>

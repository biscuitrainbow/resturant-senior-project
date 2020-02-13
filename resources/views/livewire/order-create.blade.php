<div class="flex flex-row justify-between">
    <div class="w-full min-h-screen px-8">
        <div class="flex flex-row mb-8">
            <div class="border-b-2 mr-2 px-12 py-4 border-solid border-black">
                อาหารจานเดียว
            </div>

            <div class="border-b-2 mr-2 px-12 py-4 border-gray border-black">
                อาหารจานเดียว
            </div>

            <div class="border-b-2 mr-2 px-12 py-4 border-gray border-black">
                อาหารจานเดียว
            </div>
        </div>

        <div>
            @foreach($menus as $m)
            <div class="flex flex-row items-center justify-between border-b border-solid border-gray-400 py-8">
                <div>
                    <p>
                        {{$m['name']}}
                    </p>
                </div>

                <div class="flex flex-row items-center">
                    <p class="mr-6">
                        เริ่มต้นที่ {{$m['price']}} บาท
                    </p>

                    <button wire:click="addMenu('{{$m->id}}')" class="border-2 border-black border-solid px-12 py-2">
                        เพิ่ม
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="min-h-screen w-96 px-4 py-2">
        <h1 class="font-bold text-2xl mb-4">
            รายการอาหาร
        </h1>

        @foreach($selectedMenus as $m)
        <div class="flex flex-row justify-between mb-4">
            <div class="flex flex-row">
                <button wire:click="decreament('{{$m['id']}}')" class="px-4">
                    -
                </button>
                <p class="mx-4">
                    {{$m['quantity']}}
                </p>
            <button wire:click="increment('{{$m['id']}}')" class="px-4">
                    +
                </button>
            </div>

            <p> 
                {{$m['name']}}
            </p>

            <p>
                {{$m['total_price']}} บาท
            </p>
        </div>
        @endforeach

        <div class="flex flex-row justify-between mb-4">
            <p class="font-bold">ราคารวม</p>
            <p>{{collect($selectedMenus)->pluck('total_price')->sum()}} บาท</p>
        </div>

        <button wire:click="createOrder" class="bg-black text-white rounded w-full py-2">
            ยินยันการสั่งอาหาร
        </button>
    </div>
</div>
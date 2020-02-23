<div class="flex flex-row justify-between">
    <!-- <div class="flex justify-center items-center w-full min-h-screen z-10 fixed">
        <div class="w-148 px-8 py-8 bg-gray-200">
            <div class="flex justify-between pb-4 mb-8 items-center border-b border-gray-400">
                <h1 class="text-2xl">ไก่ทอดเปล่า</h1>
                <p>80</p>
            </div>

            <div>
                <div class="mb-4 flex justify-between">
                    <div>
                        <input type="radio" name="" id="small" class="mr-2">
                        <label for="small">เล็ก</label>
                    </div>

                    <p>
                        40
                    </p>
                </div>

                <div class="mb-4 flex justify-between">
                    <div>
                        <input type="radio" name="" id="small" class="mr-2">
                        <label for="small">เล็ก</label>
                    </div>

                    <p>
                        40
                    </p>
                </div>

                <div class="mb-4 flex justify-between">
                    <div>
                        <input type="radio" name="" id="small" class="mr-2">
                        <label for="small">เล็ก</label>
                    </div>

                    <p>
                        40
                    </p>
                </div>
            </div>
        </div>
    </div>
-->

    @if($menuOptionSelecting)
    <div class="w-full min-h-screen bg-black z-10 opacity-50  fixed flex justify-center items-center">

    </div>

    <div class="w-full min-h-screen z-20 fixed flex justify-center items-center">
        <div class="shadow-md bg-white w-164 px-8 py-4" style="min-height:480px;">
            <div class="flex justify-between border-b-gray-300 border-solid border-b pb-4 mb-8 mt-8">
                <h1 class="text-2xl font-bold">
                    {{$menuOptionSelecting['name']}}
                </h1>

                <p class="font-bold">
                    80
                </p>
            </div>

            <div class="mb-8">
                <p class="font-bold mb-2">ขนาด</p>

                @foreach($menuOptionSelecting['size_options'] as $o)
                <div class="flex justify-between mb-4">
                    <div>
                        <input type="radio" name="size_option" id="{{$o['id']}}" class="mr-2">
                        <label class="text-gray-700">
                            {{$o['name']}}
                        </label>
                    </div>

                    <p>
                        {{$o['additional_price']}}
                    </p>
                </div>
                @endforeach
            </div>

            <form wire:submit.prevent="submitMenu" method="post">
                <div class="mb-8">
                    <p class="font-bold mb-2">ตัวเลือก</p>

                    @foreach($menuOptionSelecting['other_options'] as $o)
                    <div class="flex justify-between mb-4">
                        <div>
                            <input type="checkbox" name="other_option" id="{{$o['id']}}" class="mr-2">
                            <label class="text-gray-700">
                                {{$o['name']}}
                            </label>
                        </div>

                        <p>
                            {{$o['additional_price']}}
                        </p>
                    </div>
                    @endforeach
                </div>

                <div class="mb-8">
                    <p class="font-bold mb-2">คำขออื่นๆ</p>
                    <textarea class="w-full border border-gray-500 border-solid rounded" name="note" id="" cols="30"
                        rows="5"></textarea>
                </div>

                <button class="bg-black text-white rounded w-full py-2">
                    เพิ่มในรายการอาหาร
                </button>
            </form>
        </div>
    </div>
    @endif

    <div class="w-full min-h-screen px-8">
        <div class="flex flex-row cursor-pointer mb-8">
            @foreach($categories as $c)
            <div wire:click="changeCategory('{{$c['id']}}')"
                class="border-b-2 mr-2 px-12 py-4 border-solid font-bold @if($selectedCategory['id'] == $c['id']) {{"border-black"}} @endif">
                {{$c->name}}
            </div>
            @endforeach
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

                    <button wire:click="addMenu('{{$m['id']}}')" class="border-2 border-black border-solid px-12 py-2">
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
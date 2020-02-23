<?php

namespace App\Http\Livewire;

use App\Category;
use App\Menu;
use App\Order;
use Livewire\Component;

class OrderCreate extends Component
{

    public $selectedMenus;
    public $selectedCategory;
    public $menuOptionSelecting;

    public function mount()
    {
        $this->selectedMenus = [];
        $this->selectedCategory = Category::with('menus','menus.sizeOptions')->first()->toArray();

    }

    public function render()
    {
        $menus = $this->selectedCategory['menus'];
        $categories = Category::all();


        return view('livewire.order-create', compact('menus', 'categories'));
    }

    public function addMenu($id)
    {

        $menu = Menu::with('sizeOptions','otherOptions')->find($id);
        $this->menuOptionSelecting = $menu->toArray();



        // if (array_key_exists($id, $this->selectedMenus)) {
        //     $this->increment($id);
        // } else {
        //     $this->selectedMenus[$id] = [
        //         'id' => $menu->id,
        //         'name' => $menu->name,
        //         'price' => $menu->price,
        //         'quantity' => 1,
        //         'total_price' => $menu->price,
        //     ];
        // }
    }

    public function submitMenu(){
        
    }

    public function dismissMenuOption()
    {
        $this->menuOptionSelecting = null;
    }

    // public function changeCategory($id)
    // {
    //     $category = Category::with('menus')->find($id);
    //     $this->selectedCategory = $category->toArray();
    // }

    public function changeCategory($id)
    {
        $category = Category::with('menus','menus.sizeOptions')->find($id);
        $this->selectedCategory = $category->toArray();
    }

    public function increment($id)
    {
        $this->selectedMenus[$id]['quantity']++;
        $this->selectedMenus[$id]['total_price'] = $this->selectedMenus[$id]['price'] * $this->selectedMenus[$id]['quantity'];
    }

    public function decreament($id)
    {
        if ($this->selectedMenus[$id]['quantity'] > 1) {
            $this->selectedMenus[$id]['quantity']--;
            $this->selectedMenus[$id]['total_price'] = $this->selectedMenus[$id]['price'] * $this->selectedMenus[$id]['quantity'];
        } else {
            unset($this->selectedMenus[$id]);
        }
    }

    public function createOrder()
    {

        $this->redirect('/order/create/confirm');
        // $order = Order::create([
        //     'total_price' => collect($this->selectedMenus)->pluck('total_price')->sum(),
        // ]);

        // $selectedMenus = collect($this->selectedMenus)->map(function ($menu) {
        //     return $menu['id'] = [
        //         'quantity' => $menu['quantity'],
        //         'total_price' => $menu['total_price'],
        //     ];
        // });


        // $order->menus()->attach($selectedMenus);
    }
}

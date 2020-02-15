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

    public function mount()
    {
        $this->selectedMenus = [];
        $this->selectedCategory = Category::with('menus')->first()->toArray();
    }

    public function render()
    {
        $menus = $this->selectedCategory['menus'];
        $categories = Category::all();

        return view('livewire.order-create', compact('menus', 'categories'));
    }

    public function addMenu($id)
    {
        $menu = Menu::find($id);

        if (array_key_exists($id, $this->selectedMenus)) {
            $this->increment($id);
        } else {
            $this->selectedMenus[$id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => 1,
                'total_price' => $menu->price,
            ];
        }
    }

    public function changeCategory($id)
    {
        $category = Category::with('menus')->find($id);
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

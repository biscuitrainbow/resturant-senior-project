<?php

use App\Category;
use App\Menu;
use App\OtherOption;
use App\SizeOption;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
             'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
        ]);

        $one_dish = Category::create([
            'name' => 'อาหารจานเดียว'
        ]);

        $chicken =  Category::create([
            'name' => 'ไก่สับ'
        ]);

        $drink = Category::create([
            'name' => 'เครื่องดื่ม'
        ]);

        $fried_chicken_rice = Menu::create([
            'name' => 'ข้าวมันไก่ทอด',
            'price' => 40,
            'category_id' => $one_dish->id,
        ]);

        SizeOption::create([
            'name' => 'ธรรมดา',
            'additional_price' => 0,
            'menu_id' => $fried_chicken_rice->id,
        ]);

        SizeOption::create([
            'name' => 'พิเศษ',
            'additional_price' => 10,
            'menu_id' => $fried_chicken_rice->id,
        ]);


        OtherOption::create([
            'name' => 'ไม่เอาหนัง',
            'additional_price' => 0,
            'menu_id' => $fried_chicken_rice->id,
        ]);

        OtherOption::create([
            'name' => 'เพิ่มไข่',
            'additional_price' => 10,
            'menu_id' => $fried_chicken_rice->id,
        ]);


        $boiled_chicken_rice = Menu::create([
            'name' => 'ข้าวมันไก่ต้ม',
            'price' => 40,
            'category_id' => $one_dish->id,
        ]);

        SizeOption::create([
            'name' => 'ธรรมดา',
            'additional_price' => 0,
            'menu_id' => $boiled_chicken_rice->id,
        ]);

        SizeOption::create([
            'name' => 'พิเศษ',
            'additional_price' => 10,
            'menu_id' => $boiled_chicken_rice->id,
        ]);

        OtherOption::create([
            'name' => 'ไม่เอาหนัง',
            'additional_price' => 0,
            'menu_id' => $boiled_chicken_rice->id,
        ]);

        OtherOption::create([
            'name' => 'เพิ่มไข่',
            'additional_price' => 10,
            'menu_id' => $boiled_chicken_rice->id,
        ]);

        $fried_chicken = Menu::create([
            'name' => 'ไก่ทอดสับ',
            'price' => 50,
            'category_id' => $chicken->id,
        ]);

        SizeOption::create([
            'name' => 'เล็ก',
            'additional_price' => 0,
            'menu_id' => $fried_chicken->id,
        ]);

        SizeOption::create([
            'name' => 'กลาง',
            'additional_price' => 20,
            'menu_id' => $fried_chicken->id,
        ]);

        SizeOption::create([
            'name' => 'ใหญ่',
            'additional_price' => 30,
            'menu_id' => $fried_chicken->id,
        ]);

        $boiled_chicken = Menu::create([
            'name' => 'ไก่ต้มสับ',
            'price' => 50,
            'category_id' => $chicken->id,
        ]);

        SizeOption::create([
            'name' => 'เล็ก',
            'additional_price' => 0,
            'menu_id' => $boiled_chicken->id,
        ]);

        SizeOption::create([
            'name' => 'กลาง',
            'additional_price' => 20,
            'menu_id' => $boiled_chicken->id,
        ]);

        SizeOption::create([
            'name' => 'ใหญ่',
            'additional_price' => 30,
            'menu_id' => $boiled_chicken->id,
        ]);

        $coffee = Menu::create([
            'name' => 'กาแฟเย็น',
            'price' => 25,
            'category_id' => $drink->id,
        ]);

        $tea = Menu::create([
            'name' => 'ชาเย็น',
            'price' => 25,
            'category_id' => $drink->id,
        ]);
    }
}

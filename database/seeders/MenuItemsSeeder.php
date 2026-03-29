<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $menu = [
            'قسم الشعبيات' => [
                ['name' => 'فول حجر', 'price' => 7.00, 'calories' => 270],
                ['name' => 'فول حجر بيض', 'price' => 8.00, 'calories' => 250],
                ['name' => 'فول تونة', 'price' => 10.00, 'calories' => 280],
                ['name' => 'فول جبن', 'price' => 8.00, 'calories' => 305],
                ['name' => 'فاصوليا حمراء', 'price' => 6.00, 'calories' => 127],
                ['name' => 'فاصوليا بيضاء', 'price' => 6.00, 'calories' => 144],
                ['name' => 'فاصوليا ناشف مع بيض', 'price' => 7.00, 'calories' => 185],
                ['name' => 'فاصوليا بيض', 'price' => 8.00, 'calories' => 180],
                ['name' => 'فاصوليا تونة', 'price' => 10.00, 'calories' => 190],
                ['name' => 'بازاليا', 'price' => 6.00, 'calories' => 95],
                ['name' => 'بازاليا تونة', 'price' => 10.00, 'calories' => 110],
                ['name' => 'بازاليا بيض', 'price' => 8.00, 'calories' => 102],
                ['name' => 'شكشوكة عادي', 'price' => 6.00, 'calories' => 175],
                ['name' => 'شكشوكة عدني', 'price' => 7.00, 'calories' => 200],
                ['name' => 'لحسة', 'price' => 9.00, 'calories' => 650],
                ['name' => 'بيض عيون', 'price' => 6.00, 'calories' => 150],
                ['name' => 'بيض فرن', 'price' => 7.00, 'calories' => 130],
                ['name' => 'بيض مقلي', 'price' => 6.00, 'calories' => 155],
                ['name' => 'تونة سادة', 'price' => 7.00, 'calories' => 140],
                ['name' => 'تونة بيض', 'price' => 9.00, 'calories' => 115],
                ['name' => 'تونة جبن', 'price' => 9.00, 'calories' => 175],
                ['name' => 'عدس سادة', 'price' => 6.00, 'calories' => 250],
                ['name' => 'عدس بيض', 'price' => 8.00, 'calories' => 290],
                ['name' => 'عدس تونة', 'price' => 9.00, 'calories' => 270],
                ['name' => 'كبدة بلدي', 'price' => 15.00, 'calories' => 170],
                ['name' => 'كبدة جبن', 'price' => 17.00, 'calories' => 250],
                ['name' => 'مقلقل', 'price' => 15.00, 'calories' => 250],
                ['name' => 'مقلقل جبن', 'price' => 17.00, 'calories' => 350],
                ['name' => 'شيبس', 'price' => 6.00, 'calories' => 227],
                ['name' => 'تونة شيبس', 'price' => 10.00, 'calories' => 240],
                ['name' => 'عقدة ادم (ربع)', 'price' => 10.00, 'calories' => 350],
                ['name' => 'عقدة شيباني (ربع)', 'price' => 12.00, 'calories' => 380],
            ],
            'قسم الخبز شعبيات' => [
                ['name' => 'ملوح دبل', 'price' => 4.00, 'calories' => 376],
                ['name' => 'ملوح صغير', 'price' => 2.00, 'calories' => 250],
                ['name' => 'رطب سادة', 'price' => 3.00, 'calories' => 220],
                ['name' => 'رطب عسل', 'price' => 5.00, 'calories' => 320],
                ['name' => 'رطب سمن', 'price' => 4.00, 'calories' => 320],
            ],
            'قسم الغداء' => [
                ['name' => 'سلتة', 'price' => 15.00, 'calories' => 398],
                ['name' => 'فحسة (صغير)', 'price' => 20.00, 'calories' => 350],
                ['name' => 'فحسة (كبير)', 'price' => 35.00, 'calories' => 612],
                ['name' => 'مشكل فرن', 'price' => 7.00, 'calories' => 270],
                ['name' => 'ايدام خضار', 'price' => 7.00, 'calories' => 165],
                ['name' => 'ملوخية', 'price' => 7.00, 'calories' => 135],
                ['name' => 'بامية', 'price' => 7.00, 'calories' => 178],
            ],
            'قسم المشروبات' => [
                ['name' => 'كنزا صغير', 'price' => 2.00, 'calories' => 111],
                ['name' => 'حمضيات/بيبسي/ديو (وسط)', 'price' => 5.00, 'calories' => 350],
                ['name' => 'حمضيات/بيبسي/ديو (عائلي)', 'price' => 9.00, 'calories' => 900],
                ['name' => 'ماء صغير', 'price' => 0.50, 'calories' => 0],
                ['name' => 'ماء كبير', 'price' => 1.00, 'calories' => 0],
                ['name' => 'شاهي احمر', 'price' => 1.00, 'calories' => 22],
                ['name' => 'شاهي حليب', 'price' => 2.00, 'calories' => 66],
                ['name' => 'حليب عدني', 'price' => 2.00, 'calories' => 69],
                ['name' => 'قهوة', 'price' => 1.00, 'calories' => 8],
            ],
            'قسم اللحوم' => [
                ['name' => 'برمة لحم مع ارز', 'price' => 45.00, 'calories' => 893],
                ['name' => 'لحم مدفون مع ارز', 'price' => 45.00, 'calories' => 800],
                ['name' => 'لحم حنيذ مع ارز', 'price' => 45.00, 'calories' => 802],
                ['name' => 'راس مدفون مع ارز', 'price' => 20.00, 'calories' => 700],
                ['name' => 'مضغوط لحم احمر', 'price' => 45.00, 'calories' => 840],
                ['name' => 'مضغوط لحم ابيض', 'price' => 35.00, 'calories' => 832],
                ['name' => 'مضغوط حاشي مع لبن', 'price' => 40.00, 'calories' => 792],
                ['name' => 'عقدة لحم', 'price' => 55.00, 'calories' => 876],
            ],
            'قسم العريكه والمعصوب' => [
                ['name' => 'عريكة قلعة اليمن', 'price' => 17.00, 'calories' => 800],
                ['name' => 'معصوب عادي', 'price' => 15.00, 'calories' => 670],
                ['name' => 'عريكة قشطة', 'price' => 12.00, 'calories' => 762],
                ['name' => 'معصوب ملكي', 'price' => 10.00, 'calories' => 250],
                ['name' => 'معصوب قمر', 'price' => 17.00, 'calories' => 700],
                ['name' => 'حصون ملكي', 'price' => 15.00, 'calories' => 754],
                ['name' => 'معصوب قشطة عسل', 'price' => 10.00, 'calories' => 350],
                ['name' => 'قلابة اوزاري', 'price' => 8.00, 'calories' => 272],
                ['name' => 'فتة تمر سادة', 'price' => 7.00, 'calories' => 92],
                ['name' => 'فتة تمر نوتيلا', 'price' => 7.00, 'calories' => 81],
                ['name' => 'فتة تمر زبدة', 'price' => 7.00, 'calories' => 192],
                ['name' => 'فتة تمر لوز', 'price' => 7.00, 'calories' => 180],
            ],
            'قسم الدجاج' => [
                ['name' => 'برمة شواية', 'price' => 38.00, 'calories' => 200],
                ['name' => 'دجاج فحم', 'price' => 38.00, 'calories' => 200],
                ['name' => 'دجاج مضغوط', 'price' => 38.00, 'calories' => 230],
                ['name' => 'دجاج حنيذي', 'price' => 38.00, 'calories' => 235],
                ['name' => 'دجاج مطفي', 'price' => 38.00, 'calories' => 232],
                ['name' => 'دجاج محروق', 'price' => 38.00, 'calories' => 240],
                ['name' => 'رز ابيض', 'price' => 6.00, 'calories' => 210],
                ['name' => 'رز ابيض شعبي', 'price' => 9.00, 'calories' => 240],
                ['name' => 'رز بخار', 'price' => 9.00, 'calories' => 215],
            ],
            'قسم الحلا' => [
                ['name' => 'كنافة', 'price' => 8.00, 'calories' => 400],
                ['name' => 'حلا بانيو', 'price' => 7.00, 'calories' => 350],
                ['name' => 'حلا اوريو', 'price' => 7.00, 'calories' => 447],
                ['name' => 'حلا لوتس', 'price' => 7.00, 'calories' => 412],
                ['name' => 'حلا بلوبيري', 'price' => 7.00, 'calories' => 420],
                ['name' => 'حلا كلاسيكي', 'price' => 7.00, 'calories' => 475],
                ['name' => 'حلا كندر', 'price' => 7.00, 'calories' => 430],
                ['name' => 'حلا ميكس', 'price' => 7.00, 'calories' => 400],
                ['name' => 'حلا سنسيو', 'price' => 8.00, 'calories' => 400],
                ['name' => 'كوكتيل فواكه', 'price' => 8.00, 'calories' => 450],
                ['name' => 'ام علي', 'price' => 8.00, 'calories' => 450],
            ],
        ];

        foreach ($menu as $categoryName => $meals) {
            $category = Category::query()->firstOrCreate(['name' => $categoryName]);

            foreach ($meals as $mealData) {
                Meal::query()->updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'name' => $mealData['name'],
                    ],
                    [
                        'price' => $mealData['price'],
                        'calories' => $mealData['calories'],
                    ]
                );
            }
        }
    }
}


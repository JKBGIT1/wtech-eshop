<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;


class CategoryController extends Controller
{
    public function show($id) {
        $output = new ConsoleOutput();
        $category_name = $this->getCategoryName($id);

        $products_list = Category::findOrFail($id)->products()->simplePaginate(4);

//        $output->writeln('PAGINATE');
//        $output->writeln($products_list);
//        $output->writeln('PAGINATE');

        return view('categories.show', [
            'category_name' => $category_name,
            'category_id' => $id,
            'products_list' => $products_list,
            'order' => 0,
            'colors' => [],
            'advantages' => [],
            'price_to' => '',
            'price_from' => '',
        ]);
    }

    public function update($id) {
        $category_name = $this->getCategoryName($id);

        $colors = request('colors');
        $advantages = request('advantages');
        $price_from = request('price_from');
        $price_to = request('price_to');
        $order = request('order');

        $output = new ConsoleOutput();
        $output->writeln($colors);
        $output->writeln($advantages);
        $output->writeln($price_from);
        $output->writeln($price_to);
        $output->writeln($order);

        if (!$colors) {
            $colors = [];
        }

        if (!$advantages) {
            $advantages = [];
        }

        $products_list = Category::findOrFail($id)->products()->simplePaginate(4);

        return view('categories.show', [
            'category_name' => $category_name,
            'category_id' => $id,
            'products_list' => $products_list,
            'order' => $order,
            'colors' => $colors,
            'advantages' => $advantages,
            'price_to' => $price_to,
            'price_from' => $price_from,
        ]);
    }

    public function getCategoryName($id) {
        if ($id == 1) {
            return 'Kuchyňa';
        } else if ($id == 2) {
            return 'Obývačka';
        } else if ($id == 3) {
            return 'Spálňa';
        } else if ($id == 4) {
            return 'Kúpelňa';
        } else if ($id == 5) {
            return 'Pracovňa';
        } else if ($id == 6) {
            return 'Záhrada';
        }

        return 0;
    }
}

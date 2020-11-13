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
        $category_name = '';

        if ($id == 1) {
            $category_name = 'Kuchyňa';
        } else if ($id == 2) {
            $category_name = 'Obývačka';
        } else if ($id == 3) {
            $category_name = 'Spálňa';
        } else if ($id == 4) {
            $category_name = 'Kúpelňa';
        } else if ($id == 5) {
            $category_name = 'Pracovňa';
        } else if ($id == 6) {
            $category_name = 'Záhrada';
        }

        $products_list = Category::findOrFail($id)->products()->simplePaginate(4);

//        $output->writeln('PAGINATE');
//        $output->writeln($products_list);
//        $output->writeln('PAGINATE');

        return view('categories.show', ['category_name' => $category_name, 'category_id' => $id, 'products_list' => $products_list]);
    }
}

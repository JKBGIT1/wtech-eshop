<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Filters;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Output\ConsoleOutput;


class CategoryController extends Controller
{
    public function show(Request $request, $id) {
        $output = new ConsoleOutput();
        $category_name = $this->getCategoryName($id);

        if (Session::has('filters')) {
            $filters = Session::get('filters');
        } else {
            $filters = new Filters();
        }

        $products_list = $this->applyFilters(
            $id,
            $filters->advantages,
            $filters->colors,
            $filters->price_from,
            $filters->price_to,
            $filters->order
        );

        return view('categories.show', [
            'category_name' => $category_name,
            'category_id' => $id,
            'products_list' => $products_list,
            'order' => $filters->order,
            'colors' => $filters->colors,
            'advantages' => $filters->advantages,
            'price_to' => $filters->price_to,
            'price_from' => $filters->price_from,
        ]);
    }

    public function update(Request $request, $id) {
        $products_list = null;
        $category_name = $this->getCategoryName($id);

        $filters = $this->changeFiltersAndStoreIntoSession($request);

        $products_list = $this->applyFilters(
            $id,
            $filters->advantages,
            $filters->colors,
            $filters->price_from,
            $filters->price_to,
            $filters->order
        );

        return view('categories.show', [
            'category_name' => $category_name,
            'category_id' => $id,
            'products_list' => $products_list,
            'order' => $filters->order,
            'colors' => $filters->colors,
            'advantages' => $filters->advantages,
            'price_to' => $filters->price_to,
            'price_from' => $filters->price_from,
        ]);
    }

    public function changeFiltersAndStoreIntoSession(Request $request) {
        if (Session::has('filters')) {
            $filters = Session::get('filters');
        } else {
            $filters = new Filters();
        }

        // Change filters based on values from form
        $filters->changeFilters(
            request('colors'),
            request('advantages'),
            request('price_from'),
            request('price_to'),
            request('order')
        );

        $request->session()->put('filters', $filters); // store filters objects into session

        return $filters;
    }

    public function applyFilters($id, $advantages, $colors, $price_from, $price_to, $order) {
        if ($price_from && $price_to && $order) {
            $products_list = Category::findOrFail($id)->products()
                ->whereBetween('price', [$price_from, $price_to])
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->orderBy('price', $order)
                ->paginate(4);
        } else if ($price_from && $price_to) {
            $products_list = Category::findOrFail($id)->products()
                ->whereBetween('price', [$price_from, $price_to])
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->paginate(4);
        } else if ($price_from && $order) {
            $products_list = Category::findOrFail($id)->products()
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->where('price', '>=', $price_from)
                ->orderBy('price', $order)
                ->paginate(4);
        } else if ($price_to && $order) {
            $products_list = Category::findOrFail($id)->products()
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->where('price', '<=', $price_to)
                ->orderBy('price', $order)
                ->paginate(4);
        } else if ($price_from) {
            $products_list = Category::findOrFail($id)->products()
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->where('price', '>=', $price_from)
                ->paginate(4);
        } else if ($price_to) {
            $products_list = Category::findOrFail($id)->products()
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->where('price', '<=', $price_to)
                ->paginate(4);
        } else if ($order) {
            $products_list = Category::findOrFail($id)->products()
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->orderBy('price', $order)
                ->paginate(4);
        } else {
            $products_list = Category::findOrFail($id)->products()
                ->whereJsonContains('advantages', $advantages)
                ->whereJsonContains('colors', $colors)
                ->paginate(4);
        }

        return $products_list;
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

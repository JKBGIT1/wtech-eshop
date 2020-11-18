<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Search;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $output = new ConsoleOutput();

        $request->validate([
            'searchText' => 'required',
        ]);

        $search = new Search();

        $products = $search->search2($request->input());

        return view('search.show')->with('products', $products);
    }
}

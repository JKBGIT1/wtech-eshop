<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Search;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Output\ConsoleOutput;

class SearchController extends Controller
{
    public function show(Request $request) {

        if (Session::has('text')) {
            $search = Session::get('text');
        } else {
            $search = new Search();
        }

        $search->setSearchText($request->input('text'));

        $products = $this->searchFullText($search->searchText);

        return view('search.show', ['text' => $search->searchText, 'products' => $products]);
    }

    public function update(Request $request) {
        $products = null;

        $search = $this->changeAndStoreIntoSession($request);

        $search->setSearchText($request->input('text'));

        $products = $this->searchFullText($search->searchText);

        return view('search.show', ['text' => $search->searchText, 'products' => $products]);
    }

    public function changeAndStoreIntoSession(Request $request) {
        if (Session::has('text')) {
            $search = Session::get('text');
        } else {
            $search = new Search();
        }

        $search->setSearchText($request->input('text'));

        $request->session()->put('text', $search->searchText); // store filters objects into session

        return $search;
    }

    public function searchFullText($hladanaFraza){

        //$fraza = array_values($hladanaFraza);
        //$fraza = $fraza[0];
        $fraza = $hladanaFraza;

        if(strtolower($fraza) == "novinka" || strtolower($fraza) == "novinky" || strtolower($fraza) == "nove"){
            $fraza="new";
        }
        else if (strtolower($fraza) == "reklama" || strtolower($fraza) == "z reklamy" || strtolower($fraza) == "produkty z reklamy"){
            $fraza="add_product";
        }
        else if (strtolower($fraza) == "najpredavanejsie" || strtolower($fraza) == "hit"){
            $fraza="best_selling";
        }

        //Inspiracia > https://stackoverflow.com/questions/48089966/how-to-get-search-query-from-multiple-columns-in-database
        $products = Product::where(DB::raw('lower("name")'), 'LIKE', '%'.$fraza.'%')
            ->orWhere('description', 'LIKE', '%'.$fraza.'%')
            ->orWhere('advantages', 'LIKE', '%'.$fraza.'%')
            ->orWhere('colors', 'LIKE', '%'.$fraza.'%')->paginate(4);

        return $products;

    }
}

<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductController extends Controller
{
    public function show($id) {
        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);
    }

    public function list($page) {
        // get rowsPerPage from query parameters (after ?), if not set to 5
        $rowsPerPage = request('rowsPerPage', 5);

        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');

        // get descending from query parameters (after ?), if not set => false
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';

        // pagination
        // IF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;

            // load products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }

        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();

        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

    public function destroy(Product $product) {
        try {
            $product->delete();
            return response()->json(['status'=>'success','msg' => 'Produkt bol úspešne vymazaný.']);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['status'=>'fail', 'msg' => 'Produkt sa nepodarilo vymazat']);
        }
    }

    public function store(Request $request) {
        $output = new ConsoleOutput();
        $output->writeln($request->name);
        $output->writeln($request->description);

        // Need to make own product creation
        $product = Product::create(['name' => $request->name, 'description' => $request->description]);
        return response()->json(['id' => $product->id]);
    }

    public function update() {

    }

    public function edit(Product $product) {
        $get_product = Product::findOrFail($product);
        return response()->json(['id' => $get_product->id]);
    }
}

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

    public function imageUpload(Request $request) {
        $output = new ConsoleOutput();

        try {
            if ($request->hasFile('file')) {
                $destination_path = 'public/imgs';
                $image_name = $request->file->getClientOriginalName();
                $request->file('file')->storeAs($destination_path, $image_name);

                return response()->json(['path' => '/imgs/'.$image_name]);
            }

            return response()->json(['path' => 'fail']);
        } catch (Throwable $e) {
            $output->writeln($e);
            return response()->json(['path' => 'fail']);
        }
    }

    public function store(Request $request) {
        $output = new ConsoleOutput();
//        $images = $request->images;
//        $output->writeln($images);
//        Storage::disk('public')->putFileAs('/', $images, 'hello_there.jpg');
        // Need to make own product creation
        $product = $this->createOrUpdateProduct($request, null);
//            $product->name = "Nazdar";
//            $product->price = (float) 1257;
//            $product->width = (int) 999;
//            $product->length = (int) 888;
//            $product->height = (int) 777;
//            $product->colors = ["cierna"];
//            $product->category_id = (int) 1;
//            $product->number_of_packs = (int) 2;
//            $product->material = "Velky";
//            $product->advantages = ["new","add_product","best_selling"];
//            $product->description = "Hello there";
//            $product->timestamps = false;


        $product->save();

        return response()->json(['id' => $product->id]);
//        return view('welcome');
    }

    public function update(Request $request) {
        // need to update product
        $product_id = $request->id;
        $product = Product::find($product_id);

        $product = $this->createOrUpdateProduct($request, $product);

        $product->save();

        return response()->json(['product' => $product_id]);
    }

    public function edit(Product $product) {
        return response()->json(['product' => $product]);
    }

    public function createOrUpdateProduct($request, $product) {
        if ($product == null) { // we need to create new Product object
            $product = new Product();
        }

        $product->name = $request->name;
        $product->price = (float) $request->price;
        $product->width = (int) $request->width;
        $product->length = (int) $request->length;
        $product->height = (int) $request->height;
        $product->colors = $request->colors;
        $product->category_id = (int) $request->category_id;
        $product->number_of_packs = (int) $request->number_of_packs;
        $product->material = $request->material;
        $product->advantages = $request->advantages;
        $product->description = $request->description;
        $product->timestamps = false;
        $product->images = $request->images;

        return $product;
    }
}

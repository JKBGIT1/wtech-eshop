<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Throwable;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $output = new ConsoleOutput();

        try {
            $product->delete();
            foreach($product->images as $image) {
                if (File::exists(public_path($image))) {
                    File::delete(public_path($image));
                } else {
                    $output->writeln('Image doesn\'t exists.');
                }
            }
            return response()->json(['status'=>'success','msg' => 'Produkt bol úspešne vymazaný.']);
        } catch (Throwable $e) {
            $output->writeln($e);
            return response()->json(['status'=>'fail', 'msg' => 'Produkt sa nepodarilo vymazat']);
        }
    }

    public function imageUpload(Request $request) {
        $output = new ConsoleOutput();

        try {
            if ($request->hasFile('file')) {
                $image_name = $request->file->getClientOriginalName();
                $request->file('file')->storeAs('/', $image_name, 'upload_images'); // upload_images declared in /config/filesystem.php

                return response()->json(['path' => '/imgs/'.$image_name]);
            }

            return response()->json(['path' => 'fail']);
        } catch (Throwable $e) {
            $output->writeln($e);
            return response()->json(['path' => 'fail']);
        }
    }

    public function store(Request $request) {
        $product = $this->createOrUpdateProduct($request, null);

        $product->save();

        return response()->json(['id' => $product->id]);
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
        // need to store edit
        $product_images = [];
        for ($i = 0; $i < count($product->images); $i++) {
            if (File::exists(public_path($product->images[$i]))) {
                $product_images[$i] = mb_convert_encoding(File::get(public_path($product->images[$i])), 'UTF-8', 'UTF-8');;
            }
        }

        return response()->json([
            'product' =>  $product,
            'product_images' => $product_images,
        ]);
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
        if (count($request->images) > 0) { // doesn't set blank array
            $product->images = $request->images;
        }

        return $product;
    }
}

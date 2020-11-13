<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductController extends Controller
{
    public function show($id) {
        $output = new ConsoleOutput();

//        $output->writeln($id);
        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);
    }
}

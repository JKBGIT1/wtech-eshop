<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductController extends Controller
{
    public function show($id) {
        $output = new ConsoleOutput();

        $output->writeln($id);

        return view('products.show');
    }
}

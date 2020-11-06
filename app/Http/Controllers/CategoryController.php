<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class CategoryController extends Controller
{
    public function show($id) {
        $output = new ConsoleOutput();

        if ($id == 'kitchen') {
            $id = 'Kuchyňa';
        } else if ($id == 'living_room') {
            $id = 'Obývačka';
        } else if ($id == 'bedroom') {
            $id = 'Spálňa';
        } else if ($id == 'bathroom') {
            $id = 'Kúpelňa';
        } else if ($id == 'working_room') {
            $id = 'Pracovňa';
        } else if ($id == 'garden') {
            $id = 'Záhrada';
        }

        $output->writeln($id);

        return view('categories.show', ['category_name' => $id]);
    }
}

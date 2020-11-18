<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    //use HasFactory;
    protected $table = 'products';
    protected $fillable = ['id', 'name', 'images', 'advantages', 'description'];

    public function  search2($searchText){

        $hladanaFraza = array_values($searchText);
        $hladanaFraza = $hladanaFraza[0];

        /*Inspiracia > https://stackoverflow.com/questions/48089966/how-to-get-search-query-from-multiple-columns-in-database*/
        $products = Product::where('name', 'LIKE', '%'.$hladanaFraza.'%')
            ->orWhere('description', 'LIKE', '%'.$hladanaFraza.'%')
            ->orWhere('advantages', 'LIKE', '%'.$hladanaFraza.'%')->get();

        return $products;
    }
}

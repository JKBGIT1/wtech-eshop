<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public $searchText = '';

    public function setSearchText($fraza){

        $this->searchText = $fraza;

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
		// A ideia aqui é fornecer uma sequencia de caracteres
		// passar a chave para descriptografar, a sequencia de caracteres
		// exemplo: passou a palavra [gol, chave +1, ficaria hpm]
		$codigo = explode(",", "u,p,o,m,v,j");
		$chave = -1;

		// Enter your code here, enjoy!
		$arr_alfabeto =range('a', 'z');

		// print_r($arr_alfabeto);
	
			
		$cd = "";

		foreach($codigo as $key => $value){
			
			if( in_array($value, $arr_alfabeto) ){
				$num  = array_keys($arr_alfabeto, $value )[0];
			
			
				$num = $num -1;
				
				// print_r($num);	
				$cd = $cd . $arr_alfabeto[$num];
				
			}else{
				
				echo "não esta no alfabeto";
			}
			
		}

	echo "\n\n";
	// echo "código antigo: ". implode(',', $codigo);
	echo "código novo: ";
	print_r($cd);

    }
}

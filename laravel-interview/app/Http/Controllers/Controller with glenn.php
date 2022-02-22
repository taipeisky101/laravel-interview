<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() 
    {
        $animals = self::allAnimals();
        return view('animals_index', ['animals' => $animals]);
    }

    public function selectAnimals(Request $request)
    {
        $type = $request->input('type');
        $numberOfAnimals = $request->input('numberOfAnimals');

        return redirect("/$type");
    }

    public function animals(Request $request, $type = null, $numberOfAnimals = 0, $reverse = 'false')
    {
        $data = [];
        $split = [];
        $animals = self::allAnimals();
        $totalPrice = 0;

        if ($numberOfAnimals != 0) {
            if ($reverse == 'true') {
                foreach ($animals as $animal) {
                    if ($animal['type'] != $type) {
                        array_push($data, [
                            $animal
                        ]);
                    }
                }
            } else {
                $IDs = array_keys(array_column(self::allAnimals(), 'type'), $type); // ex: [3, 4, 5, 6]

                for ($i=0; $i<$numberOfAnimals; $i++) {
                    if (!isset($split[$IDs[$i%count($IDs)]])) {
                        $split[$IDs[$i%count($IDs)]] = 1;
                    } else {
                        $split[$IDs[$i%count($IDs)]]++;
                    }
                }

                foreach ($split as $id => $quantity) {
                    // $found = array_filter($animals,function($v,$k) use ($id){
                    //     return $v['id'] == $id;},ARRAY_FILTER_USE_BOTH);

                    array_push($data, [
                    "id" => $animals[$id]['id'],
                    "price" => $animals[$id]['price'],
                    "type" => $type,
                    'name' => $animals[$id]['name'],
                    'quantity' => $quantity
                ]);

                    $totalPrice += $animals[$id]['price'] * $quantity;
                }
            }
         } else {
             foreach ($animals as $animal) {
                if ($animal['type'] == $type) {
                    array_push($data, [
                        $animal
                    ]);
                }
                //  else {
                //      if ($animal['type'] != $type) {
                //          array_push($data, [
                //         $animal
                //     ]);
                //      }
                //  }
             }
         }

        // $customers = DB::table('customers')->get();

        return response()->json(["data" => $data]);
        // return view('animals_select', [
        //     'data' => $data, 
        //     'type' => $type,
        //     'numberOfAnimals' => $numberOfAnimals, 
        //     'totalPrice' => $totalPrice,
        //     'customers' => $customers
        // ]);
    }

    public function buy(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'type' => 'required',
            'number_of_animals' => 'required',
            'total_price' => 'required',
        ]);

        Transaction::create(request([
            'customer_id', 
            'type', 
            'number_of_animals', 
            'total_price', 
            'created_at', 
            'updated_at',
        ]));

        return redirect('/transactions');
    }

    private function allAnimals() : array
    {
        return [
            [
                "id"   => 1,
                "price" => 5,
                "type" => 'dog',
                'name' => 'bulldog'
            ],
            [
                "id"   => 2,
                "price" => 10,
                "type" => 'dog',
                'name' => 'poodle'
            ],
            [
                "id"   => 3,
                "price" => 15,
                "type" => 'dog',
                'name' => 'beagle'
            ],
            [
                "id"   => 4,
                "price" => 5,
                "type" => 'cat',
                'name' => 'persian'
            ],
            [
                "id"   => 5,
                "price" => 100,
                "type" => 'cat',
                'name' => 'russian blue'
            ],
            [
                "id"   => 6,
                "price" => 10,
                "type" => 'cat',
                'name' => 'scottish fold'
            ],
            [
                "id"   => 7,
                "price" => 15,
                "type" => 'cat',
                'name' => 'siamese'
            ],
            [
                "id"   => 8,
                "price" => 100,
                "type" => 'cow',
                'name' => 'angus'
            ],
            [
                "id"   => 9,
                "price" => 200,
                "type" => 'cow',
                'name' => 'hereford'
            ],
            [
                "id"   => 10,
                "price" => 1000,
                "type" => 'cow',
                'name' => 'guernsey'
            ]
        ];

    }
    
}

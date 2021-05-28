<?php

namespace App\Imports;

use App\Models\Pincode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PincodeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $pincode = Pincode::where('pincode',$row['pincode'])->first();
        if ($pincode) {
            $pincode->delivery_charge = $row['delivery_charge'];
        }
        else{
            return new Pincode([
                'pincode' => @$row['pincode'],
                'delivery_charge' => @$row['delivery_charge'], 
            ]);
        }
        
    }
}

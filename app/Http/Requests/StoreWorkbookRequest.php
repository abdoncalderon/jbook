<?php

namespace App\Http\Requests;

use App\Models\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkbookRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $location_id = $this->get('location_id');
        $dateWorkbook = $this->get('dateWorkbook');
        $legalSheets = Workbook::where('location_id',$location_id)->where('dateWorkbook',$dateWorkbook)->get();
        if (count($legalSheets)>0){
            return [
                'location_id'=>'max:0',
            ];
        }else{
            return [
                'dateWorkbook'=>'required',
                'location_id'=>'required',
                'user_id'=>'required',
                'number'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'location_id.max' => __('messages.exists'),
        ];
    }
}

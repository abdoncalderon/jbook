<?php

namespace App\Http\Requests;

use App\Models\DailyReport;
use Illuminate\Foundation\Http\FormRequest;

class StoreDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $workbook_id = $this->get('workbook_id');
        $period_id = $this->get('period_id');
        $dailyReports = DailyReport::where('workbook_id',$workbook_id)->where('period_id',$period_id)->get();
        if (count($dailyReports)>0){
            return [
                'workbook_id'=>'max:0',
            ];
        }else{
            return [
                'workbook_id'=>'required',
                'period_id'=>'required',
                'report'=>'required',
                'user_id'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'workbook_id.max' => __('messages.exists'),
        ];
    }
}

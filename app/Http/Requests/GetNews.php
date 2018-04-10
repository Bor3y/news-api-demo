<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetNews extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort' => 'array',
            'sort.*.key' => [
                'string',
                'in:title,date'
            ],
            'filter_groups' => 'array',
            'filter_groups.*.or' => 'in:true,false,0,1',
            'filter_groups.*.filters' => 'array',
            'filter_groups.*.filters.*.key' => [
                'string',
                'in:title,date'
            ],
            'filter_groups.*.filters.*.operator' => [
                'string',
                'in:ct,sw,ew,eq,gt,gte,lte,lt,in,bt'
            ],
            'filter_groups.*.filters.*.not' => 'boolean',
            'limit' => 'integer',
            'page' => 'integer',
        ];
    }
}

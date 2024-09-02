<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\YearCheck;

class VehicleValidate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'marca' => ['required', 'max:50'],
            'modelo' => ['required', 'max:50'],
            
            'placa' => ['required', 'regex:/[a-zA-Z]{3}[0-9]{4}/'],          
            'renavam' => ['required', 'digits:11'],
                        
            'ano' => ['required', 'digits:4']
        ];

        $match = Rule::unique('vehicles')->whereNull('deleted_at');

        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $rules['placa'][] = $match->ignore($this->vehicle->id);
            $rules['renavam'][] = $match->ignore($this->vehicle->id);
        } else if($this->method() == 'POST') {
            $rules['placa'][] = $match;
            $rules['renavam'][] = $match;
        }

        return $rules;
    }

    public function messages() {
        return [
            'placa.regex' => 'Formato não segue padrão AAA1234.',
            'placa.unique' => 'Placa já cadastrada!',
            'renavam.unique' => 'Renavam já cadastrado!!'
        ];
    }
}

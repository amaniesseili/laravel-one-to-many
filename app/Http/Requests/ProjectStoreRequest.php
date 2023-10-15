<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool 
    {
        $user = Auth::user();  // per recuperare l'utente autenticato
        if ($user->email === "esseiliamani@hotmail.com"){ //se la mail e esseili... lo faccio passare,altrimenti no
            return true;
        }
        return false; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'=>"required|image|max:5000",
            'title'=>"required|max:255",
            'description'=>"required",
        ];
    }
}

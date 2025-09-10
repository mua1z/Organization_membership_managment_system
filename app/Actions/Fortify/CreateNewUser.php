<?php

namespace App\Actions\Fortify;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         //'sex' => ['nullable', 'in:male,female,other'],
        'join_date' => ['nullable', 'date'],
        'address' => ['nullable', 'string', 'max:500'],
        'phone' => ['nullable', 'string', 'max:20'],
        'organization_name' => ['nullable', 'string', 'max:255'],
        'organization_type' => ['nullable', 'string', 'max:255'],
        'plan_id' => ['required', 'string', 'max:100'],
        'member' => ['nullable', 'integer'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $defaultPlan = Plan::where('type', 'organAdmin')->where('name', 'Basic')->first();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
         'sex' => $input['sex'] ?? null,
         'join_date' => $input['join_date'] ?? null,
           // 'address' => $input['address'],
            'address' => $input['address'] ?? null,
            'phone' => $input['phone'] ,
            'organization_name' => $input['organization_name'],
            'organization_type' => $input['organization_type'],
            //'plan' => $input['plan'],
             'plan_id' => $defaultPlan->id,
        'plan_expiry' => null, // free plan never expires
            'role' => $input['role'] ?? 'organAdmin',
            'member' => $input['member'],
            'password' => Hash::make($input['password']),
        ]);


    }

}



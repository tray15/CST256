<?php
namespace App\Http\Controllers;

use App\Models\ProfileModel;
use App\Services\Business\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function saveProfile(Request $request)
    {
        $service = new ProfileService();

        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $user_id = $request->get('id');

        $this->validateForm($request);

        $profile = new ProfileModel($firstname, $lastname, $address, $phone, $email, $user_id);
        $profileId = $service->saveProfile($profile);

        if ($profileId) {
            return view('home')->with('firstname', $profile->getFirstname());
        } else {
            return view('loginFailed');
        }
    }

    private function validateForm(Request $request)
    {
        // Setup Data Validation Rules for Create Profile Form
        $rules = [
            'firstname' => 'Required | Between:4,10 | alpha',
            'lastname' => 'Required | Between:4,20 | alpha',
            'address' => 'Required | Between:4,40 | String',
            'phone' => 'Required | regex:/^(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'email' => 'Required | email'
        ];

        // Run Data Validation Rules
        $this->validate($request, $rules);
    }
}
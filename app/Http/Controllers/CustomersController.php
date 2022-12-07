<?php

namespace App\Http\Controllers;

use App\Models\CardRequest;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function fetchCustomers()
    {
        $datas['users'] = Customer::where("created_by", Auth::id())->get();
        $datas['i'] = 1;
        return view('users', $datas);
    }

    public function createCustomer(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'bvn' => 'required|max:200',
            'dob' => 'required|max:200',
            'phone' => 'required|max:11',
            'email' => 'required|email|max:200',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => env('VFDC_URL') . 'agency-bank/verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
    "bvn":"' . $input['bvn'] . '",
    "dateOfBirth":"' . Carbon::parse($input['dob'])->format('d-M-Y') . '",
    "phoneNo":"' . $input['phone'] . '"
    }',
                            CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' .env('VFDC_TOKEN'),
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            Log::info("Create Customer verify URL: ".env('VFDC_URL') . 'agency-bank/verify');
            Log::info("Create Customer verify PAYLOAD: ".'{
    "bvn":"' . $input['bvn'] . '",
    "dateOfBirth":"' . Carbon::parse($input['dob'])->format('d-M-Y') . '",
    "phoneNo":"' . $input['phone'] . '"
    }');
            Log::info("Create Customer Account: $response");

            $rep = json_decode($response, true);

            if ($rep['status'] != "success") {
                return back()->withInput()->with('error', 'An error occurred. ' . $rep['message']);
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Fatai Error, kindly contact admin');
        }

        session(['input' => $input]);

        return redirect()->route('addCustomerOTP')->with('success', 'OTP has been sent to customer phone');

    }

    public function createCustomerOtp(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'otp' => 'required|max:6',
            'avatar' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $oInput = session('input');

//        return base64_encode(file_get_contents($request->file('avatar')->path()));

//        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => env('VFDC_URL') . 'agency-bank/otp-verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
    "bvn":"' . $oInput['bvn'] . '",
    "dateOfBirth":"' . Carbon::parse($oInput['dob'])->format('d-M-Y') . '",
    "phoneNo":"' . $oInput['phone'] . '",
    "otp":"' . $input['otp'] . '",
    "type":"signup"
    }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . env('VFDC_TOKEN'),
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
//        echo $response;

        Log::info("Create Customer otp-verify URL: ".env('VFDC_URL') . 'agency-bank/otp-verify');
        Log::info("Create Customer otp-verify PAYLOAD: ".'{
    "bvn":"' . $oInput['bvn'] . '",
    "dateOfBirth":"' . Carbon::parse($oInput['dob'])->format('d-M-Y') . '",
    "phoneNo":"' . $oInput['phone'] . '",
    "otp":"' . $input['otp'] . '",
    "type":"signup"
    }');
        Log::info("Create Customer otp-verify: $response");


        $rep = json_decode($response, true);

            if ($rep['status'] != "success") {
                return back()->withInput()->with('error', $rep['message']);
            }

            $input['avatarBase64'] = base64_encode(file_get_contents($request->file('avatar')->path()));


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => env('VFDC_URL') . 'agency-bank/create-account',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
    "bvn":"' . $oInput['bvn'] . '",
    "referralCode":"",
    "phoneNo":"' . $oInput['phone'] . '",
    "email":"' . $oInput['email'] . '",
    "agent":"' . env('VFD_AGENT') . '",
    "avatar": "' . $input['avatarBase64'] . '"
    }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . env('VFDC_TOKEN'),
                ),
            ));

            $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;

        Log::info("createCustomer URL: " . env('VFDC_URL') . 'agency-bank/create-account');
        Log::info("createCustomer Request Payload: " . '{
    "bvn":"' . $oInput['bvn'] . '",
    "referralCode":"",
    "phoneNo":"' . $oInput['phone'] . '",
    "email":"' . $oInput['email'] . '",
    "agent":"' . env('VFD_AGENT') . '",
    "avatar": "' . $input['avatarBase64'] . '"
    }');
        Log::info("createCustomer Response: $response");


        $rep = json_decode($response, true);


        if ($rep['status'] != "success") {
            return redirect()->route('add-customer')->withInput()->with('error', $rep['message']);
        }

//        } catch (\Exception $e) {
//            return redirect()->route('add-customer')->with('error', 'Fatai Error, kindly contact admin');
//        }


        $data['bvn'] = $oInput['bvn'];
        $data['phone'] = $oInput['phone'];
        $data['email'] = $oInput['email'];
        $data['accountNo'] = $rep['data']['accountNo'];
        $data['accountName'] = $rep['data']['accountName'];
        $data['created_by'] = Auth::id();
        $data['creator_uuid'] = Auth::user()->uuid;

        Customer::create($data);

        return redirect()->route('customers')->with('success', 'Customer created successfully');

    }


    public function fetchDebitcard()
    {
        $datas['cards'] = CardRequest::where("created_by", Auth::id())->get();
        $datas['i'] = 1;

        return view('debit-card', $datas);
    }

    public function verifyDebitcard(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => env('VFDC_URL') . 'agency-bank/validate-account',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
"accountNo":"' . $input['accountNumber'] . '",
"validationType": "card-request"
}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . env('VFDC_TOKEN'),
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
//            return $response;

            Log::info("Debit Card validate-account URL: " . env('VFDC_URL') . 'agency-bank/validate-account');
            Log::info("Debit Card Request Payload: " . '{
"accountNo":"' . $input['accountNumber'] . '",
"validationType": "card-request"
}');
            Log::info("Debit Card Response: $response");

            $rep = json_decode($response, true);

            if ($rep['status'] != "success") {
                return back()->withInput()->with('error', $rep['message']);
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Fatai Error, kindly contact admin');
        }

        session(['input' => $input]);

        return redirect()->route('debit-card-OTP')->with('success', 'OTP has been sent to customer phone');

    }

    public function debitCardProceed(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $oInput = session('input');

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => env('VFDC_URL') . 'agency-bank/card-request',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
    "accountNo":"' . $oInput['bvn'] . '",
    "address":"' . $input['address'] . '"
    }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . env('VFDC_TOKEN'),
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);


            Log::info("Debit Card Request URL: " . env('VFDC_URL') . 'agency-bank/card-request');
            Log::info("Debit Card Request Payload: " . '{
    "accountNo":"' . $oInput['bvn'] . '",
    "address":"' . $input['address'] . '"
    }');
            Log::info("Debit Card Response: $response");


            $rep = json_decode($response, true);

            if ($rep['status'] != "success") {
                return back()->withInput()->with('error', $rep['message']);
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Fatai Error, kindly contact admin');
        }


        $data['account_number'] = $oInput['bvn'];
        $data['address'] = $oInput['phone'];
        $data['account_name'] = $oInput['email'];
        $data['status'] = $rep['data']['accountNo'];
        $data['accountName'] = $rep['data']['accountName'];
        $data['created_by'] = Auth::id();
        $data['creator_uuid'] = Auth::user()->uuid;

        CardRequest::create($data);

        return redirect()->route('addCustomer')->with('success', $rep['message']);

    }


}

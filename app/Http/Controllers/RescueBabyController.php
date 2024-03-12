<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Transaction;
use App\Payments\Pesapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RescueBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("rescue.rescue");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //code...
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'address' => 'required|string|max:255',
                'contact_number' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'zip_code' => 'required|string|max:255',
                'billing_address' => 'nullable|string|max:255',
            ]);

            //auto generate sponsor identifier
            $validatedData['sponsor_identifier'] = Str::random(10);
            $callback_url  =  "https://dummy.fountainofpeace.org.ug/finishPayment";
            $cancel_url  =  "https://dummy.fountainofpeace.org.ug/cancelPayment";

            $sponsor = Sponsor::create(([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['contact_number'],
                'address' => $validatedData['address'],
                'city' => $validatedData['country'],
                'state' => $validatedData['zip_code'],
                'country' => $validatedData['country'],
                'postal_code' => $validatedData['zip_code'],
                'sponsor_identifier' => $validatedData['sponsor_identifier'],
            ]));
            $status = config("status.payment_status.pending");
            $customer_email = $request->email;
            $customer_id = $sponsor->id;
            $phone_number = $request->contact_number;
            $reference = Str::uuid();
            $amount = 500;
            $description = "Payment for rescue baby";
            Transaction::create([
                'reference' => $reference,
                'amount' => $amount,
                'sponsor_id' => $sponsor->id,
                'status' => $status,
                'description' => $description,
                'phone_number' => $phone_number,
                'payment_mode' => "pesapal",
                'OrderNotificationType' => "pesapal",
                'order_tracking_id' => $reference,
                'type' => "Rescue Baby",
                'payment_method' => "Pesapal",
            ]);


            $res =  Pesapal::orderProcess($reference, $amount, $phone_number, $description, $callback_url, $request->first_name, $request->last_name, $customer_email, $customer_id, $cancel_url);
            if ($res->success) {

                return redirect($res->message->redirect_url);
            } else {
                // dd($res);
                return redirect()->back()->with('error', 'Payment Failed please try again');
            }
        } catch (\Throwable $th) {
            //throw $th;

            Log::info("===========callback url==================================");
            Log::error($th->getMessage());
            Log::info("============call back url=================================");
            dd($th->getMessage());
            // return response()->json(['success' => false, 'message' => $th->getMessage(), "status" => 500]);
        }
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

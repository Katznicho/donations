<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\PaymentController;
use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// getAllChildrenByPagination

Route::prefix("donation/v1")->group(function () {
    Route::get("getAllChildrenByPagination", [DonationController::class, "getAllChildrenByPagination"]);
    Route::get("getChildrenBySponsorId/{sponsorId}", [DonationController::class, "getChildrenBySponsorId"]);
    Route::get("getChildBySponsorIdAndChildId/{sponsorId}/{childId}", [DonationController::class, "getChildBySponsorIdAndChildId"]);
    Route::get("getChildById/{id}", [DonationController::class, "getChildById"]);
    Route::post("sponsorChild", [DonationController::class, "sponsorChild"]);
    Route::post("cancelChildSponsor", [DonationController::class, "cancelChildSponsor"]);

    //mothers
    Route::get("getAllMothersByPagination", [DonationController::class, "getAllMothersByPagination"]);
    Route::get("getMotherById/{id}", [DonationController::class, "getMotherById"]);
    Route::get("getMothersBySponsorId/{sponsorId}", [DonationController::class, "getMothersBySponsorId"]);
    Route::get("getMotherBySponsorIdAndMotherId/{sponsorId}/{motherId}", [DonationController::class, "getMotherBySponsorIdAndMotherId"]);
    Route::post("sponsorMother", [DonationController::class, "sponsorMother"]);
    Route::post("cancelMotherSponsor", [DonationController::class, "cancelMotherSponsor"]);
    //mothers
});

Route::get("test", function () {
    // return "test";
    $child = Children::where("id", 1)->withCount("sponsorChild")->get();

    return $child;
});

Route::post("registerIPN", [PaymentController::class, "registerIPN"]);
Route::get("listIPNS", [PaymentController::class, "listIPNS"]);
Route::get("completePayment", [PaymentController::class, "completePayment"]);
Route::post("processOrder", [PaymentController::class, "processOrder"]);

Route::post("testSendingMessages", [PaymentController::class, "testSendingMessages"]);

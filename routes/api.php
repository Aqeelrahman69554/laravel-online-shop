<?php
use App\Http\Controllers\Api\MidtransCallbackController;
Route::post('midtrans/callback', [MidtransCallbackController::class,'handleNotification']);

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JourneyController extends Controller
{

    public function journey() {
        $user_id = auth()->user()->id;
        $journey = Journey::query()->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        if (count($journey) > 0) {
            return returnData(200, 'ok', $journey);
        }
        else {
            return returnNoData();
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'mile' => 'required|integer',
            'save' => 'required|integer',
            'start_address' => 'required|string',
            'end_address' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user_id = auth()->user()->id;
        $journey = new Journey();
        $journey->mile = $request->mile;
        $journey->save = $request->save;
        $journey->start_address = $request->start_address;
        $journey->end_address = $request->end_address;
        $journey->start_date = $request->start_date;
        $journey->end_date = $request->end_date;
        $journey->status = $request->status;
        $journey->user_id = $user_id;
        $journey->save();

        if ($journey) {
            return returnData(201, 'created', $journey);
        }
        else {
            return returnNoData();
        }
    }
}

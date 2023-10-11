<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index($user_id)
    {
        $journeys = Journey::query()->where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(PAGINATION);
        return view('pages.users.journey.index', compact('journeys'));
    }

    public function destroy(Journey $journey) {
        $journey->delete();
        toastr()->success('Journey Deleted Successfully');
        return back();
    }

    public function search(Request $request)
    {
        $journeys = Journey::where('mile', 'like', '%' . $request->search_string . '%')
            ->orWhere('save', 'like', '%' . $request->search_string . '%')
            ->orWhere('start_address', 'like', '%' . $request->search_string . '%')
            ->orWhere('end_address', 'like', '%' . $request->search_string . '%')
            ->orWhere('start_date', 'like', '%' . $request->search_string . '%')
            ->orWhere('end_date', 'like', '%' . $request->search_string . '%')
            ->orWhere('status', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(PAGINATION);


        if ($journeys->count() >= 1) {
            return view('pages.users.journey.search_journey', compact('journeys'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }
}

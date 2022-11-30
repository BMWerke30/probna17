<?php

namespace App\Http\Controllers;

use App\Events\OrderPlacedEvent;
use App\Http\Requests\MakeReservationRequest;
use App\Rezervado\Gateways\FrontendGateway;
use App\Rezervado\Interfaces\FrontendRepositoryInterface;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function __construct(FrontendRepositoryInterface $frontendRepository, FrontendGateway $frontendGateway)
    {
        $this->middleware('auth')->only(['makeReservation', 'addComment', 'like', 'unlike']);

        $this->fR = $frontendRepository;
        $this->fG = $frontendGateway;
    }


    public function index()
    {
        $objects = $this->fR->getObjectsForMainPage();

        return view('frontend.index', ['objects' => $objects]);
    }

    public function object($id)
    {
        $object = $this->fR->getObject($id);
        return view('frontend.object', ['object' => $object]);
    }


    public function person($id)
    {

        $user = $this->fR->getPerson($id);
        return view('frontend.person', ['user' => $user]);
    }


    public function room($id)
    {
        $room = $this->fR->getRoom($id);
        return view('frontend.room', ['room' => $room]);
    }


    public function ajaxGetRoomReservations($id)
    {
        $reservations = $this->fR->getReservationsByRoomId($id);

        return response()->json([
            'reservations' => $reservations
        ]);
    }


    public function roomsearch(Request $request)
    {
        if ($city = $this->fG->getSearchResults($request)) {
            return view('frontend.roomsearch', ['city' => $city]);
        } else {
            if (!$request->ajax()) {
                return redirect('/')->with('norooms', __('No offers were found matching the criteria'));
            }
        }
    }


    public function searchCities(Request $request)
    {
        $results = $this->fG->searchCities($request);

        return response()->json($results);
    }


    public function like($likeable_id, $type, Request $request)
    {
        $this->fR->like($likeable_id, $type, $request);

        return redirect()->back();
    }


    public function unlike($likeable_id, $type, Request $request)
    {
        $this->fR->unlike($likeable_id, $type, $request);

        return redirect()->back();
    }


    public function addComment($commentable_id, $type, Request $request)
    {
        $this->fG->addComment($commentable_id, $type, $request);

        return redirect()->back();
    }


    public function makeReservation($room_id, $city_id, MakeReservationRequest $request)
    {
        $available = $this->fG->checkAvaiableReservations($room_id, $request);

        if (!$available) {
            if (!$request->ajax()) {
                $request->session()->flash('reservationMsg', __('There are no vacancies'));

                return redirect()->route('room', ['id' => $room_id, '#reservation']);
            }

            return response()->json(['reservation' => false]);
        }

        $reservation = $this->fG->makeReservation($room_id, $city_id, $request);
        event(new OrderPlacedEvent($reservation));

        if (!$request->ajax()) {
            return redirect()->route('adminHome');
        } else {
            return response()->json(['reservation' => $reservation]);
        }
    }
}

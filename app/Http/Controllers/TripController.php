<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TripController extends Controller
{

    /**
     * GET
     * /trip/search
     * Show the form to search for your trip
     */

    public function index()
    {
        return view('trip.index');
    }

    public function search(Request $request)
    {
        $destination = $request->session()->get('destination', '');
        $airfare = $request->session()->get('airfare', '');
        $airfareCurrency = $request->session()->get('airfareCurrency', '');
        $hotel = $request->session()->get('hotel', '');
        $hotelCurrency = $request->session()->get('hotelCurrency', '');
        $months = $request->session()->get('months', '');
        $saveRound = $request->session()->get('saveRound', null);

        return view('trip.search')->with([
            'destination' => $destination,
            'airfare' => $airfare,
            'airfareCurrency' => $airfareCurrency,
            'hotel' => $hotel,
            'hotelCurrency' => $hotelCurrency,
            'months' => $months,
            'saveRound' => $saveRound,

        ]);
    }

    /**
     * GET
     * /trip/search-process
     * Process the form to search for your trip
     */

    public function searchProcess(Request $request)
    {
        $request->validate([
            'destination' => 'required|alpha',
            'airfare' => 'required|numeric',
            'airfareCurrency' => 'required',
            'hotel' => 'required|numeric',
            'hotelCurrency' => 'required',
            'months' => 'required',
        ]);

        $destination = $request->input('destination', null);
        $airfare = $request->input('airfare', null);
        $airfareCurrency = $request->input('airfareCurrency', null);
        $hotel = $request->input('hotel', null);
        $hotelCurrency = $request->input('hotelCurrency', null);
        $months = $request->input('months', null);

        $saveRound = [];

        if ($destination) {
            if ($airfareCurrency == 'usd') {
                $airfareCon = 1;
            } else if ($airfareCurrency == 'gbp') {
                $airfareCon = 1.35;
            } else if ($airfareCurrency == 'eur') {
                $airfareCon = 1.12;
            }

            $airfareTotal = $airfare * $airfareCon;

            if ($hotelCurrency == 'usd') {
                $hotelCon = 1;
            } else if ($hotelCurrency == 'gbp') {
                $hotelCon = 1.35;
            } else if ($hotelCurrency == 'eur') {
                $hotelCon = 1.12;
            }

            $hotelTotal = $hotel * $hotelCon;
            $total = ($airfareTotal + $hotelTotal);

            if ($months == 'three') {
                $monthNumber = 3;
            } else if ($months == 'six') {
                $monthNumber = 6;
            } else if ($months == 'twelve') {
                $monthNumber = 12;
            } else if ($months == 'twentyfour') {
                $monthNumber = 24;
            }

            $save = $total / $monthNumber;
            $saveRound = round($save);
        }

        return redirect('/trip/search')->with([
            'destination' => $destination,
            'airfare' => $airfare,
            'airfareCurrency' => $airfareCurrency,
            'hotel' => $hotel,
            'hotelCurrency' => $hotelCurrency,
            'months' => $months,
            'saveRound' => $saveRound,

        ]);
    }
}



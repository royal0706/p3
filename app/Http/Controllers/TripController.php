<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{

    /**
     * GET
     * /trip/search
     * Show the form to search for your trip
     */

    public function search(Request $request)
    {
        $destination = $request->session()->get('destination', '');
        $airfare = $request->session()->get('airfare', '');
        $airfareCurrency = $request->session()->get('airfareCurrency', '');
        $hotel = $request->session()->get('hotel', '');
        $hotelCurrency = $request->session()->get('hotelCurrency', '');

        return view('trip.search')->with([
            'destination' => $destination,
            'airfare' => $airfare,
            'airfareCurrency' => $airfareCurrency,
            'hotel' => $hotel,
            'hotelCurrency' => $hotelCurrency,
        ]);
    }

    /**
     * GET
     * /trip/search-process
     * Process the form to search for a book
     */


    public function searchProcess(Request $request)
    {
        $request->validate([
            'destination'=> 'required',
            'airfare'=> 'required',
            'airfareCurrency' => 'required',
            'hotel' => 'required',
            'hotelCurrency' => 'required',
            'months' => 'required',
        ]);

        /* $airfare = $request->input('airfare', null);
        $airfareCurrency = $request->input('airfareCurrency', null);
        $hotel = $request->input('hotel', null);
        $hotelCurrency = $request->input('hotelCurrency', null); */

        # Code to process the form will go here...
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


# Redirect back to the search page w/ the searchTerm *and* searchResults (if any) stored in the session
# Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
    return redirect('/trip/search')->with([
        'destination' => $destination,
        'airfare' => $airfare,
        'airfareCurrency' => $airfareCurrency,
        'hotel' => $hotel,
        'hotelCurrency' => $hotelCurrency,
        'airfareCon'=> $airfareCon,
        'hotelCon' => $hotelCon,
        'hotelTotal' => $hotelTotal,
        'total' => $total,
        'months' => $month,
        'monthNumber' => $monthNumber,
        'save' => $save


        ]);
    }

}

{{-- /resources/views/trip/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Trip Jar
@endsection

@section('content')

    <h1>Trip Jar</h1>

    <img src='/images/traveljar.jpg' alt='Travel Jar'>

    <h2>Trip Saving Calculator</h2>
    <p>Calculate how much you need to save a month to make the trip of your dreams become a reality!</p>

    <form method='GET' action='/trip/search-process'>

        <label>Destination:</label>
        <input type='text' name='destination' id='destination' value='{{ old('destination') }}'>
        @include('includes.error-field', ['fieldName' => 'destination'])

        <label>Airfare Total:</label>
        <input type='number' name='airfare' id='airfare' value='{{ old('airfare') }}'>
        @include('includes.error-field', ['fieldName' => 'airfare'])

        <label>Currency</label>
        <select name='airfareCurrency'>
            <option value='usd' {{ (old('airfareCurrency') =='usd') ? 'selected' : ''}}>USD</option>
            <option value='gbp' {{ (old('airfareCurrency') =='gbp') ? 'selected' : ''}}>GBP</option>
            <option value='eur' {{ (old('airfareCurrency') =='eur') ? 'selected' : ''}}>EUR</option>
        </select>
        @include('includes.error-field', ['fieldName' => 'airfareCurrency'])

        <label>Hotel Total:</label>
        <input type='number' name='hotel' value='{{ old('hotel') }}'>
        @include('includes.error-field', ['fieldName' => 'hotel'])

        <label>Currency</label>
        <select name='hotelCurrency'>
            <option value='usd' {{ (old('hotelCurrency') =='usd') ? 'selected' : ''}}>USD</option>
            <option value='gbp' {{ (old('hotelCurrency') =='gbp') ? 'selected' : ''}} >GBP</option>
            <option value='eur' {{ (old('hotelCurrency') =='eur') ? 'selected' : ''}}>EUR</option>
        </select>
        @include('includes.error-field', ['fieldName' => 'hotelCurrency'])

        <label>How long do you have to save for your trip? </label>
        <ul class='radios'>
            <li><label><input type='radio'
                              name='months'
                              value='three'>Three Months</label>
            <li><label><input type='radio'
                              name='months'
                              value='six'>Six Months</label>
            <li><label><input type='radio'
                              name='months'
                              value='twelve'>One Year</label>
            <li><label><input type='radio'
                              name='months'
                              value='twentyfour'>Two Years</label>
        </ul>
        @include('includes.error-field', ['fieldName' => 'months'])


        <input type='submit' value='Start Saving' class='btn btn-primary'>
    </form>

    @if(count($errors) > 0)
        <div class='alert alert-danger'>Please fix the errors above.</div>

    @endif

    <p>{{ $destination }}</p>


@endsection
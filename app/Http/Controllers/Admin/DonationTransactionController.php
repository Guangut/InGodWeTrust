<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationTransactionRequest;
use App\Http\Requests\UpdateDonationTransactionRequest;
use App\Models\DonationTransaction;

class DonationTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDonationTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonationTransaction $donationTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonationTransaction $donationTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationTransactionRequest $request, DonationTransaction $donationTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonationTransaction $donationTransaction)
    {
        //
    }
}

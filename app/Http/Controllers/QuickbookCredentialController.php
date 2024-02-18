<?php

namespace App\Http\Controllers;

use App\Models\quickbook_credential;
use Illuminate\Support\Facades\Artisan;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Exception\ServiceException;
use Illuminate\Http\Request;

class QuickbookCredentialController extends Controller
{
    public function __construct()
    {

        $this->quickbook_credentials = new quickbook_credential();
    }

    public function createCustomer()
    {
        
    }



    /**
     * Show the form for creating a new resource.
     */
    public function user_auth_id()
    {
        $userAuth = auth()->user()->id;
        return ['userAuth', $userAuth];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(quickbook_credential $quickbook_credential)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(quickbook_credential $quickbook_credential)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, quickbook_credential $quickbook_credential)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(quickbook_credential $quickbook_credential)
    {
        //
    }
}

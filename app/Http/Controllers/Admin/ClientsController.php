<?php

namespace App\Http\Controllers\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientsRequest;
use App\Http\Requests\Admin\UpdateClientsRequest;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    protected $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    /**
     * Display a listing of Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('client_access')) {
            return abort(401);
        }

        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating new Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        return view('admin.clients.create')
                ->withResidences($this->client->lastPlaceOfResidence())
                ->withOptions(['Yes' => 'Yes', 'No' => 'No']);
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param  \App\Http\Requests\StoreClientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientsRequest $request)
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        $client = Client::create($request->all());

        Session::flash('flash_message','Client created successfully.');

        return redirect()->route('admin.clients.index');
    }


    /**
     * Show the form for editing Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);

        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update Client in storage.
     *
     * @param  \App\Http\Requests\UpdateClientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $client->update($request->all());

        Session::flash('flash_message','Client updated successfully.');


        return redirect()->route('admin.clients.index');
    }


    /**
     * Display Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('client_view')) {
            return abort(401);
        }
        $relations = [
            'appointments' => \App\Models\Appointment::where('client_id', $id)->get(),
        ];

        $client = Client::findOrFail($id);

        return view('admin.clients.show', compact('client') + $relations);
    }


    /**
     * Remove Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $client->delete();

        Session::flash('flash_message','Client deleted successfully.');


        return redirect()->route('admin.clients.index');
    }

    /**
     * Delete all selected Client at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Client::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}

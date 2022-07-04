<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5);
        // Retornar la vista
        return view('client.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Crear cliente
        return view('client.formulario');
    }

    /**Metodo para generar pdf */
     public function createPDF()
    {
        $clients = Client::paginate(5);
        view()->share('producto.pdf', $clients);
        $pdf = PDF::loadView('client.index', ['clients' => $clients]);
        return $pdf->download('producto.pdf');
    }
    
 /*   public function preview()
    {
        return view('preview');
    }
    public function generatePDF()
    {
        $pdf = PDF::loadView('client.index');
        return $pdf->download('demo.pdf');
    }
    */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar los datos
        $request->validate([
            'name' => 'required|max:15',
            'price' => 'required|gte:5'
        ]);

        $client = Client::create($request->only('sku', 'name', 'amount', 'price', 'description'));

        Session::flash('mensaje', 'Producto creado correctamente');


        return redirect()->route('client.index'); //Redireccionar a la ruta de index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        return view('client.formulario')
            ->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
        $request->validate([
            'name' => 'required|max:45',
            'price' => 'required|gte:5'
        ]);
        $client->sku = $request['sku'];
        $client->name = $request['name'];
        $client->amount = $request['amount'];
        $client->price = $request['price'];
        $client->description = $request['description'];
        $client->save();

        Session::flash('mensaje', 'Registro editado correctamente');


        return redirect()->route('client.index'); //Redireccionar a la ruta de index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        Session::flash('mensaje', 'Registro eliminado correctamente');
        return redirect()->route('client.index'); //Redireccionar a la ruta de index
    }
}

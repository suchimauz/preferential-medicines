<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medicament;
use App\Release;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medicaments = new Medicament();

        if($request->get('category_id')) {
            $medicaments = $medicaments->where('category_id', $request->get('category_id'));
        }

        if($request->get('exempt_id')) {
            $medicaments = $medicaments->where('exempt_id', $request->get('exempt_id'));
        }

        if($request->get('release_id')) {
            $medicaments = $medicaments->where('release_id', $request->get('release_id'));
        }

        if($request->get('search')) {
            $literals = explode(" ", $request->get('search'));
            foreach($literals as $literal) {
                $medicaments = $medicaments->where(DB::raw('concat(id, name)'), 'like', '%' . $literal . '%');
            }
        }

        return view('medicament.index', [
            'medicaments' => $medicaments->get(), 
            'categories' => Category::get(),
            'exempts' => Exempt::get(),
            'releases' => Release::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicament.create', [
            'categories' => Category::get(),
            'exempts' => Exempt::get(),
            'releases' => Release::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicament = Medicament::create(
            [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'exempt_id' => $request->exempt_id,
                'release_id' => $request->release_id,
            ]
        );
        
        if($medicament) {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('medicament.edit', [
            'categories' => Category::get(), 
            'exempts' => Exempt::get(),
            'releases' => Release::get(),
            'medicament' => Medicament::find($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medicament = Medicament::find($id);

        $medicament->name = $request->name;
        $medicament->category_id = $request->category_id;
        $medicament->exempt_id = $request->exempt_id;
        $medicament->release_id = $request->release_id;

        $medicament->save();

        return redirect('/medicament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicament::destroy($id);
    }
}

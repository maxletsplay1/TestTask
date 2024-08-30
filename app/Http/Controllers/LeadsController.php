<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Leads::with('status')->get();
        return view('dashboard', compact('leads'));
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
    public function store(Request $request)
    {
        $leads = Leads::create($request->all());
        return redirect()->back()->with('success', 'Ваша заявка отправлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($lead = Leads::find($id)) {
            return view('edit', compact('lead'));
        } else {
            return redirect()->route('leads.index')->with('error', 'Лид не найден');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($lead = Leads::find($id)) {
            $lead->update($request->all());
            return redirect()->route('leads.index')->with('success', 'Лид отредактирован');
        } else {
            return redirect()->route('leads.index')->with('error', 'Лид не найден');
        }
    }

    public function updateLeadStatus(Request $request, string $id)
    {
        $lead = Leads::findOrFail($id);
        $lead->update([
            'lead_status_id' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Ваша заявка отправлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($lead = Leads::find($id)) {
            $lead->delete();
            return redirect()->back()->with('success', 'Лид удален');
        } else {
            return redirect()->back()->with('error', 'Лид не найден');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SupporterController extends Controller
{
    public function index()
    {
        $supporters = Supporter::all();
        return Inertia::render('Admin/Supporters/Index', compact('supporters'));
    }

    public function create()
    {
        return Inertia::render('Admin/Supporters/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:supporters,email',
            'support_type' => 'required|string',
            'contribution_amount' => 'required|numeric',
            'commit_duration' => 'required|integer',
            'start_date' => 'required|date',
            'bank_details' => 'required|string',
            'testimonial_content' => 'nullable|string',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload if available
        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('uploads/supporters/photos', 'public');
            $data['photo_url'] = Storage::url($data['photo_url']);
        }

        Supporter::create($data);
        return redirect()->route('admin.supporters.index')->with('success', 'Supporter created successfully.');
    }

    public function show(Supporter $supporter)
    {
        return Inertia::render('Admin/Supporters/Show', compact('supporter'));
    }

    public function edit(Supporter $supporter)
    {
        return Inertia::render('Admin/Supporters/Edit', compact('supporter'));
    }

    public function update(Request $request, Supporter $supporter)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:supporters,email,' . $supporter->id,
            'support_type' => 'required|string',
            'contribution_amount' => 'required|numeric',
            'commit_duration' => 'required|integer',
            'start_date' => 'required|date',
            'bank_details' => 'required|string',
            'testimonial_content' => 'nullable|string',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // If a new photo is uploaded, store it
        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('uploads/supporters/photos', 'public');
            $data['photo_url'] = Storage::url($data['photo_url']);
        }

        $supporter->update($data);
        return redirect()->route('admin.supporters.index')->with('success', 'Supporter updated successfully.');
    }

    public function destroy(Supporter $supporter)
    {
        $supporter->delete();

        return redirect()->route('supporters.index')->with('success', 'Supporter deleted successfully.');

    }

    // Export supporters to CSV
    public function export(): StreamedResponse
    {
        $fileName = 'supporters_export_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $columns = ['ID', 'Name', 'Age', 'Gender', 'Email', 'Support Type', 'Contribution Amount', 'Start Date'];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            Supporter::chunk(200, function ($supporters) use ($file) {
                foreach ($supporters as $supporter) {
                    fputcsv($file, [
                        $supporter->id,
                        $supporter->name,
                        $supporter->age,
                        $supporter->gender,
                        $supporter->email,
                        $supporter->support_type,
                        $supporter->contribution_amount,
                        $supporter->start_date,
                    ]);
                }
            });

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // (Optional) Print view – could render a simplified HTML page for printing
    public function print()
    {
        $supporters = Supporter::all();
        return view('admin.supporters.print', compact('supporters'));
    }
}

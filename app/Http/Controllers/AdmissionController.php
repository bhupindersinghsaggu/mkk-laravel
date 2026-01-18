<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdmissionEnquiryMail;

class AdmissionController extends Controller
{
    /**
     * Show admission enquiries (Admin + Staff)
     */
    public function index()
    {
        $admissions = Admission::latest()->paginate(10);

        $isAdmin = auth()->user()->role === 'admin';

        return view('dashboard.admissions', compact('admissions', 'isAdmin'));
    }


    /**
     * Store admission enquiry (Public form)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'class' => 'required|string|max:50',
            'source' => 'nullable|string|max:100',
            'message' => 'nullable|string',
            'g-recaptcha-response' => 'required',
        ]);

        /* ===============================
       🔐 VERIFY reCAPTCHA (SAFE)
    =============================== */

        $secret = env('RECAPTCHA_SECRET_KEY');

        $verifyResponse = @file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify?secret=' .
                $secret .
                '&response=' . $request->input('g-recaptcha-response')
        );

        if (!$verifyResponse) {
            return back()->withErrors([
                'g-recaptcha-response' => 'reCAPTCHA service not reachable.'
            ])->withInput();
        }

        $response = json_decode($verifyResponse, true);

        if (!($response['success'] ?? false)) {
            return back()->withErrors([
                'g-recaptcha-response' => 'reCAPTCHA verification failed.'
            ])->withInput();
        }

        /* ===============================
       ✅ SAVE ENQUIRY
    =============================== */

        $admission = Admission::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'class' => $request->class,
            'source' => $request->source,
            'message' => $request->message,
            'status' => 'new',
        ]);

        /* ===============================
       📧 EMAIL ADMIN (NON-BLOCKING)
    =============================== */

        try {
            Mail::to(env('ADMIN_EMAIL'))
                ->send(new AdmissionEnquiryMail($admission));
        } catch (\Throwable $e) {
            // do nothing (important)
        }
        return back()->with('success', 'Thank you! Our counsellor will contact you soon.');
    }


    /**
     * Update status (Admin only)
     */
    public function updateStatus(Request $request, Admission $admission)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,admitted',
        ]);

        $admission->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status updated successfully.');
    }

    /**
     * Delete enquiry (Admin only)
     */
    public function destroy(Admission $admission)
    {
        $admission->delete();

        return back()->with('success', 'Enquiry deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

// ContactController handles both displaying the contact form (GET)
// and processing the submitted form data (POST).

class ContactController extends Controller
{
    /**
     * Show the Contact page with the form.
     * Route: GET /contact
     */
    public function index()
    {
        $faqs = [
            [
                'question' => 'How can I become a BlogHub author?',
                'answer'   => 'Send us a message via this form with the subject "Become an Author". Include a sample article or portfolio link and we will get back to you within 48 hours.',
            ],
            [
                'question' => 'Can I republish BlogHub articles on my site?',
                'answer'   => 'All content on BlogHub is copyrighted. You may quote short excerpts with a link back to the original article, but full republishing requires written permission.',
            ],
            [
                'question' => 'How do I report a factual error in an article?',
                'answer'   => 'Use this contact form and select the subject "Report an Error". Include the article URL and the correction. We review all reports within 24 hours.',
            ],
            [
                'question' => 'Do you accept sponsored content or paid placements?',
                'answer'   => 'We do not accept paid articles or sponsored placements. All content on BlogHub is written by our verified authors with no commercial influence.',
            ],
        ];

        return view('contact', compact('faqs'));
    }

    /**
     * Handle the contact form submission.
     * Route: POST /contact
     *
     * Laravel's validate() method:
     *  - If validation PASSES → code continues below
     *  - If validation FAILS  → automatically redirects back with $errors bag
     */
    public function store(Request $request)
    {
        // Step 1: Validate the incoming form data
        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|min:3|max:200',
            'message' => 'required|string|min:10|max:2000',
        ]);

        // Step 2: Save the validated data to the contacts table
        // Contact::create() uses the $fillable array in the model for safety
        Contact::create($validated);

        // Step 3: Redirect back to the contact page with a success flash message
        // with() stores a one-time message in the session
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully! We will get back to you within 48 hours.');
    }
}

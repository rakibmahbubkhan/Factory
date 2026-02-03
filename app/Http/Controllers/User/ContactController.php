<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;

class ContactController extends Controller
{
    //

    public function index()
    {
        $contacts = Contact::all();
        $company = Company::first();
        $company->phone = json_decode($company->phone, true);
        return view('Contact.contact', compact('contacts','company'));
    }

    public function contact()
    {
        $contacts = Contact::all();
        return view('Admin.pages.contacts.index', compact('contacts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        // Send the email
        Mail::send([], [], function ($message) use ($contact) {
            $message->to('rakibmahbubkhan@gmail.com')
                ->subject($contact->subject)
                ->from($contact->email, $contact->name)
                ->setBody(new HtmlString(nl2br(e($contact->message))), 'text/html');
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

//    public function index()
//    {
//        $contacts = Contact::all();
//        return view('contacts.index', compact('contacts'));
//    }

    public function updateStatus(Contact $contact)
    {
        $contact->is_replied = !$contact->is_replied;
        $contact->save();

        return redirect()->back()->with('success', 'Contact status updated.');
    }

//    public function reply(Contact $contact, Request $request)
//    {
//
//
//        return redirect()->back()->with('success', 'Reply sent successfully.');
//    }

//    public function reply(Request $request, $contactId)
//    {
//        $contact = Contact::find($contactId);
//
//        $request->validate([
//            'reply_message' => 'required|string',
//        ]);
//
//        // Send reply email
//        Mail::send([], [], function ($message) use ($contact, $request) {
//            $message->to($contact->email)
//                ->subject('Re: ' . $contact->subject)
//                ->from('rakibmahbubkhan@gmail.com', 'Mahbub Engineering')
//                ->setBody($request->reply_message);
//        });
//
//        $contact->is_replied = true;
//        $contact->save();
//
//        return redirect()->route('Admin.contacts')->with('success', 'Reply sent successfully.');
//    }

    public function reply(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        try {
            // Find the contact message by ID
            $contact = Contact::findOrFail($id);

            // Update the reply and status in the database
            $contact->reply_message = $request->input('reply_message');
            $contact->status = 'replied';
            $contact->save();

            // Send the reply message via email
            Mail::send([], [], function ($message) use ($contact) {
                $message->to($contact->email)
                    ->from('rakibmahbubkhan@gmail.com', 'Your Company Name') // Your email and name
                    ->subject('Reply to your message')
                    ->setBody($contact->reply_message, 'text/plain'); // Send as plain text
            });

            // Redirect back with a success message
            return redirect()->route('Admin.contacts')->with('success', 'Reply sent and saved successfully.');
        } catch (\Exception $e) {
            Log::error('Error sending reply: ' . $e->getMessage());
            return redirect()->route('Admin.contacts')->with('error', 'There was an error sending the reply. Please try again.');
        }
    }


    public function replyForm($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        return view('Admin.pages.contacts.replyForm', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('Admin.contacts')->with('success', 'Contact deleted successfully.');
    }

}

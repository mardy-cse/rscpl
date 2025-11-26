<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ContactService;

class ContactController extends AdminController
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        parent::__construct();
        $this->contactService = $contactService;
    }

    public function index(): View
    {
        $contacts = $this->contactService->getAllPaginated(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact): View
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        return $this->handleDelete(
            fn() => $this->contactService->delete($contact),
            'contact',
            'admin.contacts.index',
            ['contact_id' => $contact->id]
        );
    }
}

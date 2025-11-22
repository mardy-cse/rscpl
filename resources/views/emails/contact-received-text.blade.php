New Contact Form Submission
================================

You have received a new message from your website contact form.

Name: {{ $contact->name }}

Email: {{ $contact->email }}

@if($contact->phone)
Phone: {{ $contact->phone }}

@endif
@if($contact->subject)
Subject: {{ $contact->subject }}

@endif
Message:
{{ $contact->message }}

Submitted: {{ $contact->created_at->format('d M Y, h:i A') }}

---
This email was sent from the contact form on your website.
Roller Shutter & Construction Pte. Ltd.
66 Tannery Lane #01-03D, Singapore 347805

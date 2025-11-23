@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.contacts.index') }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Contact Submissions
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Contact Submission Details</h1>
            </div>

            <div class="p-6">
                <div class="space-y-6">
                    <!-- Name -->
                    <div class="border-b border-gray-200 pb-4">
                        <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                            Name
                        </label>
                        <p class="text-lg text-gray-900">{{ $contact->name }}</p>
                    </div>

                    <!-- Email -->
                    <div class="border-b border-gray-200 pb-4">
                        <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                            Email
                        </label>
                        <p class="text-lg text-gray-900">
                            <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-800">
                                {{ $contact->email }}
                            </a>
                        </p>
                    </div>

                    <!-- Phone -->
                    <div class="border-b border-gray-200 pb-4">
                        <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                            Phone
                        </label>
                        <p class="text-lg text-gray-900">
                            <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-800">
                                {{ $contact->phone }}
                            </a>
                        </p>
                    </div>

                    <!-- Subject -->
                    <div class="border-b border-gray-200 pb-4">
                        <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                            Subject
                        </label>
                        <p class="text-lg text-gray-900">{{ $contact->subject }}</p>
                    </div>

                    <!-- Message -->
                    <div class="border-b border-gray-200 pb-4">
                        <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                            Message
                        </label>
                        <div class="mt-2 text-gray-900 whitespace-pre-wrap bg-gray-50 p-4 rounded-lg">{{ $contact->message }}</div>
                    </div>

                    <!-- Date -->
                    <div class="pb-4">
                        <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                            Submitted On
                        </label>
                        <p class="text-lg text-gray-900">
                            {{ $contact->created_at->format('F d, Y') }} at {{ $contact->created_at->format('h:i A') }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            ({{ $contact->created_at->diffForHumans() }})
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('admin.contacts.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to List
                    </a>

                    <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this contact submission? This action cannot be undone.');"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Submission
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

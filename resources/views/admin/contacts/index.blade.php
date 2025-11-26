@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Contact Submissions</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Desktop Table View --}}
    <div class="hidden md:block bg-white rounded-lg shadow-md overflow-hidden">
        @if($contacts->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Phone
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $contact->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $contact->phone }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ Str::limit($contact->subject, 30) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $contact->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $contact->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" 
                                           class="text-blue-600 hover:text-blue-900">
                                            View
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this contact submission?');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $contacts->links() }}
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No contact submissions</h3>
                <p class="mt-1 text-sm text-gray-500">No contact submissions have been received yet.</p>
            </div>
        @endif
    </div>

    {{-- Mobile Card View --}}
    <div class="md:hidden space-y-4">
        @if($contacts->count() > 0)
            @foreach($contacts as $contact)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $contact->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    <i class="fas fa-envelope mr-1"></i>{{ $contact->email }}
                                </p>
                                @if($contact->phone)
                                    <p class="text-sm text-gray-600 mt-1">
                                        <i class="fas fa-phone mr-1"></i>{{ $contact->phone }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="text-sm font-medium text-gray-500">SUBJECT</p>
                            <p class="text-sm text-gray-900 mt-1">{{ $contact->subject }}</p>
                        </div>

                        <div class="text-xs text-gray-500 mb-3">
                            <i class="far fa-clock mr-1"></i>
                            {{ $contact->created_at->format('M d, Y') }} at {{ $contact->created_at->format('h:i A') }}
                        </div>

                        <div class="flex gap-3 pt-3 border-t border-gray-200">
                            <a href="{{ route('admin.contacts.show', $contact) }}" 
                               class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center font-semibold">
                                <i class="fas fa-eye mr-2"></i>
                                <span>View</span>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                                  method="POST" 
                                  class="flex-1"
                                  onsubmit="return confirm('Are you sure you want to delete this contact submission?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-600 hover:bg-red-700 text-white py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center font-semibold">
                                    <i class="fas fa-trash mr-2"></i>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg p-8 text-center text-gray-500">
                <i class="fas fa-envelope-open text-4xl mb-2"></i>
                <p class="text-lg">No contact submissions</p>
                <p class="text-sm mt-1">No contact submissions have been received yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Manage Policies')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        <i class="fas fa-file-contract mr-2 text-primary-600"></i>
        Manage Policies
    </h1>
</div>

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Policy Type
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Last Updated
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($policies as $policy)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $policy->type === 'privacy_policy' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                            <i class="fas {{ $policy->type === 'privacy_policy' ? 'fa-shield-alt' : 'fa-gavel' }} mr-2"></i>
                            {{ $policy->type === 'privacy_policy' ? 'Privacy Policy' : 'Terms of Service' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $policy->title }}</div>
                        <div class="text-sm text-gray-500">{{ $policy->slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <i class="far fa-calendar-alt mr-1"></i>
                        {{ $policy->updated_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                        <a href="{{ route('admin.policies.edit', $policy->id) }}" 
                           class="inline-flex items-center text-primary-600 hover:text-primary-900 transition duration-150">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>
                        <a href="{{ $policy->type === 'privacy_policy' ? route('privacy-policy') : route('terms-of-service') }}" 
                           target="_blank"
                           class="inline-flex items-center text-green-600 hover:text-green-900 transition duration-150">
                            <i class="fas fa-external-link-alt mr-1"></i>
                            View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <i class="fas fa-file-contract text-gray-300 text-5xl mb-4"></i>
                        <p class="text-gray-500 text-lg">No policies found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Info Box -->
<div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
    <div class="flex items-start">
        <i class="fas fa-info-circle text-blue-500 mr-3 mt-1"></i>
        <div>
            <p class="text-sm text-gray-700">
                <strong>Note:</strong> These policies are displayed on your website. 
                Click "Edit" to update the content using the rich text editor. 
                Changes will be visible immediately on the frontend.
            </p>
        </div>
    </div>
</div>
@endsection

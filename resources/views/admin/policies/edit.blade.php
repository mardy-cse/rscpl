@extends('layouts.admin')

@section('title', 'Edit ' . $policy->title)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        <i class="fas fa-edit mr-2 text-primary-600"></i>
        Edit {{ $policy->title }}
    </h1>
    <a href="{{ route('admin.policies.index') }}" 
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200 inline-flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Policies
    </a>
</div>

@if($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <p class="font-bold">Please fix the following errors:</p>
        </div>
        <ul class="list-disc list-inside ml-6">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('admin.policies.update', $policy->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Policy Type Badge -->
        <div class="mb-6">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                {{ $policy->type === 'privacy_policy' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                <i class="fas {{ $policy->type === 'privacy_policy' ? 'fa-shield-alt' : 'fa-gavel' }} mr-2"></i>
                {{ $policy->type === 'privacy_policy' ? 'Privacy Policy' : 'Terms of Service' }}
            </span>
        </div>

        <!-- Title -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-heading text-primary-600 mr-1"></i>
                Page Title
            </label>
            <input type="text" 
                   name="title" 
                   id="title" 
                   value="{{ old('title', $policy->title) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('title') border-red-500 @enderror"
                   required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-file-alt text-primary-600 mr-1"></i>
                Content
            </label>
            <textarea name="content" 
                      id="content" 
                      rows="20"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('content') border-red-500 @enderror"
                      required>{{ old('content', $policy->content) }}</textarea>
            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-sm text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                You can use HTML tags for formatting (h2, h3, p, ul, li, strong, em, etc.)
            </p>
        </div>

        <!-- Preview Link -->
        <div class="mb-6 bg-gray-50 border border-gray-200 rounded-lg p-4">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-eye text-primary-600 mr-1"></i>
                Preview on Website
            </h3>
            <a href="{{ $policy->type === 'privacy_policy' ? route('privacy-policy') : route('terms-of-service') }}" 
               target="_blank"
               class="text-primary-600 hover:text-primary-800 underline text-sm">
                {{ $policy->type === 'privacy_policy' ? route('privacy-policy') : route('terms-of-service') }}
                <i class="fas fa-external-link-alt ml-1 text-xs"></i>
            </a>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 shadow-md hover:shadow-lg inline-flex items-center">
                <i class="fas fa-save mr-2"></i>
                Update Policy
            </button>
            <a href="{{ route('admin.policies.index') }}" 
               class="text-gray-600 hover:text-gray-800 font-medium transition duration-200">
                Cancel
            </a>
        </div>
    </form>
</div>

<!-- HTML Formatting Guide -->
<div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
    <h3 class="text-sm font-semibold text-gray-800 mb-3">
        <i class="fas fa-code text-blue-600 mr-1"></i>
        HTML Formatting Guide
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm text-gray-700">
        <div>
            <code class="bg-white px-2 py-1 rounded">&lt;h2&gt;Heading 2&lt;/h2&gt;</code> - Main heading
        </div>
        <div>
            <code class="bg-white px-2 py-1 rounded">&lt;h3&gt;Heading 3&lt;/h3&gt;</code> - Subheading
        </div>
        <div>
            <code class="bg-white px-2 py-1 rounded">&lt;p&gt;Paragraph&lt;/p&gt;</code> - Paragraph text
        </div>
        <div>
            <code class="bg-white px-2 py-1 rounded">&lt;strong&gt;Bold&lt;/strong&gt;</code> - Bold text
        </div>
        <div>
            <code class="bg-white px-2 py-1 rounded">&lt;ul&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ul&gt;</code> - Bullet list
        </div>
        <div>
            <code class="bg-white px-2 py-1 rounded">&lt;br&gt;</code> - Line break
        </div>
    </div>
</div>
@endsection

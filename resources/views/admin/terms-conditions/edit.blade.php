@extends('layouts.admin')

@section('title', 'Edit Terms & Conditions')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Terms & Conditions</h1>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.terms-conditions.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Content
                    </label>
                    <textarea 
                        name="content" 
                        id="content" 
                        rows="20" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 @error('content') border-red-500 @enderror"
                        required>{{ old('content', $terms->content ?? '') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-2">
                        <i class="fas fa-info-circle"></i> You can use HTML tags for formatting (h2, h3, p, ul, li, strong, em, etc.)
                    </p>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-lightbulb text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                <strong>HTML Formatting Tips:</strong><br>
                                • Use &lt;h2&gt; and &lt;h3&gt; for headings<br>
                                • Use &lt;p&gt; for paragraphs<br>
                                • Use &lt;ul&gt; and &lt;li&gt; for bullet lists<br>
                                • Use &lt;strong&gt; for bold text<br>
                                • Use &lt;em&gt; for italic text
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                    </a>
                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-md transition">
                        <i class="fas fa-save mr-2"></i>Update Terms & Conditions
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">
                <i class="fas fa-eye mr-2"></i>Public Preview
            </h2>
            <div class="prose max-w-none">
                {!! $terms->content ?? '' !!}
            </div>
        </div>
    </div>
</div>
@endsection

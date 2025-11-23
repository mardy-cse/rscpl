@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Service</h1>
        <p class="text-gray-600">Update service information</p>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Service Title <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title', $service->title) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('title') border-red-500 @enderror"
                       placeholder="Enter service title (e.g., Web Development)"
                       required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Short Description <span class="text-red-500">*</span>
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="3"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('description') border-red-500 @enderror"
                          placeholder="Brief description for homepage..."
                          required>{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Details Field -->
            <div class="mb-6">
                <label for="details" class="block text-sm font-semibold text-gray-700 mb-2">
                    Detailed Description
                </label>
                <textarea name="details" 
                          id="details" 
                          rows="5"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('details') border-red-500 @enderror"
                          placeholder="Full description for service page...">{{ old('details', $service->details) }}</textarea>
                @error('details')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Icon Field -->
            <div class="mb-6">
                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                    Icon Class
                </label>
                <div class="flex items-center space-x-3">
                    @if($service->icon)
                    <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class="{{ $service->icon }} text-2xl text-blue-600"></i>
                    </div>
                    @endif
                    <input type="text" 
                           name="icon" 
                           id="icon" 
                           value="{{ old('icon', $service->icon) }}"
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('icon') border-red-500 @enderror"
                           placeholder="e.g., fas fa-tools, fas fa-shield-alt">
                </div>
                <p class="mt-2 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Use FontAwesome class names. Visit <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600 hover:underline">fontawesome.com/icons</a> for reference.
                </p>
                @error('icon')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                    Service Image
                </label>
                @if($service->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover rounded-lg">
                        <p class="mt-2 text-xs text-gray-600">Current image (upload new to replace)</p>
                    </div>
                @endif
                <input type="file" 
                       name="image" 
                       id="image" 
                       accept="image/*"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('image') border-red-500 @enderror">
                <p class="mt-2 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Upload a high-quality image (JPEG, PNG, WebP). Max 2MB.
                </p>
                @error('image')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Features Field -->
            <div class="mb-6">
                <label for="features" class="block text-sm font-semibold text-gray-700 mb-2">
                    Key Features
                </label>
                <textarea name="features" 
                          id="features" 
                          rows="6"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('features') border-red-500 @enderror"
                          placeholder="Enter each feature on a new line&#10;Heavy-duty construction&#10;Weather-resistant coating&#10;Custom sizes available">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
                <p class="mt-2 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Enter one feature per line. Each line will appear as a bullet point.
                </p>
                @error('features')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Order Field -->
            <div class="mb-6">
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">
                    Display Order <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       name="order" 
                       id="order" 
                       value="{{ old('order', $service->order) }}"
                       min="0"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('order') border-red-500 @enderror"
                       placeholder="0"
                       required>
                <p class="mt-2 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Lower numbers appear first. Use 0, 1, 2, etc.
                </p>
                @error('order')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Is Active Checkbox -->
            <div class="mb-8">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" 
                           name="is_active" 
                           id="is_active" 
                           value="1"
                           {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <span class="ml-3 text-sm font-semibold text-gray-700">
                        Active (Display on website)
                    </span>
                </label>
                <p class="mt-2 ml-8 text-xs text-gray-500">
                    Uncheck to hide this service from the public website
                </p>
                @error('is_active')
                    <p class="mt-2 ml-8 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.services.index') }}" 
                   class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-200 ease-in-out">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                    <i class="fas fa-save mr-2"></i>Update Service
                </button>
            </div>
        </form>

        <!-- Additional Info -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="flex items-center justify-between text-sm text-gray-500">
                <div>
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Created: {{ $service->created_at->format('M d, Y') }}
                </div>
                <div>
                    <i class="fas fa-clock mr-1"></i>
                    Last Updated: {{ $service->updated_at->format('M d, Y') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

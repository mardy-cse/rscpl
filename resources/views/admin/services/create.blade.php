@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Service</h1>
        <p class="text-gray-600">Add a new service to showcase your offerings</p>
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
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Service Title <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title') }}"
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
                          required>{{ old('description') }}</textarea>
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
                          placeholder="Full description for service page...">{{ old('details') }}</textarea>
                @error('details')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Icon Field -->
            <div class="mb-6">
                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                    Service Icon <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <select name="icon" 
                                id="icon" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('icon') border-red-500 @enderror"
                                required
                                onchange="updateIconPreview(this.value)">
                            <option value="">-- Select Icon --</option>
                            <optgroup label="🏗️ Construction & Building">
                                <option value="fas fa-building" {{ old('icon') == 'fas fa-building' ? 'selected' : '' }}>Building</option>
                                <option value="fas fa-home" {{ old('icon') == 'fas fa-home' ? 'selected' : '' }}>Home</option>
                                <option value="fas fa-hammer" {{ old('icon') == 'fas fa-hammer' ? 'selected' : '' }}>Hammer</option>
                                <option value="fas fa-tools" {{ old('icon') == 'fas fa-tools' ? 'selected' : '' }}>Tools</option>
                                <option value="fas fa-wrench" {{ old('icon') == 'fas fa-wrench' ? 'selected' : '' }}>Wrench</option>
                                <option value="fas fa-screwdriver" {{ old('icon') == 'fas fa-screwdriver' ? 'selected' : '' }}>Screwdriver</option>
                                <option value="fas fa-hard-hat" {{ old('icon') == 'fas fa-hard-hat' ? 'selected' : '' }}>Hard Hat</option>
                                <option value="fas fa-paint-roller" {{ old('icon') == 'fas fa-paint-roller' ? 'selected' : '' }}>Paint Roller</option>
                            </optgroup>
                            <optgroup label="🔒 Security & Safety">
                                <option value="fas fa-shield-alt" {{ old('icon') == 'fas fa-shield-alt' ? 'selected' : '' }}>Shield</option>
                                <option value="fas fa-lock" {{ old('icon') == 'fas fa-lock' ? 'selected' : '' }}>Lock</option>
                                <option value="fas fa-key" {{ old('icon') == 'fas fa-key' ? 'selected' : '' }}>Key</option>
                                <option value="fas fa-user-shield" {{ old('icon') == 'fas fa-user-shield' ? 'selected' : '' }}>User Shield</option>
                                <option value="fas fa-eye" {{ old('icon') == 'fas fa-eye' ? 'selected' : '' }}>Eye (CCTV)</option>
                                <option value="fas fa-video" {{ old('icon') == 'fas fa-video' ? 'selected' : '' }}>Video Camera</option>
                            </optgroup>
                            <optgroup label="🚪 Doors & Gates">
                                <option value="fas fa-door-open" {{ old('icon') == 'fas fa-door-open' ? 'selected' : '' }}>Door Open</option>
                                <option value="fas fa-door-closed" {{ old('icon') == 'fas fa-door-closed' ? 'selected' : '' }}>Door Closed</option>
                                <option value="fas fa-warehouse" {{ old('icon') == 'fas fa-warehouse' ? 'selected' : '' }}>Warehouse</option>
                                <option value="fas fa-dungeon" {{ old('icon') == 'fas fa-dungeon' ? 'selected' : '' }}>Gate</option>
                            </optgroup>
                            <optgroup label="⚙️ Mechanical & Industrial">
                                <option value="fas fa-cog" {{ old('icon') == 'fas fa-cog' ? 'selected' : '' }}>Cog/Gear</option>
                                <option value="fas fa-cogs" {{ old('icon') == 'fas fa-cogs' ? 'selected' : '' }}>Cogs/Gears</option>
                                <option value="fas fa-industry" {{ old('icon') == 'fas fa-industry' ? 'selected' : '' }}>Industry</option>
                                <option value="fas fa-bolt" {{ old('icon') == 'fas fa-bolt' ? 'selected' : '' }}>Bolt/Power</option>
                            </optgroup>
                            <optgroup label="📋 Services & Quality">
                                <option value="fas fa-check-circle" {{ old('icon') == 'fas fa-check-circle' ? 'selected' : '' }}>Check Circle</option>
                                <option value="fas fa-certificate" {{ old('icon') == 'fas fa-certificate' ? 'selected' : '' }}>Certificate</option>
                                <option value="fas fa-award" {{ old('icon') == 'fas fa-award' ? 'selected' : '' }}>Award</option>
                                <option value="fas fa-medal" {{ old('icon') == 'fas fa-medal' ? 'selected' : '' }}>Medal</option>
                                <option value="fas fa-star" {{ old('icon') == 'fas fa-star' ? 'selected' : '' }}>Star</option>
                                <option value="fas fa-clipboard-check" {{ old('icon') == 'fas fa-clipboard-check' ? 'selected' : '' }}>Clipboard Check</option>
                            </optgroup>
                            <optgroup label="🔧 Maintenance & Repair">
                                <option value="fas fa-toolbox" {{ old('icon') == 'fas fa-toolbox' ? 'selected' : '' }}>Toolbox</option>
                                <option value="fas fa-truck" {{ old('icon') == 'fas fa-truck' ? 'selected' : '' }}>Truck</option>
                                <option value="fas fa-box-open" {{ old('icon') == 'fas fa-box-open' ? 'selected' : '' }}>Box Open</option>
                                <option value="fas fa-boxes" {{ old('icon') == 'fas fa-boxes' ? 'selected' : '' }}>Boxes</option>
                            </optgroup>
                            <optgroup label="🏢 Commercial">
                                <option value="fas fa-store" {{ old('icon') == 'fas fa-store' ? 'selected' : '' }}>Store</option>
                                <option value="fas fa-city" {{ old('icon') == 'fas fa-city' ? 'selected' : '' }}>City</option>
                                <option value="fas fa-briefcase" {{ old('icon') == 'fas fa-briefcase' ? 'selected' : '' }}>Briefcase</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-blue-50 border-2 border-blue-200 rounded-lg flex items-center justify-center">
                            <i id="icon-preview" class="text-3xl text-blue-600"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Select an icon that best represents your service. Preview shown on the right.
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
                          placeholder="Enter each feature on a new line&#10;Heavy-duty construction&#10;Weather-resistant coating&#10;Custom sizes available">{{ old('features') }}</textarea>
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
                       value="{{ old('order', 0) }}"
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
                           {{ old('is_active', true) ? 'checked' : '' }}
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
                    <i class="fas fa-save mr-2"></i>Create Service
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    #icon option {
        padding: 10px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Update icon preview
    function updateIconPreview(iconClass) {
        const preview = document.getElementById('icon-preview');
        preview.className = iconClass + ' text-3xl text-blue-600';
    }

    // Set initial preview if icon is selected
    document.addEventListener('DOMContentLoaded', function() {
        const iconSelect = document.getElementById('icon');
        if (iconSelect.value) {
            updateIconPreview(iconSelect.value);
        }
    });
</script>
@endpush

@endsection

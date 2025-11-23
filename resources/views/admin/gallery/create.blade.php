@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Add New Gallery Image</h1>
            <a href="{{ route('admin.gallery.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                Back to Gallery
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image Upload -->
                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-semibold mb-2">
                        Image <span class="text-red-600">*</span>
                    </label>
                    <input type="file" 
                           name="image" 
                           id="image" 
                           accept=".jpeg,.jpg,.png,.webp"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror"
                           required>
                    <p class="text-sm text-gray-500 mt-2">Accepted formats: JPEG, JPG, PNG, WEBP (Max: 2MB)</p>
                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Preview -->
                <div class="mb-6" id="imagePreviewContainer" style="display: none;">
                    <label class="block text-gray-700 font-semibold mb-2">Preview</label>
                    <img id="imagePreview" src="" alt="Preview" class="max-w-full h-64 object-cover rounded-lg border border-gray-300">
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">
                        Title
                    </label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                           placeholder="Enter image title (optional)">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-6">
                    <label for="category" class="block text-gray-700 font-semibold mb-2">
                        Category <span class="text-red-600">*</span>
                    </label>
                    <select name="category" 
                            id="category" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category') border-red-500 @enderror"
                            required>
                        <option value="">Select Category</option>
                        <option value="Commercial" {{ old('category') === 'Commercial' ? 'selected' : '' }}>Commercial</option>
                        <option value="Industrial" {{ old('category') === 'Industrial' ? 'selected' : '' }}>Industrial</option>
                        <option value="Residential" {{ old('category') === 'Residential' ? 'selected' : '' }}>Residential</option>
                    </select>
                    @error('category')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div class="mb-6">
                    <label for="order" class="block text-gray-700 font-semibold mb-2">
                        Display Order <span class="text-red-600">*</span>
                    </label>
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="{{ old('order', 0) }}"
                           min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('order') border-red-500 @enderror"
                           required>
                    <p class="text-sm text-gray-500 mt-2">Lower numbers appear first</p>
                    @error('order')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                        Add Image
                    </button>
                    <a href="{{ route('admin.gallery.index') }}" 
                       class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection

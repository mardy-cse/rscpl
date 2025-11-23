@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Gallery Images</h1>
        <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
            Add New Image
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($galleryImages->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($galleryImages as $image)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative aspect-square">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             alt="{{ $image->title ?? 'Gallery Image' }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-2 right-2">
                            @if($image->category === 'Commercial')
                                <span class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">Commercial</span>
                            @elseif($image->category === 'Industrial')
                                <span class="bg-gray-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">Industrial</span>
                            @elseif($image->category === 'Residential')
                                <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">Residential</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 text-lg mb-2 truncate">
                            {{ $image->title ?? 'Untitled' }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-4">Order: {{ $image->order }}</p>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $image->id) }}" 
                               class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center font-semibold py-2 px-4 rounded transition duration-300">
                                Edit
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $image->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this image?');"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $galleryImages->links() }}
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">No Images Found</h3>
            <p class="text-gray-600 mb-6">Get started by adding your first gallery image.</p>
            <a href="{{ route('admin.gallery.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                Add New Image
            </a>
        </div>
    @endif
</div>
@endsection

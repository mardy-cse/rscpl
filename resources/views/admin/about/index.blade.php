@extends('layouts.admin')

@section('title', 'About Us Content')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">About Us Content Management</h1>
        <p class="text-gray-600">Update the content displayed on the About Us page</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($contents->isNotEmpty())
        <form action="{{ route('admin.about.update-all') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                @foreach($contents as $content)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-blue-900 text-white px-6 py-4">
                        <h2 class="text-xl font-semibold flex items-center">
                            @if($content->section_key == 'hero')
                                <i class="fas fa-home mr-2"></i>Who We Are
                            @elseif($content->section_key == 'mission')
                                <i class="fas fa-bullseye mr-2"></i>Our Mission
                            @elseif($content->section_key == 'vision')
                                <i class="fas fa-eye mr-2"></i>Our Vision
                            @endif
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <input type="hidden" name="sections[{{ $content->id }}][id]" value="{{ $content->id }}">
                        <input type="hidden" name="sections[{{ $content->id }}][section_key]" value="{{ $content->section_key }}">

                        <div class="grid grid-cols-1 {{ $content->section_key == 'hero' ? 'lg:grid-cols-3' : 'lg:grid-cols-1' }} gap-6">
                            <div class="{{ $content->section_key == 'hero' ? 'lg:col-span-2' : '' }}">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('sections.'.$content->id.'.title') border-red-500 @enderror" 
                                           name="sections[{{ $content->id }}][title]" 
                                           value="{{ old('sections.'.$content->id.'.title', $content->title) }}"
                                           required>
                                    @error('sections.'.$content->id.'.title')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if($content->section_key == 'hero')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                                    <input type="text" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           name="sections[{{ $content->id }}][subtitle]" 
                                           value="{{ old('sections.'.$content->id.'.subtitle', $content->subtitle) }}">
                                </div>
                                @endif

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('sections.'.$content->id.'.content') border-red-500 @enderror" 
                                              name="sections[{{ $content->id }}][content]" 
                                              rows="6"
                                              required>{{ old('sections.'.$content->id.'.content', $content->content) }}</textarea>
                                    @error('sections.'.$content->id.'.content')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            @if($content->section_key == 'hero')
                            <div class="lg:col-span-1">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Company Image</label>
                                    @if($content->image)
                                        <div class="mb-3">
                                            <img src="{{ imageUrl($content->image) }}" 
                                                 alt="Current image" 
                                                 class="w-full rounded-lg border border-gray-200">
                                        </div>
                                    @endif
                                    <input type="file" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           name="sections[{{ $content->id }}][image]"
                                           accept="image/*">
                                    <p class="text-sm text-gray-500 mt-1">Upload new image or leave empty to keep current</p>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="flex items-center pt-4 border-t border-gray-200">
                            <input type="checkbox" 
                                   id="is_active_{{ $content->id }}"
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                                   name="sections[{{ $content->id }}][is_active]" 
                                   value="1"
                                   {{ old('sections.'.$content->id.'.is_active', $content->is_active) ? 'checked' : '' }}>
                            <label for="is_active_{{ $content->id }}" class="ml-2 text-sm font-medium text-gray-700">
                                Show on website
                            </label>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-clock mr-1"></i>
                            Last updated: {{ $content->updated_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Single Save Button at Bottom --}}
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200 shadow-md">
                    <i class="fas fa-save mr-2"></i>Save All Changes
                </button>
            </div>
        </form>
    @else
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-12 text-center">
                <i class="fas fa-info-circle text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Content Found</h3>
                <p class="text-gray-600 mb-4">Initialize the about content sections</p>
                <form action="{{ route('admin.about.seed') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>Initialize Content
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection

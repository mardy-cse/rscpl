@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Manage Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-200">
            Add New Testimonial
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Desktop Table View --}}
    <div class="hidden md:block bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avatar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($testimonials as $testimonial)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($testimonial->avatar)
                                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" 
                                         alt="{{ $testimonial->name }}" 
                                         class="h-12 w-12 rounded-full object-cover">
                                @else
                                    <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-gray-600 font-semibold text-lg">{{ substr($testimonial->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $testimonial->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-700">{{ $testimonial->company }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600">({{ $testimonial->rating }})</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($testimonial->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $testimonial->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                       class="text-blue-600 hover:text-blue-900">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this testimonial?');"
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
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                No testimonials found. <a href="{{ route('admin.testimonials.create') }}" class="text-blue-600 hover:underline">Add your first testimonial</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Mobile Card View --}}
    <div class="md:hidden space-y-4">
        @forelse($testimonials as $testimonial)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="flex gap-4 items-start">
                        @if($testimonial->avatar)
                            <img src="{{ asset('storage/' . $testimonial->avatar) }}" 
                                 alt="{{ $testimonial->name }}" 
                                 class="h-16 w-16 rounded-full object-cover flex-shrink-0">
                        @else
                            <div class="h-16 w-16 rounded-full bg-gray-300 flex items-center justify-center flex-shrink-0">
                                <span class="text-gray-600 font-semibold text-2xl">{{ substr($testimonial->name, 0, 1) }}</span>
                            </div>
                        @endif
                        
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $testimonial->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $testimonial->company }}</p>
                            <div class="flex items-center mt-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                    @endif
                                @endfor
                                <span class="ml-2 text-sm text-gray-600">({{ $testimonial->rating }})</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <span class="text-gray-500 font-medium">STATUS</span>
                            <div class="mt-1">
                                @if($testimonial->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <span class="text-gray-500 font-medium">ORDER</span>
                            <div class="mt-1 text-gray-700">{{ $testimonial->order }}</div>
                        </div>
                    </div>
                    
                    @if($testimonial->content)
                        <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600 line-clamp-3">{{ $testimonial->content }}</p>
                        </div>
                    @endif
                    
                    <div class="mt-4 flex gap-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                           class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center font-semibold">
                            <i class="fas fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                              method="POST" 
                              class="flex-1"
                              onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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
        @empty
            <div class="bg-white shadow-md rounded-lg p-8 text-center text-gray-500">
                <i class="fas fa-comments text-4xl mb-2"></i>
                <p class="text-lg">No testimonials found.</p>
                <a href="{{ route('admin.testimonials.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                    Add your first testimonial
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection

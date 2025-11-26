@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            <i class="fas fa-plus mr-2"></i>Add New Project
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Desktop Table View --}}
    <div class="hidden md:block bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="h-16 w-16 object-cover rounded-lg shadow-sm">
                                @else
                                    <div class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400 text-xl"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $project->title }}</div>
                                <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($project->description, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->location)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($project->location == 'Commercial') bg-blue-100 text-blue-800
                                        @elseif($project->location == 'Industrial') bg-purple-100 text-purple-800
                                        @elseif($project->location == 'Residential') bg-green-100 text-green-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ $project->location }}
                                    </span>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $project->year }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($project->status == 'Completed') bg-green-100 text-green-800
                                    @elseif($project->status == 'In Progress') bg-blue-100 text-blue-800
                                    @elseif($project->status == 'Planning') bg-yellow-100 text-yellow-800
                                    @elseif($project->status == 'On Hold') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $project->status ?? 'Completed' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->is_featured)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-star mr-1"></i>Featured
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Regular
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $project->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition duration-200">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-200">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-folder-open text-4xl mb-2"></i>
                                <p class="text-lg">No projects found.</p>
                                <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                    Add your first project
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Mobile Card View --}}
    <div class="md:hidden space-y-4">
        @forelse($projects as $project)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="flex gap-4">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="h-20 w-20 object-cover rounded-lg shadow-sm flex-shrink-0">
                        @else
                            <div class="h-20 w-20 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-image text-gray-400 text-2xl"></i>
                            </div>
                        @endif
                        
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $project->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ Str::limit($project->description, 60) }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <span class="text-gray-500 font-medium">CATEGORY</span>
                            <div class="mt-1">
                                @if($project->location)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($project->location == 'Commercial') bg-blue-100 text-blue-800
                                        @elseif($project->location == 'Industrial') bg-purple-100 text-purple-800
                                        @elseif($project->location == 'Residential') bg-green-100 text-green-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ $project->location }}
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <span class="text-gray-500 font-medium">YEAR</span>
                            <div class="mt-1 text-gray-700">{{ $project->year }}</div>
                        </div>
                        
                        <div>
                            <span class="text-gray-500 font-medium">STATUS</span>
                            <div class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($project->status == 'Completed') bg-green-100 text-green-800
                                    @elseif($project->status == 'In Progress') bg-blue-100 text-blue-800
                                    @elseif($project->status == 'Planning') bg-yellow-100 text-yellow-800
                                    @elseif($project->status == 'On Hold') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $project->status ?? 'Completed' }}
                                </span>
                            </div>
                        </div>
                        
                        <div>
                            <span class="text-gray-500 font-medium">FEATURED</span>
                            <div class="mt-1">
                                @if($project->is_featured)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-star mr-1"></i>Featured
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Regular
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <span class="text-gray-500 font-medium">ORDER</span>
                            <div class="mt-1 text-gray-700">{{ $project->order }}</div>
                        </div>
                    </div>
                    
                    <div class="mt-4 flex gap-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center font-semibold">
                            <i class="fas fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center font-semibold">
                                <i class="fas fa-trash mr-2"></i>
                                <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white shadow-md rounded-lg p-8 text-center text-gray-500">
                <i class="fas fa-folder-open text-4xl mb-2"></i>
                <p class="text-lg">No projects found.</p>
                <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                    Add your first project
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection

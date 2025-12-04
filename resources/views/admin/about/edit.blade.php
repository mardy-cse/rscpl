@extends('layouts.admin')

@section('title', 'Edit About Content')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-4">
        <h1 class="h3 mb-0">Edit: {{ ucfirst($aboutContent->section_key) }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">About Content</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.about.update', $aboutContent) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="section_key" value="{{ $aboutContent->section_key }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $aboutContent->title) }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($aboutContent->section_key == 'hero')
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" 
                                   class="form-control @error('subtitle') is-invalid @enderror" 
                                   id="subtitle" 
                                   name="subtitle" 
                                   value="{{ old('subtitle', $aboutContent->subtitle) }}">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif

                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" 
                                      name="content" 
                                      rows="6"
                                      required>{{ old('content', $aboutContent->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($aboutContent->section_key == 'hero')
                        <div class="mb-3">
                            <label for="image" class="form-label">Company Image</label>
                            @if($aboutContent->image)
                                <div class="mb-2">
                                    <img src="{{ imageUrl($aboutContent->image) }}" 
                                         alt="Current image" 
                                         class="img-thumbnail"
                                         style="max-width: 300px;">
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image"
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>
                        @endif

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1"
                                       {{ old('is_active', $aboutContent->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (Show on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm bg-light">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Help</h5>
                </div>
                <div class="card-body">
                    @if($aboutContent->section_key == 'hero')
                        <p><strong>Hero Section</strong></p>
                        <ul class="small mb-0">
                            <li>Title: Main heading (e.g., "Who We Are")</li>
                            <li>Subtitle: Secondary text below title</li>
                            <li>Content: Full description of your company</li>
                            <li>Image: Company photo or relevant image</li>
                        </ul>
                    @elseif($aboutContent->section_key == 'mission')
                        <p><strong>Mission Section</strong></p>
                        <ul class="small mb-0">
                            <li>Title: "Our Mission"</li>
                            <li>Content: Your company's mission statement</li>
                            <li>Describe what you aim to achieve</li>
                        </ul>
                    @elseif($aboutContent->section_key == 'vision')
                        <p><strong>Vision Section</strong></p>
                        <ul class="small mb-0">
                            <li>Title: "Our Vision"</li>
                            <li>Content: Your company's vision statement</li>
                            <li>Describe your long-term goals</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('title', 'Edit About Content')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-4">
        <h1 class="h3 mb-0">Edit About Content Section</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">About Content</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.about.update', $aboutContent) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="section_key" class="form-label">Section Key <span class="text-danger">*</span></label>
                            <select class="form-select @error('section_key') is-invalid @enderror" 
                                    id="section_key" 
                                    name="section_key" 
                                    required>
                                <option value="">Select Section</option>
                                <option value="hero" {{ old('section_key', $aboutContent->section_key) == 'hero' ? 'selected' : '' }}>Hero Section</option>
                                <option value="mission" {{ old('section_key', $aboutContent->section_key) == 'mission' ? 'selected' : '' }}>Mission</option>
                                <option value="vision" {{ old('section_key', $aboutContent->section_key) == 'vision' ? 'selected' : '' }}>Vision</option>
                                <option value="history" {{ old('section_key', $aboutContent->section_key) == 'history' ? 'selected' : '' }}>Company History</option>
                                <option value="values" {{ old('section_key', $aboutContent->section_key) == 'values' ? 'selected' : '' }}>Core Values</option>
                            </select>
                            @error('section_key')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $aboutContent->title) }}"
                                   placeholder="Enter section title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" 
                                   class="form-control @error('subtitle') is-invalid @enderror" 
                                   id="subtitle" 
                                   name="subtitle" 
                                   value="{{ old('subtitle', $aboutContent->subtitle) }}"
                                   placeholder="Enter subtitle (optional)">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" 
                                      name="content" 
                                      rows="5"
                                      placeholder="Enter main content">{{ old('content', $aboutContent->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content_secondary" class="form-label">Secondary Content</label>
                            <textarea class="form-control @error('content_secondary') is-invalid @enderror" 
                                      id="content_secondary" 
                                      name="content_secondary" 
                                      rows="4"
                                      placeholder="For vision or additional content (optional)">{{ old('content_secondary', $aboutContent->content_secondary) }}</textarea>
                            @error('content_secondary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">List Items</label>
                            <div id="items-container">
                                @php
                                    $items = old('items', $aboutContent->items ?? []);
                                @endphp
                                @if(!empty($items))
                                    @foreach($items as $item)
                                        <div class="input-group mb-2 item-row">
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="items[]" 
                                                   value="{{ $item }}"
                                                   placeholder="Enter item">
                                            <button type="button" class="btn btn-outline-danger remove-item">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2 item-row">
                                        <input type="text" 
                                               class="form-control" 
                                               name="items[]" 
                                               placeholder="Enter item">
                                        <button type="button" class="btn btn-outline-danger remove-item">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="add-item">
                                <i class="fas fa-plus"></i> Add Item
                            </button>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if($aboutContent->image)
                                <div class="mb-2">
                                    <img src="{{ imageUrl($aboutContent->image) }}" 
                                         alt="Current image" 
                                         class="img-thumbnail"
                                         style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image"
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number" 
                                       class="form-control @error('order') is-invalid @enderror" 
                                       id="order" 
                                       name="order" 
                                       value="{{ old('order', $aboutContent->order) }}"
                                       min="0">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_active" 
                                           name="is_active" 
                                           value="1"
                                           {{ old('is_active', $aboutContent->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Content
                            </button>
                            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemsContainer = document.getElementById('items-container');
    const addItemBtn = document.getElementById('add-item');

    addItemBtn.addEventListener('click', function() {
        const newItem = document.createElement('div');
        newItem.className = 'input-group mb-2 item-row';
        newItem.innerHTML = `
            <input type="text" 
                   class="form-control" 
                   name="items[]" 
                   placeholder="Enter item">
            <button type="button" class="btn btn-outline-danger remove-item">
                <i class="fas fa-times"></i>
            </button>
        `;
        itemsContainer.appendChild(newItem);
    });

    itemsContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
});
</script>
@endsection

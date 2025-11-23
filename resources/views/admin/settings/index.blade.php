@extends('layouts.admin')

@section('title', 'Website Settings')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Website Settings</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-xl"></i>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Contact Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-gray-700 font-semibold mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="phone" 
                               id="phone" 
                               value="{{ old('phone', $settings['phone'] ?? '') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('phone') border-red-500 @enderror"
                               required
                               placeholder="+65 8544 5560">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email', $settings['email'] ?? '') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('email') border-red-500 @enderror"
                               required
                               placeholder="rollershutter14@gmail.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="whatsapp" class="block text-gray-700 font-semibold mb-2">
                            WhatsApp Number <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="whatsapp" 
                               id="whatsapp" 
                               value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('whatsapp') border-red-500 @enderror"
                               required
                               placeholder="6585445560">
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Enter without + or spaces (e.g., 6585445560)
                        </p>
                        @error('whatsapp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="business_hours" class="block text-gray-700 font-semibold mb-2">
                            Business Hours <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="business_hours" 
                               id="business_hours" 
                               value="{{ old('business_hours', $settings['business_hours'] ?? '') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('business_hours') border-red-500 @enderror"
                               required
                               placeholder="Mon-Fri: 9AM-6PM | Sat: 9AM-1PM">
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Enter your business hours in any format you prefer
                        </p>
                        <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-xs text-gray-600 mb-1"><strong>Example formats:</strong></p>
                            <ul class="text-xs text-gray-600 space-y-1">
                                <li>• Mon-Fri: 9AM-6PM | Sat: 9AM-1PM</li>
                                <li>• Monday-Friday: 9am-6pm | Saturday: 9am-1pm</li>
                                <li>• Mon-Fri: 9:00 AM - 6:00 PM, Sat: 9:00 AM - 1:00 PM</li>
                            </ul>
                        </div>
                        @error('business_hours')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Location</h2>
                
                <div>
                    <label for="address" class="block text-gray-700 font-semibold mb-2">
                        Address <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="address" 
                           id="address" 
                           value="{{ old('address', $settings['address'] ?? '') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('address') border-red-500 @enderror"
                           required
                           placeholder="Singapore">
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 pt-4 border-t">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-save mr-2"></i>
                    Save Settings
                </button>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-semibold transition duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-500 text-xl"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm text-blue-700">
                    <strong>Note:</strong> These settings will be displayed in the website header and footer sections.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

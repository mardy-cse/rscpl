@extends('layouts.app')

@section('title', 'Contact Us - HTR ENGINEERING PTE LTD')
@section('meta_description', 'Contact HTR ENGINEERING for professional installation services. Located at ' . setting('address_line1', '105 Sims Avenue, Singapore') . '. Call ' . setting('phone', '+65 8697 3181') . ' or email ' . setting('email', 'rollershutter14@gmail.com') . '.')

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-8 md:py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl text-primary-100 max-w-3xl">
            Get in touch with us for inquiries, quotes, or support. We're here to help!
        </p>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Contact Form --}}
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    {{-- Name Field --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               required 
                               maxlength="100"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('name') border-red-500 @enderror">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email Field --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required 
                               maxlength="255"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('email') border-red-500 @enderror">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone Field --}}
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            Phone Number
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}"
                               maxlength="20"
                               placeholder="+65 XXXX XXXX"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('phone') border-red-500 @enderror">
                        @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Subject Field --}}
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                            Subject
                        </label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               value="{{ old('subject') }}"
                               maxlength="255"
                               placeholder="e.g., Roller Shutter Installation Inquiry"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('subject') border-red-500 @enderror">
                        @error('subject')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Message Field --}}
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  required 
                                  maxlength="2000"
                                  rows="5"
                                  placeholder="Please provide details about your inquiry..."
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Maximum 2000 characters</p>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" 
                            id="contactSubmitBtn"
                            class="w-full bg-primary-700 text-white px-6 py-4 rounded-lg font-bold text-lg hover:bg-primary-800 transition-colors flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg id="contactBtnIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <svg id="contactBtnSpinner" class="hidden animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span id="contactBtnText">Send Message</span>
                    </button>
                </form>
                
                <script>
                document.querySelector('form').addEventListener('submit', function(e) {
                    const btn = document.getElementById('contactSubmitBtn');
                    const icon = document.getElementById('contactBtnIcon');
                    const spinner = document.getElementById('contactBtnSpinner');
                    const text = document.getElementById('contactBtnText');
                    
                    btn.disabled = true;
                    icon.classList.add('hidden');
                    spinner.classList.remove('hidden');
                    text.textContent = 'Sending...';
                });
                </script>
            </div>

            {{-- Contact Information --}}
            <div class="space-y-8">
                {{-- Contact Details --}}
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>
                    
                    <div class="space-y-6">
                        {{-- Address --}}
                        <div class="flex items-start gap-4">
                            <div class="bg-primary-100 p-3 rounded-lg flex-shrink-0">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Address</h3>
                                <p class="text-gray-600">
                                    {!! nl2br(e(setting('address', '105 Sims Avenue #05-11\nChancerlodge Complex\nSingapore 387429'))) !!}
                                </p>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="flex items-start gap-4">
                            <div class="bg-primary-100 p-3 rounded-lg flex-shrink-0">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Phone</h3>
                                <a href="tel:{{ str_replace(' ', '', setting('phone', '+6585445560')) }}" class="text-primary-700 hover:text-primary-800 font-semibold">
                                    {{ setting('phone', '+65 8697 3181') }}
                                </a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-4">
                            <div class="bg-primary-100 p-3 rounded-lg flex-shrink-0">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                                <a href="mailto:{{ setting('email', 'rollershutter14@gmail.com') }}" class="text-primary-700 hover:text-primary-800 font-semibold break-all">
                                    {{ setting('email', 'rollershutter14@gmail.com') }}
                                </a>
                            </div>
                        </div>

                        {{-- Business Hours --}}
                        <div class="flex items-start gap-4">
                            <div class="bg-primary-100 p-3 rounded-lg flex-shrink-0">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Business Hours</h3>
                                <p class="text-gray-600">
                                    {!! nl2br(e(setting('business_hours_detail', 'Mon - Fri: 9:00 AM - 6:00 PM\nSaturday: 9:00 AM - 1:00 PM\nSunday: Closed'))) !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp Button --}}
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <a href="https://wa.me/{{ setting('whatsapp', '6585445560') }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flex items-center justify-center gap-3 bg-green-500 hover:bg-green-600 text-white px-6 py-4 rounded-lg font-bold transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            Chat on WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Map --}}
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <h2 class="text-2xl font-bold text-gray-900 p-8 pb-4">Find Us Here</h2>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7617389982574!2d103.87565931475404!3d1.327396799032086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da17764ce6b7b3%3A0x7f9b5d5d2d4c8e8d!2s66%20Tannery%20Ln%2C%20Singapore%20347805!5e0!3m2!1sen!2ssg!4v1637000000000!5m2!1sen!2ssg" 
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"
                            class="rounded-b-2xl"
                            title="HTR ENGINEERING Location">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Emergency Contact Banner --}}
<section class="py-12 bg-red-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="flex items-center justify-center gap-3 mb-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <h2 class="text-2xl md:text-3xl font-bold">24/7 Emergency Service</h2>
        </div>
        <p class="text-xl mb-4">Need urgent repairs? We're available around the clock!</p>
        <a href="tel:+6585445560" class="inline-flex items-center gap-2 bg-white text-red-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-red-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            Call Emergency Hotline
        </a>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // AJAX form submission (optional enhancement)
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        // Allow normal form submission - AJAX can be added later if needed
        // This is just a placeholder for future enhancement
    });
</script>
@endpush

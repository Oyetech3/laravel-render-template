<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact-mutmineBeads</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="./images/logocopy.png">
</head>
<body>

    @include('home.header')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 w-full h-64 md:h-80 overflow-hidden relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white px-4">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Contact Us</h1>
                <p class="text-lg md:text-xl">We'd love to hear from you. Get in touch with us today!</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-secondary-9 mb-6">Send Us a Message</h2>

                @if(session('success'))
                    <div id="alert-success" class="bg-green-100 mt-2 border border-green-400 text-green-700 px-4 py-3 rounded relative transition-opacity duration-500" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button type="button" onclick="closeAlert('alert-success')" class="absolute ml-2 top-0 bottom-0 right-0 px-4 py-3" aria-label="Close">
                            <span class="text-green-700 text-2xl hover:text-green-900">&times;</span>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div id="alert-error" class="bg-red-100 border  border-red-400 text-red-700 px-4 py-3 rounded mb-6 relative transition-opacity duration-500">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" onclick="closeAlert('alert-error')" class="absolute ml-2 top-0 bottom-0 right-0 px-4 py-3" aria-label="Close">
                            <span class="text-red-700 text-2xl hover:text-red-900">&times;</span>
                        </button>
                    </div>
                @endif

                <script>
                    function closeAlert(id) {
                        let alert = document.getElementById(id);
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500); // matches duration-500
                    }

                    // Optional: Auto-hide after 5 seconds
                    setTimeout(() => {
                        document.querySelectorAll('[id^="alert-"]').forEach(alert => {
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 500);
                        });
                    }, 5000);
                </script>



                <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                            <input type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200">
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                            <input type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                        <select id="subject"
                                name="subject"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200">
                            <option value="">Select a subject</option>
                            <option value="general_inquiry" {{ old('subject') == 'general_inquiry' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="custom_order" {{ old('subject') == 'custom_order' ? 'selected' : '' }}>Custom Order</option>
                            <option value="repair_service" {{ old('subject') == 'repair_service' ? 'selected' : '' }}>Repair Service</option>
                            <option value="bulk_order" {{ old('subject') == 'bulk_order' ? 'selected' : '' }}>Bulk Order</option>
                            <option value="workshop" {{ old('subject') == 'workshop' ? 'selected' : '' }}>Workshop Inquiry</option>
                            <option value="wedding_collection" {{ old('subject') == 'wedding_collection' ? 'selected' : '' }}>Wedding Collection</option>
                            <option value="corporate_gifts" {{ old('subject') == 'corporate_gifts' ? 'selected' : '' }}>Corporate Gifts</option>
                            <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Customer Support</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                        <textarea id="message"
                                name="message"
                                rows="6"
                                required
                                placeholder="Tell us about your project, requirements, or any questions you have..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200 resize-vertical">{{ old('message') }}</textarea>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox"
                            id="newsletter"
                            name="newsletter"
                            value="1"
                            {{ old('newsletter') ? 'checked' : '' }}
                            class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 rounded focus:ring-pink-500 focus:ring-2">
                        <label for="newsletter" class="ml-2 text-sm text-gray-700">
                            I'd like to receive updates about new collections and special offers
                        </label>
                    </div>

                    <button type="submit" id="send-button"
                            class="relative w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-3 px-8 rounded-lg font-semibold hover:from-pink-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-pink-300 disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:scale-100">
                        <span id="send-text">Send Message</span>
                    </button>
                </form>


            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Contact Details -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Get in Touch</h3>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="bg-pink-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">info@mutminebeads.com</p>
                                <p class="text-gray-600">orders@mutminebeads.com</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="bg-purple-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Phone</h4>
                                <p class="text-gray-600">+234 (0) 805-383-3959</p>
                                <p class="text-gray-600">+234 (0) 802-276-1274</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="bg-indigo-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Address</h4>
                                <p class="text-gray-600">123 Ipaja Street<br>
                                Ipaja, Lagos State<br>
                                Nigeria</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="bg-green-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Business Hours</h4>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                                <p class="text-gray-600">Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Frequently Asked Questions</h3>

                    <div class="space-y-4">
                        <div class="border-b border-gray-200 pb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">How long does a custom order take?</h4>
                            <p class="text-gray-600 text-sm">Custom orders typically take 7-14 business days, depending on complexity and current workload.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Do you ship internationally?</h4>
                            <p class="text-gray-600 text-sm">Currently, we ship within Nigeria. International shipping options are coming soon!</p>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">What materials do you use?</h4>
                            <p class="text-gray-600 text-sm">We use premium glass beads, crystal beads, natural stones, and quality findings to ensure durability.</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Can I see samples before ordering?</h4>
                            <p class="text-gray-600 text-sm">Yes! We can provide design mockups and material samples for custom orders above ₦50,000.</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Follow Us</h3>

                    <div class="flex space-x-4">
                        <a href="#" class="bg-pink-500 hover:bg-pink-600 text-white p-3 rounded-lg transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>

                        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>

                        <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white p-3 rounded-lg transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>

                        <a href="#" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white p-3 rounded-lg transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>

                    <p class="text-gray-600 text-sm mt-4">
                        Follow us for behind-the-scenes content, new collection previews, and beading tips!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section (Optional - You can replace with actual map) -->
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-secondary-9 mb-4">Visit Us</h2>
                <p class="text-gray-600">Come see our collection in person and meet our talented craftspeople.</p>
            </div>

            <!-- Placeholder for map - replace with actual Google Maps embed or similar -->
            <div class="bg-gray-300 h-64 md:h-96 rounded-lg flex items-center justify-center">
                <div class="text-center text-gray-600">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                    </svg>
                    <p class="text-lg font-semibold">Interactive Map Coming Soon</p>
                    <p class="text-sm">123 Ipaja Street, Ipaja, Lagos State</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
                Subscribe to our newsletter for the latest collections, exclusive offers, and beading tutorials.
            </p>

            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="flex">
                    <input type="email"
                        name="email"
                        placeholder="Enter your email address"
                        required
                        class="flex-1 px-4 py-3 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-white">
                    <button type="submit"
                            class="bg-white text-pink-500 px-6 py-3 rounded-r-lg font-semibold hover:bg-gray-100 transition-colors duration-300">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('home.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //console.log("DOM loaded");
            const form = document.getElementById('contact-form');

            if (form) {
                console.log("Form found!");
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    //console.log("Form submitted!");

                    const btn = document.getElementById('send-button');
                    const text = document.getElementById('send-text');

                    // Disable button and change text
                    btn.disabled = true;
                    text.textContent = 'Sending...';

                    // Submit the form after a brief delay
                    setTimeout(() => {
                        this.submit();
                    }, 300);
                });
            } else {
                console.log("Form not found! Check your form ID.");
            }
        });
        </script>

</body>
</html>

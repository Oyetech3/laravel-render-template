<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services-Mutminebeads</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="./images/logocopy.png">
</head>
<body>

    @include('home.header')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 w-full h-64 md:h-80 lg:h-96 overflow-hidden relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white px-4">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Our Services</h1>
                <p class="text-lg md:text-xl lg:text-2xl">Crafting beautiful beaded accessories just for you</p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-9 mb-4">What We Offer</h2>
            <div class="w-24 h-1 bg-pink-500 mx-auto mb-6"></div>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                From custom designs to repairs, we provide comprehensive beading services to meet all your accessory needs.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Custom Design Service -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-pink-500 h-48 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-pink-400 to-pink-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Custom Design</h3>
                    <p class="text-gray-600 mb-4">
                        Bring your vision to life with our custom beading services. We create unique pieces tailored to your style and preferences.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Personal consultation</li>
                        <li>• Design mockups</li>
                        <li>• Premium materials</li>
                        <li>• Unlimited revisions</li>
                    </ul>
                    <div class="text-pink-500 font-bold text-lg">Starting from $50</div>
                </div>
            </div>

            <!-- Repair Service -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-purple-500 h-48 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Repair & Restoration</h3>
                    <p class="text-gray-600 mb-4">
                        Give your favorite beaded accessories new life. We repair broken strands, replace missing beads, and restore vintage pieces.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Restringing services</li>
                        <li>• Bead replacement</li>
                        <li>• Clasp repair</li>
                        <li>• Vintage restoration</li>
                    </ul>
                    <div class="text-purple-500 font-bold text-lg">Starting from $20</div>
                </div>
            </div>

            <!-- Bulk Orders -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-indigo-500 h-48 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Bulk Orders</h3>
                    <p class="text-gray-600 mb-4">
                        Perfect for events, businesses, or resellers. We offer competitive pricing for large quantity orders with consistent quality.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Volume discounts</li>
                        <li>• Custom packaging</li>
                        <li>• Fast turnaround</li>
                        <li>• Quality guarantee</li>
                    </ul>
                    <div class="text-indigo-500 font-bold text-lg">Contact for pricing</div>
                </div>
            </div>

            <!-- Workshops -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-green-500 h-48 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Beading Workshops</h3>
                    <p class="text-gray-600 mb-4">
                        Learn the art of beading with our hands-on workshops. Suitable for beginners and advanced crafters alike.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Small group sessions</li>
                        <li>• All materials included</li>
                        <li>• Expert instruction</li>
                        <li>• Take home your creation</li>
                    </ul>
                    <div class="text-green-500 font-bold text-lg">$35 per session</div>
                </div>
            </div>

            <!-- Wedding Services -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-rose-500 h-48 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Wedding Collections</h3>
                    <p class="text-gray-600 mb-4">
                        Make your special day even more beautiful with custom bridal jewelry and accessories for the entire wedding party.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Bridal jewelry sets</li>
                        <li>• Bridesmaids accessories</li>
                        <li>• Custom color matching</li>
                        <li>• Rush orders available</li>
                    </ul>
                    <div class="text-rose-500 font-bold text-lg">Packages from $150</div>
                </div>
            </div>

            <!-- Corporate Gifts -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-amber-500 h-48 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414L15 8.414V14a1 1 0 11-2 0V9.414l-3.293 3.293a1 1 0 01-1.414-1.414L9.586 10H4a1 1 0 110-2h4zM2 2a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V4a2 2 0 00-2-2H2z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Corporate Gifts</h3>
                    <p class="text-gray-600 mb-4">
                        Professional and elegant beaded accessories perfect for corporate gifts, awards, and employee appreciation.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4">
                        <li>• Company logo integration</li>
                        <li>• Bulk pricing available</li>
                        <li>• Professional packaging</li>
                        <li>• Branded gift boxes</li>
                    </ul>
                    <div class="text-amber-500 font-bold text-lg">Quote on request</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary-9 mb-4">Our Process</h2>
                <div class="w-24 h-1 bg-pink-500 mx-auto mb-6"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    From concept to completion, we ensure every step meets our high standards of quality and craftsmanship.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-pink-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">1</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Consultation</h3>
                    <p class="text-gray-600">Discuss your vision, preferences, and requirements with our design team.</p>
                </div>

                <div class="text-center">
                    <div class="bg-purple-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">2</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Design</h3>
                    <p class="text-gray-600">Create detailed mockups and select the perfect beads and materials for your piece.</p>
                </div>

                <div class="text-center">
                    <div class="bg-indigo-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">3</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Crafting</h3>
                    <p class="text-gray-600">Our skilled artisans carefully handcraft your piece with attention to every detail.</p>
                </div>

                <div class="text-center">
                    <div class="bg-green-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">4</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Delivery</h3>
                    <p class="text-gray-600">Quality check, beautiful packaging, and safe delivery to your doorstep.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Get Started?</h2>
            <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
                Let's bring your beading vision to life. Contact us today for a free consultation and quote.
            </p>
            <div class="space-x-4">
                <a href="{{url('/contact')}}" class="bg-white text-pink-500 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-300">
                    Get Quote
                </a>
                <a href="{{url('/products')}}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-pink-500 transition-colors duration-300">
                    View Products
                </a>
            </div>
        </div>
    </div>

    @include('home.footer')

</body>
</html>

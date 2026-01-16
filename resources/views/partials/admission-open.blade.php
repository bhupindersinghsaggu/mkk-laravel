<section id="admission-open"
    class="bg-gradient-to-r from-pink-600 via-red-500 to-pink-400 text-white px-4 py-8 md:px-12  lg:py-16">
    <div class="max-w-7xl mx-auto ">
        <h2 class="text-2xl  py-4 md:py-8 mb-4  md:text-5xl font-semibold leading-tight text-center">
            <span class="text-gray-800 mb-3 mt-3 text-3xl lg:text-5xl"> Admission Open For<span class="text-gray-800">
                    2026-27</span>
        </h2>
        <div class="grid grid-cols-1 gap-3 lg:grid-cols-2   overflow-hidden">
            <!-- Left Image -->
            <div class="hidden lg:block">
                <img src="./assets/images/admission.webp" alt="Counsellor"
                    class="max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl xl:max-w-3xl rounded-lg  border border-white p-4">
            </div>
            <!-- Right Form -->
            <div class="text-white">
                <h3 class="text-white mb-6  text-2xl font-semibold  lg:text-4xl"> Talk To Our <span class="text-white">
                        Counsellor </span></h3>
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admission.store') }}" class="grid grid-cols-1 gap-6">
                    @csrf
                    <input type="text" name="name" placeholder="Name"
                        class="bg-transparent border border-white px-4 py-3 rounded" />

                    <input type="tel" name="phone" placeholder="Phone*"
                        class="bg-transparent border border-white px-4 py-3 rounded" />

                    <select name="class" class="bg-transparent border border-white px-4 py-3 rounded text-white">
                        <option class="text-black">Select Class</option>
                        <option class="text-black">Pre-Nursery</option>
                        <option class="text-black">Nursery</option>
                        <option class="text-black">Class I</option>
                        <option class="text-black">Class II</option>
                        <option class="text-black">Class III</option>
                        <option class="text-black">Class IV</option>
                        <option class="text-black">Class V</option>
                        <option class="text-black">Class VII</option>
                        <option class="text-black">Class VII</option>
                        <option class="text-black">Class VIII</option>
                        <option class="text-black">Class IX</option>
                        <option class="text-black">Class X</option>
                        <option class="text-black">Class XI</option>
                        <option class="text-black">Class XII</option>
                    </select>

                    <select name="source" class="bg-transparent border border-white px-4 py-3 rounded text-white">
                        <option class="text-black">Source of Information</option>
                        <option class="text-black">Google</option>
                        <option class="text-black">Social Media</option>
                        <option class="text-black">Website</option>
                        <option class="text-black">Hoarding</option>
                        <option class="text-black">Word of Mouth</option>
                    </select>

                    <textarea name="message" rows="4" class="bg-transparent border border-white px-4 py-3 rounded"
                        placeholder="Message"></textarea>
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                    </div>

                    @error('g-recaptcha-response')
                        <p class="text-red-200 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="border border-white px-8 py-3 rounded font-semibold w-fit">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

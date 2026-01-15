@extends('layouts.app')

@section('title', 'Admission Enquiry')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-8 text-indigo-600">
            Admission Enquiry Form
        </h2>

        <form method="POST" action="#" class="bg-white shadow rounded-lg p-8 space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Student Name</label>
                    <input type="text" class="w-full border rounded px-4 py-2 focus:ring focus:ring-indigo-200">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Parent Name</label>
                    <input type="text" class="w-full border rounded px-4 py-2 focus:ring focus:ring-indigo-200">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Mobile Number</label>
                    <input type="tel" class="w-full border rounded px-4 py-2 focus:ring focus:ring-indigo-200">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Class Applying For</label>
                    <select class="w-full border rounded px-4 py-2 focus:ring focus:ring-indigo-200">
                        <option>Select Class</option>
                        <option>Nursery</option>
                        <option>KG</option>
                        <option>Class 1</option>
                        <option>Class 2</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Message</label>
                <textarea rows="4" class="w-full border rounded px-4 py-2 focus:ring focus:ring-indigo-200"></textarea>
            </div>

            <button class="w-full bg-indigo-600 text-white py-3 rounded font-semibold hover:bg-indigo-700">
                Submit Enquiry
            </button>
        </form>
    </div>
@endsection

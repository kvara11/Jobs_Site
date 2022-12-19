@extends('layout')
@section('content')
@php
    // dd($list);
@endphp
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Add Company
            </h2>
            <p class="mb-4">Just add some information</p>
        </header>
        
        <form method="POST" action="/company" enctype="multipart/form-data">
            
            @csrf
            
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2"
                    >Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    placeholder="Example: Google"
                    value="{{old('name')}}"
                />

                @error('name')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="industry_name"
                    class="inline-block text-lg mb-2"
                    >Industry</label
                >
                {{-- <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="industry_name"
                    placeholder="Example: Computer and technology"
                    value="{{old('industry_name')}}"
                /> --}}

                <select class="border border-gray-200 rounded p-2 w-full" name="industry_name" id="industry_name" >
                    <option value="option_select" disabled selected>Industries</option>
                    @foreach($list as $industry)
                        <option value="{{ $industry->id }}" >{{ $industry->name}}</option>
                    @endforeach
                    {{-- $('#industry_name').val() --}}
                </select>

                @error('industry_name')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label
                    for="phone"
                    class="inline-block text-lg mb-2"
                    >Phone</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="phone"
                    placeholder="Example: +102214567"
                    value="{{old('phone')}}"
                />
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    placeholder="Example: youremail@email.com"
                    value="{{old('email')}}"
                />

                @error('email')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2"
                    >Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: USA"
                    value="{{old('location')}}"
                />

                @error('location')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Company Descrioption or any info
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Copmany announcment, open positions and ect"
                >{{old('description')}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Add Company
                </button>

                <a href="/company" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>

@endsection
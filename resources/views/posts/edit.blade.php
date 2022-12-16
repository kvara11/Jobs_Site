@extends('layout')
@section('content')

    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Job 
            </h2>
            <p class="mb-4">Edit: {{$post->title}}</p>
        </header>
        
        <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
            
            @csrf                   {{-- defend from cross-scripting --}}
            @method('PUT')          {{-- changes from POST to PUT --}}

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{$post->title}}"
                />
    
                @error('title')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="company_name"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company_name"
                    placeholder="Example: Google"
                    value="{{$post->company_name}}"
                />

                @error('company_name')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label
                    for="country"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="country"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{$post->country}}"
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
                    value="{{$post->email}}"
                />

                @error('email')                                                 {{--   outputs validation error     --}}
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{$post->tags}}"
                />
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
                <img
                    class="hidden w-48 mr-6 md:block"
                    src="{{$post->logo ? asset('storage/' . $post->logo) : asset('images/no_logo.png')}}"
                    alt="Logo"
                />
            </div>
            
            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{$post->description}}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Post
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>

@endsection
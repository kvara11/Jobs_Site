@extends('layout')
@section('content')  

@include('partials/_search')

{{-- <h2> title : {{$listData['title']}} </h2>
<h3><i> author : {{$listData['author']}} </i></h3>
<h3> company_name : {{$listData['company_name']}} </h3>
<h3> country : {{$listData['country']}} </h3> --}}


<a href="/" class="inline-block text-black ml-4 mb-4 hover:text-red-600">
    <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{$listData->logo ? asset('storage/' . $listData->logo) : asset('images/no_logo.png')}}"
                alt=""
            />
            <h3 class="text-2xl mb-2">{{$listData->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$listData['company_name']}}</div>
            
            <x-post-tag :tags="$listData['tags']" />

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i>  {{$listData['country']}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    <p> {{$listData->description}} </p>

                    <a
                        href="mailto:test@test.com"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href="https://test.com"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit Website    
                    </a>
                </div>
            </div>
        </div>

        
    </div>
    

    <a href="/posts/{{$listData->id}}/edit">
        <i class="fa-solid fa-pencil"></i> Edit
    </a>

    <form method="POST" action="/posts/{{$listData->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500">
            <i class="fa-solid fa-trash"></i> Delete
        </button>
    </form>
</div>    

@endsection
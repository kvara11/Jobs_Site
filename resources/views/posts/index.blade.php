{{-- <h1><?php echo $listHead; ?> </h1>

<?php foreach($listData as $data): ?>

    <h2> <?php echo $data['id'];  ?></h2>
    <h3> <?php echo $data['title'];  ?></h3>

<?php endforeach; ?> --}}
{{-- ------------------------------------------------------------------------- --}}


{{-- starting --}}

@extends('layout')
@section('content')                                 {{-- @yield('content')}} --}}

    @include('partials/_hero')
    @include('partials/_search')
    
    @if (count($listData) > 0)
        <p class="ml-10 mb-5">Total Jobs - {{count($listData)}}</p>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


        @unless (count($listData) == 0)
            @foreach($listData as $data)

                {{-- <a href="/posts/{{$data['id']}}"> <h2> {{$data['title']}} </h2> </a>
                <h3> {{$data['company_name']}} </h3> --}}

                <x-post-card :data="$data" />

            @endforeach
        @else
            <p>No Jobs found</p>
        @endunless

        
    </div>
    
    <div class="mt-6 p-4">
        {{$listData->links()}}
    </div>

@endsection

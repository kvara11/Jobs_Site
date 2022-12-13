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

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if (count($listData) > 0)
            <p>Total Jobs - {{count($listData)}}</p>
        @endif

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

@endsection

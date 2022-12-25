@extends('layout')
@section('content')

    @include('partials/_hero')
    @include('partials/_search')
    
    @if (count($companies) > 0)
        <p class="ml-10 mb-5">Total Jobs - {{count($companies)}}</p>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


        @unless (count($companies) == 0)
            @foreach($companies as $company)

                {{-- <a href="/posts/{{$data['id']}}"> <h2> {{$data['title']}} </h2> </a>
                <h3> {{$data['company_name']}} </h3> --}}

                <x-company-card :data="$company" />
                
            @endforeach
        @else
            <p>No Jobs found</p>
        @endunless

        
    </div>



    {{-- Modal Opening and Cloting with dymanic data --}}
    <script type="text/javascript">

        $(document).ready(function () {

            $('.openModal').on('click', function(e){
                
                const id = $(this).attr('data-id');
                
                $.ajax({
                    type: "GET",
                    url: "company_info/" + id,
                    success: function (res) 
                    {
                        console.log(res);
                        $('#modal-title').html(res.name);
                        $('#modal-desc').text(res.descriprion);
                    }
                });
                
                $('#interestModal').removeClass('invisible');

            });

            $('.closeModal').on('click', function(e){

                $('#interestModal').addClass('invisible');

            });
            
        });

    </script>

@endsection
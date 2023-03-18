@extends('layout')
<script type="text/javascript">
    import axios from 'axios';
</script>

@section('content')

    @include('partials/_hero')
    @include('partials/_search')
    
    @if (count($companies) > 0)
        <p class="ml-10 mb-5">Registered Companies - {{count($companies)}}</p>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


        @unless (count($companies) == 0)
            @foreach($companies as $company)

                {{-- <a href="/posts/{{$data['id']}}"> <h2> {{$data['title']}} </h2> </a>
                <h3> {{$data['company_name']}} </h3> --}}

                <x-company-card :data="$company" />
                
            @endforeach
        @else
            <p>No Companies Found</p>
        @endunless

        
    </div>
    


{{-- Modal Opening and Cloting with dymanic data --}}
<script type="text/javascript">
// import axios from 'axios';

    // var MicroModal = require('micromodal');
    
    // MicroModal.init({
    //     onShow: modal => console.info(`${modal.id} is shown`), // [1]
    //     onClose: modal => console.info(`${modal.id} is hidden`), // [2]
    //     openTrigger: 'data-custom-open', // [3]
    //     closeTrigger: 'data-custom-close', // [4]
    //     openClass: 'is-open', // [5]
    //     disableScroll: true, // [6]
    //     disableFocus: false, // [7]
    //     awaitOpenAnimation: false, // [8]
    //     awaitCloseAnimation: false, // [9]
    //     debugMode: true // [10]
    //     });

    // $(document).ready(function () {

    //     //modal open function
    //     $('.openModal').on('click', function(e){
    //         const id = $(this).attr('data-id');
            
    //         $.ajax({
    //             type: "GET",
    //             url: "company_info/" + id,
    //             success: function (res) 
    //             {
    //                 // console.log(res);
    //                 $('#modal-title').html(res.name);
    //                 $('#modal-desc').text(res.descriprion);
    //             }
    //         });
            
    //         // setTimeout(function() { 
    //             $('#interestModal').removeClass('invisible');
    //         // }, 360);

    //     });

    //     //modal close
    //     $('.closeModal').on('click', function(e){
            
    //         $('#interestModal').addClass('invisible');

    //         //refresh modal, simple data delete from html
    //         // setTimeout(function() { 
    //             $("#modal-desc").empty();
    //             $("#modal-title").empty();
    //         // }, 100);

    //     });
        
    // });



$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/Ajax",
        data: {func: 'data'},
        dataType: "json",
        success: function (response) {
            console.log('success');
        }
    });

    //modal open function
    $('.openModal').on('click', function(e){

        getModalData();
        $('#interestModal').removeClass('invisible');

    });

    //modal close
    $('.closeModal').on('click', function(e){
        
        $('#interestModal').addClass('invisible');

        //refresh modal, simple data delete from html
        $("#modal-desc").empty();
        $("#modal-title").empty();

    });
    
});

async function getModalData() {
    try {
        console.log('here');
        const id = $(this).attr('data-id');
        const response = await axios.get('company_info/' + id);
        const res = response.data;
        $('#modal-title').html(res.name);
        $('#modal-desc').text(res.descriprion);
    } catch (error) {
        console.error(error);
    }
}

</script>

@endsection 
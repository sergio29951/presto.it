<x-layout>

    @if(session()->has('message'))
      <div class="flex flex-row justify-center my-2 alert alert-success">
        {{ session('message') }}
      </div>    
    @endif

    <div class="container mt-5 min-vh-100 bgWorker">
      <div class="row">
        <div class="col-12 mt-3">
          <img src="/img/team.jpg" alt="">
        </div>
        <div class="col-12 col-md-8 mt-3">
          <h2>{{__('ui.researchJob')}}</h2>      
        </div>
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center">
          <form action="{{ route('become.revisor') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-custom mt-3">
              <span>{{__('ui.sendResearchJob')}}</span>
            </button>
          </form>
        </div>
      </div>
    </div>

    {{-- <div class="container my-3 vh-100">
      <div class="row">
       
      </div>
    </div> --}}

</x-layout>


  

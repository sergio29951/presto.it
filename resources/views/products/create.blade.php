<x-layout>
  <section class="container mt-5 form-custom">
    <div class="row justify-content-center align-items-center">

      <div class="col-8">
          <livewire:create-product />
      </div>

      <div class="col-12 bg-danger text-white">
          <h5>{{__('ui.rememberThat')}}</h5>
      </div>
      
    </div>
  </section>
</x-layout>
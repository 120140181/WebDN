@include('components.navbar')
 <!-- *** Card Start *** -->
 <div class="container">
    <h1 class="text-center my-4">GALERI FOTO</h1>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100 ">
          <img
            src="{{ asset('images/akad1.jpg') }}"
            style="height: 80%;"
            class="card-img-top"
            alt="Deskripsi Foto 1" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 1.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad2.jpg') }}"
            style="height: 80%;"
            class="card-img-top"
            alt="Deskripsi Foto 2" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 2.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad3.jpg') }}"
            style="height: 80%;"
            class="card-img-top"
            alt="Deskripsi Foto 3" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 3.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad4.jpg') }}"
            class="card-img-top"
            style="height: 80%;"
            alt="Deskripsi Foto 4" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 4.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad5.jpg') }}"
            class="card-img-top"
            style="height: 80%;"
            alt="Deskripsi Foto 5" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 5.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad6.jpg') }}"
            class="card-img-top"
            style="height: 80%;"
            alt="Deskripsi Foto 6" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 6.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad7.jpg') }}"
            class="card-img-top"
            style="height: 80%;"
            alt="Deskripsi Foto 6" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 7.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/akad8.jpg') }}"
            class="card-img-top"
            style="height: 80%;"
            alt="Deskripsi Foto 6" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 8.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img
            src="{{ asset('images/background1.jpg') }}"
            class="card-img-top"
            style="height: 80%;"
            alt="Deskripsi Foto 6" />
          <div class="card-body">
            <p class="card-text">Deskripsi singkat tentang foto 9.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- *** Card End *** -->

  @include('components.footer')

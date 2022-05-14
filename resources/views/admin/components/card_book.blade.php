<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <img class="w-100" src="{{ asset('assets/img/cover-book.jpg') }}" />
        </div>
        <div class="col-sm-9">
          <a href="#">
            <h4>{{ $title }}</h4>
          </a>
          <p>{{ substr($description, 0, 150) }}...</p>
          <div class="text-job">Diyan Mayasari</div>
        </div>
      </div>
    </div>
  </div>
</div>
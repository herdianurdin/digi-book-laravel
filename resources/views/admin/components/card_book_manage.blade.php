<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4">
          <img class="w-100" src="{{ asset('assets/img/cover-book.jpg') }}" />
        </div>
        <div class="col-sm-8">
          <a href="#">
            <h4>{{ $title }}</h4>
          </a>
          <p>{{ substr($description, 0, 100) }}...</p>
          <div class="text-job mb-3">Diyan Mayasari</div>
          <div class="buttons">
            <a href="#" class="btn btn-info">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
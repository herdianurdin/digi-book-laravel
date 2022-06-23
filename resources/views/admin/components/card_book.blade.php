<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <img class="w-100 shadow" src="{{ Storage::url($book->cover) }}" />
        </div>
        <div class="col-sm-9">
          <a href="{{  Storage::url($book->file) }}" target="_blank">
            <h4>{{ $book->title }}</h4>
          </a>
          <p>{{ substr($book->description, 0, 150) }}...</p>
          <div class="text-job">{{ $book->author }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
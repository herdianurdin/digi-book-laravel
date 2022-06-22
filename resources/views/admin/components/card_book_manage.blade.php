<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4">
          <img class="w-100 shadow" src="{{ asset('uploads/covers/' . $book->cover) }}" />
        </div>
        <div class="col-sm-8">
          <a href="{{ asset('uploads/files/' . $book->file) }}" target="_blank">
            <h4>{{ $book->title }}</h4>
          </a>
          <p>{{ substr($book->description, 0, 100) }}...</p>
          <div class="text-job mb-3">{{ $book->author }}</div>
          <div class="buttons">
            <form id="delete-book-{{ $book->id }}" action="{{ route('destroy_book', $book->id ) }}" method="POST">
              @csrf
              @method('DELETE')
            </form>

            <a href="{{ route('edit_book', $book->id) }}" class="btn btn-info">Update</a>

            <button class="btn btn-danger trigger--fire-modal-{{ $book->id }}"
              data-confirm="Realy?|Are you sure you want to delete this book?"
              data-confirm-yes="document.querySelector('#delete-book-{{ $book->id }}').submit();">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
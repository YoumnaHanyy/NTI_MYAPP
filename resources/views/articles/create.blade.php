<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Article</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <h1>Create Article</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Content</label>
      <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Image (optional)</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>

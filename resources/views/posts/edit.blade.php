
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>edit</title>
    <style>
        div{  width: 700px;      margin:0 auto;  }
    </style>
  </head>
  <body>


      <h2 style="text-align: center">update post</h2>
    <form action="{{route('posts.update', $post->id)}}" method="post">
      @method("put")
        @csrf
        <div class="mb-3">
            <input type="hidden" name = "user_id" value = " {{ Auth::id() }}"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" name = "title" value="{{$post->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">contact</label>
          <input type="text" name = "contact"value="{{$post->contact}}" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">edit</button>
      </form>
      @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
  </body>
</html>


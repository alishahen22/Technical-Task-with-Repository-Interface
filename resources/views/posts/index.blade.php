
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>posts</title>
    <style>
        .container{
            width: 800px;
            margin:30px auto;
        }
        a ,{
            width: 54px;
    height: 24px;
    line-height: .5;
    padding: 5px
        }
    </style>
</head>
 {{-- display error --}}
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('successDelete'))
    <div class="alert alert-danger">
        {{ session()->get('successDelete') }}
    </div>

    @endif
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addposts">
    Add new post
  </button>
  <br><br>


    <table  class="table table-striped">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>posted by</th>

            <th colspan="4">Actions</th>

            </tr>

            @forelse ($posts as $post)
        <tr>

            <td>{{$loop->index+1}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->contact}}</td>
            <td>{{$post->user->name}}</td>

        <td>
            <a  class="btn btn-success" href="{{ route('posts.show',$post->id) }}">view and show rating</a><td>
            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">edit</a> </td>

        </td>
        <td> <form action="{{ route('posts.destroy',$post->id) }}" method="post">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" onclick="return deleteFunction();">delete</button>
        </form></td>
        <td> <a class="btn btn-primary" href="{{ route('post.addRating',$post->id) }}">Rating</a> </td></td>

        @empty
        <h2>You don't have posts add one ..  </h2>
        </tr>

    @endforelse
    </table>





</div>


  <!-- add post model -->
  <div class="modal fade" id="addposts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/posts" method="post">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name = "user_id" value = " {{ Auth::id() }}"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                  <label for="exampleInputEmail1" class="form-label">title</label>
                  <input type="text" name = "title"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">contact</label>
                  <input type="text" name = "contact" class="form-control" id="exampleInputPassword1">
                </div>



                <button type="submit" class="btn btn-primary">create</button>
              </form>

      </div>

      <!-- Button trigger modal -->








      <script>
        function deleteFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }
       </script>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </div>

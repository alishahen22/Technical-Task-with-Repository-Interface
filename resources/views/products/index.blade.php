
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>products</title>
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproducts">
    Add new product
  </button>
  <br><br>


    <table  class="table table-striped">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>description</th>


            <th colspan="4">Actions</th>

            </tr>

            @forelse ($products as $product)

        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->Description}}</td>

        <td>
            <a  class="btn btn-success" href="{{ route('products.show',$product->id) }}">view and show rating</a><td>
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">edit</a> </td>

        </td>
        <td> <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" onclick="return deleteFunction();">delete</button>
        </form></td>
        <td> <a class="btn btn-primary" href="{{ route('prduct.addRating',$product->id) }}">Rating</a> </td></td>
        @empty
        <h2>You don't have products add one ..  </h2>
        </tr>

    @endforelse
    </table>





</div>
  <!-- add product model -->
  <div class="modal fade" id="addproducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/products" method="post">
                @csrf
                <div class="mb-3">

                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" name = "title"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Description</label>
                  <input type="text" name = "Description" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" name = "Price" class="form-control" id="exampleInputPassword1">
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

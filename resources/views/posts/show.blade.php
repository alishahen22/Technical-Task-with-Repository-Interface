
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<div class="a">
<ul class="list-group list-group-flush">
    <li class="list-group-item">id :{{$post->id}}</li>
    <li class="list-group-item">tittle : {{$post->title}}</li>
    <li class="list-group-item">description : {{$post->contact}}</li>
    <li class="list-group-item">posted by  : {{$post->user->name}}</li>
  </ul>
  <h2 style="text-align: center">show All Ratings</h2>


  <table  class="table table-striped">
    <tr>
        <th>#</th>
        <th>score</th>
        <th>review</th>

        </tr>
        <tr>

            @forelse ($post->ratings as $rating)
            <td>{{$loop->index+1}}</td>
           <td>{{ $rating->score }}</td>
           <td>{{ $rating->desctiption }}</td>
              </tr>
              @empty
              <tr> <td  colspan="3">you dont have review</td></tr>

             @endforelse

</table>




</div>
<style>
    .a{
        width: 400px;
        margin: 0ch auto ;
        border: 1px solid #0000001a
    }
</style>

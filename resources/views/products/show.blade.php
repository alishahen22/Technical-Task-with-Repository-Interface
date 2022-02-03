

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>

 <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
    <style>


    .view{
        width: 1100px;
        margin: 0ch auto ;
        border: 1px solid #0000001a
    }
</style>

<body>
    <div class="view">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">id :{{$product->id}}</li>
            <li class="list-group-item">tittle : {{$product->title}}</li>
            <li class="list-group-item">description : {{$product->Description}}</li>
            <li class="list-group-item">price  : {{$product->Price}}</li>
          </ul>

          <table  class="table table-striped">
            <tr>
                <th>#</th>
                <th>score</th>
                <th>review</th>



                </tr>
                <tr>
                            <h2 style="text-align: center">show All Ratings</h2>
                    @forelse ($product->ratings as $rating)
                    <td>{{$loop->index+1}}</td>
                   <td>{{ $rating->score }}</td>
                   <td>{{ $rating->desctiption }}</td>
                      </tr>
                      @empty
                      <tr> <td  colspan="3">you dont have review</td></tr>

                     @endforelse


        </table>

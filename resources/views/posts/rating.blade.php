
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


	<nav class="navbar navbar-default">

	</nav>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('post.storeRating',$id) }}" method="post">
        @csrf
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary"> Rating</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div>

				<span id="1" style="font-size:45px; cursor:pointer;"  class="fa fa-star" onmouseover="startRating(this)" startRating="starmark(this)" ></span>
				<span id="2"  style="font-size:45px; cursor:pointer;" class="fa fa-star" onmouseover="startRating(this)" startRating="starmark(this)"></span>
				<span id="3"  style="font-size:45px; cursor:pointer;" class="fa fa-star" onmouseover="startRating(this)" startRating="starmark(this)"></span>
				<span id="4"  style="font-size:45px; cursor:pointer;" class="fa fa-star" onmouseover="startRating(this)" startRating="starmark(this)"></span>
				<span id="5"  style="font-size:45px; cursor:pointer;" class="fa fa-star" onmouseover="startRating(this)" startRating="starmark(this)"></span>
			</div>
			<br />
			<div class="form-group">
				<h3>Review:</h3>
				<textarea id="review" class="form-control" name="description" style="resize:none; height:100px;"></textarea>
			</div>
            <input type="hidden" id="score" name="rate" value=""> <br>
			<center><button class="btn btn-success" onclick="result()">SUBMIT</button></center>
		<br></div>
	</div>
</form>
</div>

<script >
	var count = 0;

function result(){
	if(count != 0){
		document.getElementById('score').value = count ;
	}
}

function startRating(item){
	count=item.id[0];
	sessionStorage.star = count;
	for(var i=0;i<5;i++){
		if(i < count){
			document.getElementById((i+1)).style.color="yellow";
		}
		else{
			document.getElementById((i+1)).style.color="black";
		}
	}
}
</script>
</body>
</html>

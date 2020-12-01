<div class="text-center">
    <h1>Info Pokemon</h1>
</div>
<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/'.$show->src)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">nom: {{$show->nom}}</h5>
          @if ($show->type == null)
            <p class="card-text">type: Sans Element</p>
            @else
                <p class="card-text">type: {{$show->type->type}}</p>
          @endif
          <p class="card-text">nv: {{$show->niveau}}</p>
          <a href="/pokemon/{{$show->id}}/edit" class="btn btn-success ">Edit</a>
          <form action="/pokemon/{{$show->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
    </div>
</div>
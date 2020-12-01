<div class="container mt-5">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">NOM</th>
            <th scope="col">TYPE</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pokemon as $poke)
                <tr>
                    <td>{{$poke->nom}}</td>
                    @if ($poke->type == null)
                    <td>Sans Element</td>
                        @else
                        <td>{{$poke->type->type}}</td>
                    @endif
                    <td><a class="btn btn-success" href="/pokemon/{{$poke->id}}">Show</a></td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container mt-5 text-center">
    <h1 class="mt-5">Création du type</h1>
    <form action="/type" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="type">type
                <input type="text" name="type" class="form-control" id="type">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Crée le type</button>
    </form>
</div>

<div class="container mt-5 text-center">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">TYPE</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($type as $ty)
                <tr>
                    <th>{{$ty->id}}</th>
                    <td>{{$ty->type}}</td>
                    <td><form action="/type/{{$ty->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
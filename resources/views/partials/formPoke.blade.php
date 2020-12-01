<div class="container mt-5 text-center">
    <h1 class="mt-5">Création du Pokemon</h1>
    <div class="container w-25">
        <form action="/pokemon" method="post" enctype="multipart/form-data">
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
                    <label for="nom">nom</label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>
                <div class="form-group">
                    <label for="type_id">type</label>
                    <select class="form-control" name="type_id" id="type_id">
                      @foreach ($type as $ty)
                        <option value="{{$ty->id}}">{{$ty->type}}</option> 
                      @endforeach  
                    </select>
                </div>
                <div class="">
                    <label for="src">image</label>
                    <input type="file" name="src" class="" id="src">
                </div>
                <div class="form-group">
                    <label for="niveau">niveau</label>
                    <input type="integer" name="niveau" class="form-control" id="niveau">
                </div>
                <button type="submit" class="btn btn-primary">Crée Pokemon</button>
        </form>
    </div>
</div>
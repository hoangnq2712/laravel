<!DOCTYPE html>
<html>
<head>
    <title>Kaopiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="container mt-100">
    <div class="panel panel-primary">
        <form action="{{route('eloquent1')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Eloquent part 1</label>
                        <input type="text" class="form-control" name="key" placeholder="eloquent1">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Search 1</button>
        </form>
    </div>

    <div class="panel panel-primary mt-5">
        <form action="{{route('eloquent2')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">User ID</label>
                        <input type="text" class="form-control" name="user_id" placeholder="User id">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role Name</label>
                        <input type="text" class="form-control" name="role_name" placeholder="Role name">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-success">Search 2</button>
        </form>
    </div>

    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($dataSearch))
            @foreach($dataSearch as $data)
                <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->first_name}} {{$data->last_name}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

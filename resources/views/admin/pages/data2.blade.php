<div class="table-responsive"> 
<table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">FilmID</th>
                <th scope="col">Title</th>
                <th scope="col">Directors Name</th>
                <th scope="col">Price</th>
                <th scope="col">Release Year</th>
                <th scope="col">Watch Length</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $value )
                <th scope="row">{{ $value->id}} </th>
                <td>{{ $value->title}}</td>
                <td>{{ $value->director->name}} </td>
                <td>{{ $value->price}}</td>
                <td>{{ $value->releaseYear}}</td>
                <td>{{ $value->movieLength }}</td>
               <td> <a href="create/{{  $value->id}}" class="btn btn-warning">Edit</a> </td>
    
               <td> 
               @csrf

                <button class="btn btn-danger" data-id="{{$value->id}}"
                 id="delete">delete</button></td>
              </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <br/>{!! $data->render() !!}
        
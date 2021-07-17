

<div class="container">
  <h2>{{ trans('messages.TraineeFree') }}</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> {{ trans('messages.Name') }}</th>
        <th scope="col"> {{ trans('messages.Email') }}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $list)
        <tr>        
            <td scope="row">{{ $list->name}}</td>
            <td scope="row">{{ $list->email}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

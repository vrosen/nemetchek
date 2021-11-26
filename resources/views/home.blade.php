@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="margin-top: 60px;">

      <div class="container">
        <div class="row gx-0 mt-5">

          <div class="col-lg-12 d-flex flex-column justify-content-center">
              <h2>To do list</h2>
          </div>
        </div>
        @if(!empty($todos))
      <div class="row gx-0 mt-5">

        <div class="col-md-12">
            @foreach($todos as $todo)
            <a href="{{ route('todo.view',$todo->id) }}" target="_blank">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title" style="color: black;">{{ $todo->name }}</h5>
              </div>
            </div>
          </a>
            @endforeach
        </div>
          <div class="col-md-12 mt-5">
          {{ $todos->links() }}
        </div>
      </div>


      </div>
      @endif
    </section>


@endsection

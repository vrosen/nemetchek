@extends('layouts.app')

@section('content')

<section id="about" class="about" style="margin-top: 60px;">

  <div class="container">
    <div class="row gx-0 mt-5">

      <div class="col-lg-12 d-flex flex-column justify-content-center">
        <h2>To do list #{{ $todo->name }}</h2>
      </div>
    </div>
    <div class="row gx-0 mt-5">
      <div class="col-lg-12 text-center">
        <a href="{{ route('item.create', $todo->id) }}" type="button" class="btn btn-primary">{{ __('Add new item') }}</a>
      </div>
    </div>


    <div class="row gx-0 mt-5">
      <div class="col-lg-12 text-center">
        <div class="alert alert-success alert-dismissible fade show" id="updateAlert" role="alert" style="display: none;">
          <a href="javascript:" class="close" data-dismiss="alert" aria-label="Close">
            <span>{{ __('Item updated') }}</span>
          </a>
        </div>
      </div>
    </div>

    @if(!empty($todo->items))
    <div class="row gx-0 mt-5">
      <input type="hidden" id="changeItemStatusUrl" value="{{ route('item.status', 0) }}">
      <div class="col-md-12">
        @foreach($todo->items as $item)
        <div class="card mt-3">

          <div class="card-body">
            <div class="row">
              <div class="col-1 col-sm-1">
                <input type="checkbox" name="done" class="form-check-input item_done" data-id="{{ $item->id }}" {{ (old() ? old('done', false) : $item->done ?? false) ? 'checked' : '' }} />
              </div>
              <div class="col-9 col-sm-9">
                <h5 class="card-title">{{ $item->name }}</h5>
              </div>
              @if (Auth::check())
              <div class="col-1 col-sm-1">
                <a href="{{ route('item.edit', $item->id) }}" type="button" class="btn btn-success" target="_blank">{{ __('Edit') }}</a>
              </div>
              <div class="col-1 col-sm-1">
                <form action="/item/delete/{{ $item->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-danger">{{ __('Delete') }}</button>
                </form>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>


  </div>
  @endif
</section>


@endsection
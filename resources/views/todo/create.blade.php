@extends('layouts.app')

@section('content')

<section id="about" class="about" style="margin-top: 60px;">

  <div class="container">
    <div class="row gx-0 mt-5">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form method="POST" action="{{ route('todo.store') }}" accept-charset="UTF-8" class="col-12">
          @csrf
          <div class="form-group">
            <label for="name" class="control-label required">{{ __('Title') }}</label>
            <input class="form-control mt-1" required="required" minlength="2" maxlength="100" name="name" type="text" id="name" autocomplete="off">
          </div>
          <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
          </div>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

</section>

@endsection
@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          {{ $book->title }}
        </div>

        <div class="panel-body">
          <!-- Display Validation Errors -->
          @include('common.errors')

          <!-- New Book Form -->

          {{ csrf_field() }}


          <div class="content">

            <div class="form-group">
              <label for="task-name" class="control-label">感想または学び</label>
              <div class="text-box">
              {{ $book->body }}
              </div>
            </div>
            <div class="form-group">
              <div>
                <label for="task-name" class="control-label">本から得たことでやってみたいこと</label>
                <div class="text-box">
                {{ $book->todo }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="task-name" class="control-label">この日までにやりたい</label>

              <div class="text-box">
              {{ $book->limit }}
              </div>
            </div>
          </div>

            <!-- Add Book Button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button class="btn btn-default">
                  <a href="{{ $book->id }}/update">
                    <i class="fa fa-edit"></i>編集する
                  </a>
                </button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
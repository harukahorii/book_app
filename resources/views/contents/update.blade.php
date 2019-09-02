@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          Edit Contents
        </div>

        <div class="panel-body">
          <!-- Display Validation Errors -->
          @include('common.errors')

          <!-- New Book Form -->
          <form action="/book/{{ $book->id }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Book Name -->
            <div class="form-group">
              <label for="task-name" class="col-sm-3 control-label">Book</label>

              <div class="col-sm-6">
                <input type="text" name="title" id="book-name" class="form-control" value="{{ $book->title }}">
                
              </div>
            </div>

            <div class="form-group">
              <label for="task-name" class="col-sm-3 control-label">感想または学び</label>

              <div class="col-sm-6">
                <textarea type="text" name="body"  class=" big-box">{{ $book->body }}
                </textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="task-name" class="col-sm-3 control-label">本から得たことでやってみたいこと</label>

              <div class="col-sm-6">
                <textarea type="text" name="todo"  class=" big-box">{{ $book->todo }}
                </textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="task-name" class="col-sm-3 control-label">いつまでにやる？</label>

              <div class="col-sm-6">
                <input type="date" name="limit"  class="form-control" value="{{ $book->limit }}">
              </div>
            </div>


            <!-- Add Book Button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-plus"></i>内容を変更する
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          New Book
        </div>

        <div class="panel-body">
          <!-- Display Validation Errors -->
          @include('common.errors')

          <!-- New Book Form -->
          <form action="/book" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            
            <div class="content">

              <div class="form-group">
                <label for="task-name" class="control-label">感想または学び</label>
                <div class="text-box">
                  <textarea type="text" name="body" value="{{ old('book') }}">
                  </textarea>
                </div>
              </div>
              <div class="form-group">
                <div>
                  <label for="task-name" class="control-label">本から得たことでやってみたいこと</label>
                  <div class="text-box">
                    <textarea type="text" name="todo" value="{{ old('book') }}">
                    </textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="task-name" class="control-label">この日までにやりたい</label>

                <div class="text-box">
                  <input type="date" name="limit"  class="form-control" value="{{ old('book') }}">
                </div>
              </div>
            </div>

            <!-- Add Book Button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-edit"></i>編集する
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
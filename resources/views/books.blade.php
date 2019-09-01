@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="btn-green">
			<a href="contents/new" class="btn btn-outline-success btn-green">
				{{ __('本を投稿する') }}
			</a>
		</div>
		<div class="col-sm-offset-2 col-sm-8">
			
			

			<!-- Books -->
			@if (count($books) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						書籍一覧
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Book</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($books as $book)
									<tr>
										<td class="table-text">
											<a href="/contents/{{ $book->id }}">{{ $book->title }}</a>
										</td>

										<!-- Task Delete Button -->
										<td>
											<form action="/book/{{ $book->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>削除
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
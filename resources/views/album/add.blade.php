@extends('layouts.apps')

@section('content')
<ul class="breadcrumb">
	<li>
		<a href="{{ url('home') }}">Album</a>
	</li>
	<li>
		<a class="active">Add Album</a>
	</li>
</ul>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	Add New Album
</button>
<a href="{{ url('album/pdf') }}">
<button class="btn btn-primary btn-lg pull-right">
	PDF
</button>
</a>
<!-- START PAGE CONTENT -->

	<!-- MODAL STICK UP  -->
	<div class="modal fade stick-up in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
					</button>
					<h5>Add <span class="semi-bold">New Album</span></h5>
					<p>Enjoy for your experience</p>
				</div>
				<div class="modal-body">
					<form role="form" method="POST" autocomplete="off" action="{{ route('save') }}" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group-attached">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Name of Album</label>
										<input type="text" class="form-control" name="name" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group form-group-default">
										<label>Artist</label>
										<input type="text" class="form-control" name="artist">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group form-group-default form-group-default-select2">
										<label>Category Artist</label>
										<select class="full-width select2-offscreen" placeholder-data="" data-init-plugin="select2" tabindex="-1" title="" name="category_artist">
											<option value="boyband">Boyband</option>
											<option value="girlband">Girlband</option>
											<option value="solo">Solo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group form-group-default input-group col-sm-10">
										<label>Release Date</label>
										<input type="date" class="form-control" id="datepicker-component2" name="year">
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group form-group-default form-group-default-select2">
										<label>Genre Music</label>
										<select class="full-width select2-offscreen" placeholder-data="" data-init-plugin="select2" tabindex="-1" title="" name="genre_music">
											<option>Pop</option>
											<option>Hip Hop</option>
											<option>Rock</option>
											<option>RnB</option>
											<option>Jazz</option>
											<option>Other</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default input-group col-sm-10">
										<label>Main Track</label>
										<input type="text" class="form-control" name="track"></input>
										<span class="input-group-addon">
											<i class="fa fa-add"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="row">
								<input type="file" name="img"></input>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 m-t-10 sm-m-t-10 pull-right">
								<button type="submit" class="btn btn-primary btn-block m-t-5">Submit</button>
							</div>
						</div>
					</form>
					<script>
						var form = document.getElementById('upload');
						var request = new XMLHttpRequest();

						form addEventListener('submit', function(e){
							e.preventDefault();
							var formdata = new FormData(form);

							request.open('post', '/upload');
							request.addEventListener("load", transferComplete);
							request.send(formdata);
						});

						function transferComplete(data){
							console.log(data.currentTarget.response);
							
						}
					</script>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- END MODAL STICK UP  -->


<!--Index-->
<div class="table-responsive">
	<div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">
	<table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
		<thead>
			<tr role="row">
				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Name of Album</th>
				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Artist</th>
				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Category Artist</th>

				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Realase Date</th>

				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Genre Music</th>

				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Main Track</th>

				<th style="width: 182px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Action</th>
			</tr>
		</thead>
		@foreach($album as $key)
		<tbody>    
			<tr role="row" class="odd">
				<td class="v-align-middle sorting_1">
					<p>{{$key->name}}</p>
				</td>
				<td class="v-align-middle">
					<p>{{$key->artist}}</p>
				</td>
				<td class="v-align-middle">
					<p>{{$key->category_artist}}</p>
				</td>
				<td class="v-align-middle">
					<p>{{$key->year}}</p>
				</td>
				<td class="v-align-middle">
					<p>{{$key->genre_music}}</p>
				</td>
				<td class="v-align-middle">
					<p>{{$key->track}}</p>
				</td>
				<td class="v-align-middle">
				<a href="{{ route('edit', $key->id) }}"><button class="btn btn-info"><i class="fa fa-search"></i></button></a>

					<button class="btn btn-danger" data-toggle="modal" data-target="#modal"><i class="fa fa-trash-o"></i></button></button>
					<div class="modal fade bd-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span></button>
									<h4 class="modal-title">Confirmation</h4>
								</div>
								<div class="modal-body text-center m-t-20">
									<h5 class="no-margin p-b-10" style="color: grey;">Are You Sure Want To Delete?</h5>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
									<a href="{{ url('delete/'.$key->id) }}">
										<button type="button" class="btn btn-primary">Yes</button>
									</a>
								</div>
							</div>
						</div>    
					</div>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
	</div>
</div>

<!--Edit-->
<div class="modal fade stick-up in" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
					</button>
					<h5>Add <span class="semi-bold">New Album</span></h5>
					<p>Enjoy for your experience</p>
				</div>
				<div class="modal-body">
					@foreach($album as $key)
					<form role="form" method="POST" autocomplete="off" action="{{ url('add') }}">
						{{ csrf_field() }}
						<div class="form-group-attached">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Name of Album</label>
										<input type="text" class="form-control" name="name" value="{{$key->name}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group form-group-default">
										<label>Artist</label>
										<input type="text" class="form-control" name="artist" value="{{$key->artist}}">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group form-group-default form-group-default-select2">
										<label>Category Artist</label>
										<select class="full-width select2-offscreen" placeholder-data="" data-init-plugin="select2" tabindex="-1" title="" name="category_artist" value="{{$key->category_artist}}">
											<option value="boyband">Boyband</option>
											<option value="girlband">Girlband</option>
											<option value="solo">Solo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group form-group-default input-group col-sm-10">
										<label>Release Date</label>
										<input type="date" class="form-control" id="datepicker-component2" name="year" value="{{$key->year}}">
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group form-group-default form-group-default-select2">
										<label>Genre Music</label>
										<select class="full-width select2-offscreen" placeholder-data="" data-init-plugin="select2" tabindex="-1" title="" name="genre_music" value="{{$key->genre_music}}">
											<option>Pop</option>
											<option>Hip Hop</option>
											<option>Rock</option>
											<option>RnB</option>
											<option>Jazz</option>
											<option>Other</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default input-group col-sm-10">
										<label>Tracks</label>
										<input type="text" class="form-control" name="track" value="{{$key->track}}"></input>
										<span class="input-group-addon">
											<i class="fa fa-add"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="row">
							<div class="col-sm-4 m-t-10 sm-m-t-10 pull-right">
								<button type="submit" class="btn btn-primary btn-block m-t-5">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- END MODAL STICK UP  -->

	<script type="text/javascript">
		$('.cancel_modal').click(function() {
   //alert('called');
    // we want to copy the 'id' from the button to the modal
    var href = $(album).data('target');
    var id = $(album).data('id');

    // since the value of href is what we want, so I just did it like so
    alert(href);
    // used it as the selector for the modal
    alert(id);
    $(href).data('id', id);
});
	</script>
@endsection
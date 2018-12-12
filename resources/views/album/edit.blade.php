@extends('layouts.apps')

@section('content')
<ul class="breadcrumb">
	<li>
		<a href="{{ url('home') }}">Album</a>
	</li>
	<li>
		<a class="active">Update Album</a>
	</li>
</ul>

<div class="row">
	<div class="col-sm-4">

		<img width="350px" height="350px" src="{{asset('foto/'.$album->img)}}">
	
	</div>
	<div class="col-sm-8">
		<form class="form-horizontal" method="POST" role="form" action="{{ route('update', $album->id)}}">
		{{ csrf_field() }}
			<div class="form-group">
				<label for="position" class="col-sm-3 control-label">Name of Album</label>
				<div class="col-sm-9">
					<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="position" value="{{ $album->name }}" required="" aria-required="true">

					 	@if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
				</div>
			</div>
			<div class="form-group">
				<label for="position" class="col-sm-3 control-label">Artist</label>
				<div class="col-sm-9">
					<input type="text" name="artist" class="form-control" id="position" value="{{ $album->artist }}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group ">
				<label for="position" class="col-sm-3 control-label">Category Artist</label>
				<div class="col-sm-9">
					<div class="select2-container full-width" id="s2id_autogen1">
						<select class="full-width select2-offscreen" name="category_artist" data-init-plugin="select2" tabindex="-1" title="" value="{{ $album->category_artist}}">
							<option value="boyband">Boyband</option>
							<option value="girlband">Girlband</option>
							<option value="solo">Solo</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="position" class="col-sm-3 control-label">Release Date</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" name="year" id="position" value="{{ $album->year }}" required="" aria-required="true">
				</div>
			</div>
		<div class="form-group ">
			<label for="position" class="col-sm-3 control-label">Genre Music</label>
				<div class="col-sm-9">
					<div class="select2-container full-width" id="s2id_autogen1">
						<select class="full-width select2-offscreen" name="genre_music" data-init-plugin="select2" tabindex="-1" title="" value="{{ $album->genre_music}}">
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
		<div class="form-group">
				<label for="position" class="col-sm-3 control-label">Main Track</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="track" id="position" value="{{ $album->track }}" required>
				</div>
			</div>
		<br>
		<div class="row">
	
				<button class="btn btn-info pull-right" type="submit">Submit</button>
			
		</div>
	</form>
</div>
</div>
@endsection
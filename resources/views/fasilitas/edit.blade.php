@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Edit Fasilitas</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('fasilitas.update',$fasilitas->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_fasilitas') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama fasilitas</label>
			  			<input type="text" name="nama_fasilitas" class="form-control" value="{{ $fasilitas->nama_fasilitas }}"  required>
			  			@if ($errors->has('nama_fasilitas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_fasilitas') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>
			  			<div class="row">
			  				<div class="col s6">
			  					<img src="{{ asset('assets/admin/images/icon/'.$fasilitas->foto )}}" style="max-width: 200px; max-height: 200px; float: left;"/>
			  				</div>
			  			</div><br>
			  			<input type="file" name="foto" class="form-control" value="{{ $fasilitas->foto }}"  required>
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kategorif_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>	
			  			<select name="kategorif_id" class="form-control">
			  				@foreach($kategorifs as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKategorif == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_fasilitas }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategorif_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategorif_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
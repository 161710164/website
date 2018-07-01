@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Edit Guru</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('guru.update',$gurus->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
        			<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>
			  			<div class="row">
			  				<div class="col s6">
			  					<img src="{{ asset('assets/admin/images/icon/'.$gurus->foto )}}" style="max-width: 200px; max-height: 200px; float: left;"/>
			  				</div>
			  			</div><br>
			  			<input type="file" name="foto" class="form-control" value="{{ $gurus->foto }}"  required>
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_guru') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Guru</label>
			  			<input type="text" name="nama_guru" class="form-control" value="{{ $gurus->nama_guru }}"  required>
			  			@if ($errors->has('nama_guru'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_guru') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jabatan') ? ' has-error' : '' }}">
			  			<label class="control-label">Jabatan</label>
			  			<input type="text" name="jabatan" class="form-control" value="{{ $gurus->jabatan }}"  required>
			  			@if ($errors->has('jabatan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jabatan') }}</strong>
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
@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Edit Prestasi</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('prestasi.update',$prestasis->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
        			<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>
			  			<div class="row">
			  				<div class="col s6">
			  					<img src="{{ asset('assets/admin/images/icon/'.$prestasis->foto )}}" style="max-width: 200px; max-height: 200px; float: left;"/>
			  				</div>
			  			</div><br>
			  			<input type="file" name="foto" class="form-control" value="{{ $prestasis->foto }}"  required>
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_prestasi') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Prestasi</label>
			  			<input type="text" name="nama_prestasi" class="form-control" value="{{ $prestasis->nama_prestasi }}"  required>
			  			@if ($errors->has('nama_prestasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_prestasi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			  			<label class="control-label">Deskripsi</label>
			  			<input type="text" name="deskripsi" class="form-control" value="{{ $prestasis->deskripsi }}"  required>
			  			@if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
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
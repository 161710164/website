@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Edit Ekskul</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('ekskul.update',$ekskuls->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_ekskul') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Ekskul</label>	
			  			<input type="text" value="{{ $ekskuls->nama_ekskul }}" name="nama_ekskul" class="form-control"  required>
			  			@if ($errors->has('nama_ekskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_ekskul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>
			  			<div class="row">
			  				<div class="col s6">
			  					<img src="{{ asset('assets/admin/images/icon/'.$ekskuls->foto )}}" style="max-width: 200px; max-height: 200px; float: left;"/>
			  				</div>
			  			</div><br>
			  			<input type="file" name="foto" class="form-control" value="{{ $ekskuls->foto }}"  required>
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('konten') ? 'has-error' : ''}}">
								<label class="control-label">konten</label>
								<textarea rows="5" name="konten" class="form-control" required>{{$ekskuls->konten}}</textarea>							
								@if ($errors->has('konten'))
									<span class="help-blocks">
										<strong>{{$errors->first('konten')}}</strong>
									</span>
								@endif
							</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
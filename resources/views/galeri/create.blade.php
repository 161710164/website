@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Tambah Galeri</b></center> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('galeri.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('judul_galeri') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul Galeri</label>	
			  			<input type="text" name="judul_galeri" class="form-control"  required>
			  			@if ($errors->has('judul_galeri'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul_galeri') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
			  			<label class="control-label">Foto</label>	
			  			<input type="file" id="foto" name="foto" class="validate" accept="image/*" required>
			  			@if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
					</div>

			  		<div class="form-group {{$errors->has('konten') ? 'has-error' : ''}}">
								<label class="control-label">Konten</label>
								<textarea rows="5" name="konten" class="form-control" required></textarea>
								@if ($errors->has('konten'))
									<span class="help-blocks">
										<strong>{{$errors->first('konten')}}</strong>
									</span>
								@endif
							</div>

			  		<div class="form-group {{ $errors->has('kategorig_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Kategori Galeri</label>	
			  			<select name="kategorig_id" class="form-control">
			  				@foreach($kategorigs as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_galeri }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategorig_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategorig_id') }}</strong>
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
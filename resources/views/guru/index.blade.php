@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b>Data Guru</b></center>
			  	<div class="panel-title pull-right"><a href="{{ route('guru.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead class="thead-dark">
			  		<tr>
			  		  <th>No</th>
			  		  <th>Foto</th>
					  <th>Nama Guru</th>
					  <th>Jabatan</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($gurus as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td><img src="{{asset('assets/admin/images/icon/'.$data->foto.'')}}" width="70" height="70"></td>
				    	<td>{{ $data->nama_guru }}</td>
				    	<td>{{ $data->jabatan }}</td>
				    	

<td>
	<a class="btn btn-warning" href="{{ route('guru.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('guru.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
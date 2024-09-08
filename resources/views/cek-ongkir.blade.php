<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cek Ongkir</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="container p-5">
		<h1 class="mb-3">Halaman Cek Ongkir</h1>

		<form action="" method="POST">
			@csrf
			<div class="mb-3">
				<label for="origin" class="form-label">Asal Kota</label>
				<select class="form-select form-select-sm mb-3" name="origin" id="origin" required="">
					<option value="">Pilih Kota Asal</option>
					@foreach($cities as $city)
					<option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="destination" class="form-label">Asal Kota</label>
				<select class="form-select form-select-sm mb-3" name="destination" id="destination" required="">
					<option value="">Pilih Kota Tujuan</option>
					@foreach($cities as $city)
					<option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="weight" class="form-label">Berat Paket</label>
				<input type="number" class="form-control" name="weight" required="">
			</div>
			<div class="mb-3">
				<label for="courier" class="form-label">Pilih Pengiriman</label>
				<select class="form-select form-select-sm mb-3" name="courier" id="courier" required="">
					<option selected>Pilih Pengiriman</option>
					<option value="jne">JNE</option>
					<option value="pos">POS</option>
					<option value="tiki">TIKI</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

		{{-- Hasil --}}
		<div class="mt-5">
			@if ($ongkir != '')
			<h3>RINCIAN ONGKIR</h3>
			<hr>
			<div class="row">
				@foreach($ongkir as $item)
				<!-- Judul Pengiriman di Luar Card -->
				<div class="col-12">
					<h4 class="mb-3">Pengiriman: {{$item['name']}}</h4>
				</div>
				@foreach($item['costs'] as $index => $cost)
				<!-- Pecah menjadi dua card -->
				<div class="col-md-6 mb-4">
					<div class="card shadow-sm h-100">
						<div class="card-body">
							<h5 class="card-title">Service: {{$cost['service']}}</h5>
							@foreach($cost['cost'] as $price)
							<p class="mb-1"><strong>Harga:</strong> Rp{{$price['value']}}</p>
							<p class="mb-1"><strong>Estimasi:</strong> {{$price['etd']}} hari</p>
							@endforeach
						</div>
					</div>
				</div>
				@endforeach
				@endforeach
			</div>
			@endif
		</div>

	</div>
</body>
</html>
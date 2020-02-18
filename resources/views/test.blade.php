@foreach($datas["rows"] as $data)
	@if($data["assigned_to"]["username"]=='leonard')
		{{$data["id"]}}
		{{$data["asset_tag"]}}
		{{$data["serial"]}}
		{{$data["assigned_to"]["username"]}}
		<br><br>
	@endif
@endforeach
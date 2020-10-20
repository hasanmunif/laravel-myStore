<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
  <div class="text-center">
    <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h5>
  </div>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Product</th>
				<th>Slug</th>
				<th>Image</th>
				<th>Price</th>
				<th>Created at</th>
				<th>Updated at</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($product as $pr)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $pr->product_title }}</td>
				<td>{{ $pr->product_slug }}</td>
				<td>{{ $pr->product_image }}</td>
				<td>{{ $pr->product_price }}</td>
				<td>{{ $pr->created_at }}</td>
				<td>{{ $pr->updated_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
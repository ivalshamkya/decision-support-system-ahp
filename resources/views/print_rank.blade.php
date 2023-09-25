<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print Data Perankingan</title>
	<style>
		/* @page {
			size: landscape;
		} */
		@media print {
			div {
				break-inside: avoid;
			}
		}


		@media print {
			@page { margin: 21px; }
			body * {
				/* visibility: hidden; */
			}

			table.printable,
			table.printable * {
				visibility: visible;
			}
		}


		table.printable {
			width: 100%;
			border-collapse: collapse;
			font-size: 8px;
		}

		table.printable th,
		table.printable td {
			padding: 0.1rem;
			border: 1px solid #000;
		}

		table.printable th {
			background-color: #f2f2f2;
			font-weight: bold;
		}

		table.printable tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		table.printable td {
			text-align: center;
		}

		tr {
			page-break-inside: avoid;
		}

		.text-center{
			text-align: center;
		}
		.m-0 {
			margin: 0;
		}
	</style>
</head>

<body>
	<br>

	<section style="padding: 0 50px;">
		<center>
			<h4 style="text-transform: uppercase;">Data Perankingan</h4>
		</center>
	</section>
	
	<section style="padding: 0 50px;">
		<table border="1" class="printable">
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Hasil Rekomendasi</th>
			</tr>
	
		    @foreach ($keputusan as $rank)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rank->nis }}</td>
                    <td>{{ $rank->nama }}</td>
                    <td>{{ $rank->kelas }}</td>
                    <td>{{ $rank->nama_jurusan }}</td>
                </tr>
            @endforeach
		</table>
	</section>
	
	<br><br>

	<script type="text/javascript">
		window.print();
	</script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print Data Sub Domain</title>
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
	<section style="padding: 0 50px;">
        <table class="w-full text-sm text-left row-border text-gray-500 divide-y divide-gray-300" id="myTable">
            <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-5">
                        No
                    </th>
                    <th scope="col" class="px-6 py-5">
                        NIS
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Hasil Rekomendasi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">1</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">111111</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Test</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Test</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Test</td>
                </tr>
            </tbody>
        </table>
    </section>

	<script type="text/javascript">
		window.print();
	</script>

</body>

</html>
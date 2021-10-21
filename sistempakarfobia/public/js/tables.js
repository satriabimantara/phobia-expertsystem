$(document).ready(function(){
	/*INPUT DATA PAGE*/
	function inputDataTable(object){
		for (const keys in object) {
			$(object[keys].id).DataTable({
				scrollX: 550,
				scrollY: 550,
				"processing": true,
				autoWidth :false,
				"lengthMenu":[-1],
				buttons: [
				{
					extend :'pdfHtml5',
					className : 'btn-success',
					orientation :'landscape',
					text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
					title: object[keys].title,
					extension: ".pdf",
					filename: object[keys].filename
				}
				],
				"dom": `
				<'d-flex justify-content-between mb-3 btn-sm' fB> +
				<'mb-3' t> +
				<'d-flex justify-content-start mb-5 mt-3'p>
				`
			});
		}
	}
	const table = {
		table1 : {
			id : "#table_konsultasi",
			title : "Daftar Aturan Fobia-Gejala",
			filename : "Daftar Aturan Fobia-Gejala"
		},
		table2 : {
			id : "#table_riwayat_konsultasi",
			title : "Daftar Riwayat Konsultasi",
			filename : "Daftar Riwayat Konsultasi"
		},
		
	};
	inputDataTable(table);
});
$(document).ready(function(){
	/*INPUT DATA PAGE*/
	function inputDataTable(object){
		for (const keys in object) {
			$(object[keys].id).DataTable({
				scrollX: 550,
				scrollY: 550,
				"processing": true,
				autoWidth :false,
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
				<'d-flex justify-content-between mb-3 btn-sm' fl> +
                <'d-flex justify-content-end' B>+
				<'mb-3' t> +
				<'d-flex justify-content-start mb-5 mt-3'p>
				`
			});
		}
	}
	const table = {
		table1 : {
			id : "#table_pakar",
			title : "Daftar Pakar",
			filename : "Daftar Pakar"
		},
		table2 : {
			id : "#table_fobia",
			title : "Daftar Fobia",
			filename : "Daftar Fobia"
		},
		table3:	{
			id : "#table_daftargejala",
			title : "Daftar Gejala",
			filename : "Daftar Gejala"
		},
		table4:{
			id : "#table_daftarrule",
			title : "Daftar Rule Fobia Gejala",
			filename : "Daftar Rule Fobia Gejala"
		},
		table5:{
			id : "#table_daftaradmin",
			title : "Daftar Admin",
			filename : "Daftar Admin"
		},
		table6:{
			id : "#table_user",
			title : "Daftar User",
			filename : "Daftar User"
		},
		table7:{
			id : "#table_konsultasi",
			title : "Daftar Konsultasi",
			filename : "Daftar Konsultasi"
		}
	};
	inputDataTable(table);
	
});
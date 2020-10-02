
// Tables-DataTables.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - squaredesigns.net -



$(window).on('load', function() {


	// DATA TABLES
	// =================================================================
	// Require Data Tables
	// -----------------------------------------------------------------
	// http://www.datatables.net/
	// =================================================================

	$.fn.DataTable.ext.pager.numbers_length = 5;


	// Basic Data Tables with responsive plugin
	// -----------------------------------------------------------------
	$('#demo-dt-basic').dataTable( {
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		}
	} );


});

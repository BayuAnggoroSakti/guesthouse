/*
Name: 			Tables / Ajax - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	4.0.0
*/

(function($) {

	'use strict';

	var datatableInit = function() {

		var $table = $('#datatable-users');
		$table.dataTable({
        /* No ordering applied by DataTables during initialisation */
        "order": []
    });

	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);
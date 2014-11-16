$('document').ready(function() {


	$('.nav li a').click(function() {
		console.log('page = ' + $(this).attr('href'));
		var url = $(this).attr('href');
		var title = $(this).attr('title');
		window.history.pushState({"pageTitle": title},"", url);

	});

	
	var url = document.location.toString();

	if (url.match('#')) {
	    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
	} 
	/*
	var tabselected = url.split('#')[1];
	$('#MedicusCordaTab a:first').tab('show');
	if(tabselected !== undefined) {
		$('#MedicusCordaTab a:first').tab('show');
		
		$('.tab-pane').each( function(){
			if($(this).attr('id') !== tabselected) {
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');
			}
		});
		
		$('#MedicusCordaTab.nav-tabs li').each( function() {
			if($(this).hasClass(tabselected + "Link")) {
				$(this).addClass('active');
			} else {
				$(this).removeClass('active');	
			}

		});
	
	}

*/
	$('.nav-tabs a').on('shown', function (e) {
	    window.location.hash = e.target.hash;
	})
	
});
$j = jQuery.noConflict();		
		$j( document ).ready(function() {	
			$j('.left, .tabs li a, .footer ul li a, .bg-white.pricing-plan-block a,.button.orange.large.round.push-20').attr('onclick','').unbind('click');
			
			
			$j(".inlinemenu > .graybar").click(function() {
            	$j(".inlinemenu > .menu-main-menu-container > ul").toggle();
        	});

			
});
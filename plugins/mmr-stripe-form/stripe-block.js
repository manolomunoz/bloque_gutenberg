( function( blocks, element, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	var blockStyle = {
		backgroundColor: '#000000',
		color: '#fff',
		padding: '20px',
	};

	blocks.registerBlockType( 'gutenberg-manolo/stripe-forms', {
		title: 'Stripe forms',
		icon:  'universal-access-alt',
		category: 'layout',
		example: {},
		edit: function() {
			return el(
				'p',
				{ style: blockStyle },
				'Stripe form'
			);
		},
		save: function() {
			return el(
				'iframe',
				{ 
					src: custom_data.siteUrl+'/?gutenbergstripeform',
					frameborder: 0
				 },
				''
			);
		},
	} );

}(
	window.wp.blocks,
	window.wp.element,
	window.wp.i18n
) );
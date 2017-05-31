<?php
/**
 * The template for displaying the footer
 *

 */
?>
<?php include 'template/footer.php'; ?>

<script type="text/javascript">
jQuery(document).ready(function(){
	
	///// SIDEBAR: ACCORDION /////
	jQuery('#accordion').accordion({autoHeight: false});
	
	///// SIDEBAR: TABS /////
	jQuery('#sidebartabs').tabs({ fx: { opacity: 'toggle', duration: 'fast' } });	
	
	///// PLACEHOLDER FIX FOR IE /////
	$(function() {
		var input = document.createElement("input");
		if(('placeholder' in input)==false) { 
			$('[placeholder]').focus(function() {
				var i = $(this);
				if(i.val() == i.attr('placeholder')) {
					i.val('').removeClass('placeholder');
					if(i.hasClass('password')) {
						i.removeClass('password');
						this.type='password';
					}			
				}
			}).blur(function() {
				var i = $(this);	
				if(i.val() == '' || i.val() == i.attr('placeholder')) {
					if(this.type=='password') {
						i.addClass('password');
						this.type='text';
					}
					i.addClass('placeholder').val(i.attr('placeholder'));
				}
			}).blur().parents('form').submit(function() {
				$(this).find('[placeholder]').each(function() {
					var i = $(this);
					if(i.val() == i.attr('placeholder'))
						i.val('');
				})
			});
		}
	});

	///// FORM VALIDATION /////
	jQuery(".newsletterform").validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true,
			},
		},
		messages: {
			email: "Please enter a valid email address",
		}
	});
	
	///// FORM SUBMIT /////
	jQuery('.newsletterform').submit(function(){
		if(jQuery(this).valid()) {							   
			var formdata = jQuery(this).serialize();
			var url = jQuery(this).attr('action');
			jQuery.post(url,formdata,function(data){
				jQuery('.successmsg').append(data).fadeIn();
			});

        $('.newsletterform').hide(); ///// HIDE FORM IF MESSAGE IS SENT /////

		}
		return false;
	});

	
});
</script>

<?php wp_footer(); ?>
</body>
</html>

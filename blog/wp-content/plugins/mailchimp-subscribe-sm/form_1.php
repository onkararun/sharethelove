<style type="text/css">

	body{
		background: #e3e3e3;
	}
	#sm_wrapper{
		width:100%;
		min-width: 230px;
		border-radius: 5px;
		padding: 5px;
		margin: 0 auto;
	}
	#sm_top{
		background: #ECEEAD;
	}
	#sm_top li{
		list-style:none;
		margin-left: 5%;
		font-family: helvetica,sans-serif;
		font-size: 25px;
		font-weight: bold;
		padding:15px 0 10px 0;
	}
	#sm_content{
		background: #fff;
		border-bottom: 1px solid #d0d0d0;
	
	}
	#sm_content > p{
		font-size: 16px;
		font-family: helvetica,sans-serif;
		padding: 15px 5px 10px 5%;
		line-height: 1.8;

	}

	#sm_form > input[type="submit"], 
	#sm_form > input[type="button"]{

		margin: 0 ;
		border: none !important;
		color: #fff !important;
		font-size: 18px !important;
		margin-left: 1% !important;
		font-family: helvetica,sans-serif;

		background-color: rgb(122,188,255) !important;
		background: rgb(122,188,255) !important; /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(122,188,255,1) 0%, rgba(96,171,248,1) 44%, rgba(64,150,238,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(122,188,255,1)), color-stop(44%,rgba(96,171,248,1)), color-stop(100%,rgba(64,150,238,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* IE6-9 */

	} 
	#sm_form > input[type="text"],input[type="email"]{
		margin: 0;
		padding: 0;
		width: 50%;
		height: 35px;
		margin-left: 5%;
		margin-bottom: 5%;
		font-size: 16px;
		font-family: helvetica,sans-serif;
	}
	
	.sm_field{
		margin: 0;
		padding: 0;
		width: 50%;
		height: 35px;
		margin-left: 5%;
		margin-bottom: 5%;
		font-size: 16px;
	}
	.sm_submit:hover{
		background-color: #4b8bcc !important;
		background: #4b8bcc !important;
	}
	.sm_submit,#sm_submit{
		margin: 0 ;
		padding:1.2% 4% 1.5% 4% !important;
		border: none !important;
		color: #fff !important;
		font-size: 18px !important;
		margin-left: -3% !important;

		background-color: rgb(122,188,255) !important;
		background: rgb(122,188,255) !important; /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(122,188,255,1) 0%, rgba(96,171,248,1) 44%, rgba(64,150,238,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(122,188,255,1)), color-stop(44%,rgba(96,171,248,1)), color-stop(100%,rgba(64,150,238,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* IE6-9 */

	}
	#sm_footer{
		font-size: 16px;
		line-height: 1.8;
		background: #e3e3e3;
		padding: 9px 0 1px 15px;
		font-family: helvetica,sans-serif;

	}
	#sm_footer p {
		margin: 0 0 7px 0;
	}
	#response{
		font-family: helvetica,sans-serif;
		font-style: italic;
		color: #E86850;
	}






	
</style>

<div id='sm_wrapper'>
	<div id='sm_top'>
	 <li><?php echo get_post_meta($post->ID,'sm_form_header',true); ?></li>		
	</div>
	<div id='sm_content'>
		<p><?php echo get_post_meta($post->ID,'sm_form_content',true); ?></p>
		<?php echo get_post_meta($post->ID,'ssm_select_data_save_method',true); ?>

			 <input type='hidden' name='ssm_sub_url' class="ssm_sub_url" value='<?php echo get_option('ssm_redirection_url'); ?>' >
			 <input type='text' id='sm_input' class='sm_field' name='sm_name' placeholder="<?php echo get_post_meta($post->ID,'sm_form_name_placeholder',true); ?>" >
			 <input type='email' id='sm_input' class='sm_field' name='sm_email' placeholder="<?php echo get_post_meta($post->ID,'sm_form_email_placeholder',true); ?>" required >
			 <input type="submit"  name="submit" value="<?php echo get_post_meta($post->ID,'sm_form_cta_text',true); ?>" class="sm_submit" id='sm_submit' />
			
			  
		</form>      
	</div>
	<div id='sm_footer'>
		<span id="response">
    	</span>
		<p><?php echo get_post_meta($post->ID,'sm_form_footer_msg',true); ?></p>
	</div>
</div>
</html>
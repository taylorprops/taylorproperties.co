<div class="row">
	<div class="col-lg-12">
		<form id="contact_form">
			@csrf
			<div class="md-form">
				<i class="fal fa-user prefix grey-text"></i>
				<input type="text" id="name" name="name" class="form-control" required="required">
				<label for="name">Your name *</label>
			</div>
			<div class="md-form">
				<i class="fal fa-envelope prefix grey-text"></i>
				<input type="email" id="email" name="email" class="form-control" required="required">
				<label for="email">Your email *</label>
			</div>
			<div class="md-form">
				<i class="fal fa-phone prefix grey-text"></i>
				<input type="tel" id="phone" name="phone" class="form-control phone" required="required">
				<label for="phone">Your phone *</label>
			</div>
			<!--Textarea with icon prefix-->
			<div class="md-form">
				<i class="fal fa-pencil prefix grey-text"></i>
				<textarea type="text" id="message" name="message" class="md-textarea form-control" rows="3" required></textarea>
				<label for="message">Your message *</label>
			</div>
			<div class="text-center mt-3">
				<button id="contact_form_submit" class="btn btn-primary waves-effect waves-light" type="submit">Send <i class="fal fa-share"></i></button>
            </div>
            <input type="hidden" id="type" value="from_agent">
		</form>
	</div>
</div>
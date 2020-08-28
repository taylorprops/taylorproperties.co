<div class="row">
	<div class="col-lg-12">
		<form class="contact-form">
            @csrf
            @php $id = rand(); @endphp
			<div class="md-form">
				<i class="fal fa-user prefix grey-text"></i>
				<input type="text" name="name" id="name_{{ $id }}" class="form-control" required="required">
				<label for="name_{{ $id }}">Your name *</label>
			</div>
			<div class="md-form">
				<i class="fal fa-envelope prefix grey-text"></i>
				<input type="email" name="email" id="email_{{ $id }}" class="form-control" required="required">
				<label for="email_{{ $id }}"">Your email *</label>
			</div>
			<div class="md-form">
				<i class="fal fa-phone prefix grey-text"></i>
				<input type="tel" name="phone" id="phone_{{ $id }}" class="form-control phone" required="required">
				<label for="phone_{{ $id }}">Your phone *</label>
			</div>
			<!--Textarea with icon prefix-->
			<div class="md-form">
				<i class="fal fa-pencil prefix grey-text"></i>
				<textarea type="text" id="message_{{ $id }}" name="message" class="md-textarea form-control" rows="3" required></textarea>
				<label for="message_{{ $id }}">Your message *</label>
			</div>
			<div class="text-center mt-3">
				<button class="btn btn-primary waves-effect waves-light contact-form-submit" type="submit">Send <i class="fal fa-share"></i></button>
            </div>
            <input type="hidden" name="type" value="buy_sell">
		</form>
	</div>
</div>
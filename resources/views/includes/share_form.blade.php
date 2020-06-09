<div class="modal fade share-modal" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary white-text">
                <h4 class="modal-title w-100" id="shareModalLabel"></h4>
                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form id="share_form" class="needs-validation container mb-0" novalidate>
                    <div class="row">
                        <div class="col-12 col-lg-6 user-logged-in">
                            <div class="md-form mb-5">
                                <i class="fal fa-user prefix primary-text"></i>
                                <input type="text" name="share_from_name" id="share_from_name" class="form-control validate" required>
                                <label for="share_from_name">Your Name</label>
                                <div class="invalid-feedback">Your name is required</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 user-logged-in">
                            <div class="md-form mb-5">
                                <i class="fal fa-envelope prefix primary-text"></i>
                                <input type="email" name="share_from_email" id="share_from_email" class="form-control validate" required>
                                <label for="share_from_email">Your Email</label>
                                <div class="invalid-feedback">A valid email is required</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="md-form mb-5">
                                <i class="fal fa-envelope prefix primary-text"></i>
                                <input type="email" name="share_to_email" id="share_to_email" class="form-control validate" required>
                                <label for="share_to_email">Send To Email</label>
                                <div class="invalid-feedback">A valid email is required</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="md-form mb-5">
                                <i class="fal fa-comment-alt prefix primary-text"></i>
                                <textarea name="share_message_add" id="share_message_add" class="md-textarea form-control" rows="1"></textarea>
                                <label for="share_message_add">Custom Message (optional)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="md-form mb-5">
                                <div id="share_message"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary" id="send_share">Send <i class="fal fa-share primary-text"></i></button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="share_type" value="listing">
                </form>
            </div>

        </div>
    </div>
</div>
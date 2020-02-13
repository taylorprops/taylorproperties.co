<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="modalRegisterFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-primary white-text">
                <h4 class="modal-title w-100 font-weight-bold">Create Account</h4>
                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="register_form" class="needs-validation container mb-0" novalidate>
                <div id="register_error">
                    <div class="alert alert-danger mt-2"" role=" alert"><i class="fal fa-exclamation-circle mr-2"></i>
                        That email address is already registered.
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="javascript: void(0)" id="already_registered_login" class="btn btn-success">Property Manager Sign In</a>
                        <a class="btn btn-link forgot-password" href="javascript: void(0)">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fal fa-user prefix grey-text"></i>
                        <input type="text" id="register_name" class="form-control validate" required>
                        <label data-error="Name is required" data-success="Looks good!" for="register_name">Your Name</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fal fa-envelope prefix grey-text"></i>
                        <input type="email" id="register_email" class="form-control validate" required>
                        <label data-error="A valid email is required" data-success="Looks good!" for="register_email">Your Email</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fal fa-phone prefix grey-text"></i>
                        <input type="tel" id="register_phone" class="form-control validate phone" required>
                        <label data-error="Phone is required" data-success="Looks good!" for="register_phone">Your Phone</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fal fa-lock prefix grey-text"></i>
                        <input type="password" id="register_password" class="form-control validate" required>
                        <label data-error="Password is required" data-success="Looks good!" for="register_password">Your Password</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary">Sign up</button>
                </div>
            </form>
            <div class="modal-footer d-flex justify-content-center">
                Already have an account? <a href="javascript: void(0)" class="btn-sm btn-orange ml-2 open-login">Login</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSignInForm" tabindex="-1" role="dialog" aria-labelledby="modalSignInFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-primary white-text">
                <h4 class="modal-title w-100 font-weight-bold">Sign In</h4>
                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="signin_form" class="needs-validation container mb-0" novalidate>
                <div id="signin_error" class="alert alert-danger mt-2" role="alert"><i class="fal fa-exclamation-circle mr-2"></i> Login Failed. Email or Password is incorrect.
                </div>

                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fal fa-envelope prefix grey-text"></i>
                        <input type="email" id="signin_email" class="form-control validate" required>
                        <label data-error="A valid email is required" data-success="Looks good!" for="signin_email">Your Email</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fal fa-lock prefix grey-text"></i>
                        <input type="password" id="signin_password" class="form-control validate" required>
                        <label data-error="Password is required" data-success="Looks good!" for="signin_password">Your Password</label>
                    </div>
                    <div class="md-form">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="signin_remember">
                            <label class="form-check-label" for="signin_remember">Remember</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Sign In">
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a class="btn btn-link forgot-password" href="javascript: void(0)">Forgot Your Password?</a>
                </div>
            </form>
            <div class="modal-footer d-flex justify-content-center">
                No account? <a href="javascript: void(0)" class="btn-sm btn-orange ml-2 open-register">Create Account</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary white-text">
                <h4 class="modal-title w-100" id="addAliasModalLabel">Reset Password</h4>
                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form id="reset_password_form" class="needs-validation container" novalidate>
                    <div id="reset_error" class="alert alert-danger mt-2" role="alert">
                        <i class="fal fa-exclamation-circle mr-2"></i> That email address was not found.
                    </div>
                    <div class="md-form mb-5">
                        <i class="fal fa-envelope prefix grey-text"></i>
                        <input type="email" id="reset_email" class="form-control validate" required>
                        <label for="reset_email">Your Email</label>
                        <div class="invalid-feedback">A valid email is required</div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary" id="reset_password" value="Reset Password">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- login type - tells login_user what to do after loggin in -->
<input type="hidden" id="active_service">
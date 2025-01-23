<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Get in touch</h1>
                <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Contacts', 'action' => 'sendContact'], 'id' => 'contactForm']) ?>
                    <!-- First name input-->
                    <div class="mb-3">
                        <?= $this->Form->control('first_name', [
                            'class' => 'form-control',
                            'label' => 'First name*',
                            'placeholder' => 'Enter your first name...',
                            'required' => true,
                            'templates' => [
                                'inputContainer' => '<div class="mb-3">{{content}}</div>',
                                'input' => '<input type="{{type}}" name="{{name}}"{{attrs}} class="form-control"/>',
                                'label' => '<label for="{{name}}" class="form-label mb-2">{{text}}</label>',
                                'error' => '<div class="invalid-feedback">{{content}}</div>'
                            ]
                        ]) ?>
                    </div>

                    <!-- Last name input-->
                    <div class="mb-3">
                        <?= $this->Form->control('last_name', [
                            'class' => 'form-control',
                            'label' => 'Last name*',
                            'placeholder' => 'Enter your last name...',
                            'required' => true,
                            'templates' => [
                                'inputContainer' => '<div class="mb-3">{{content}}</div>',
                                'input' => '<input type="{{type}}" name="{{name}}"{{attrs}} class="form-control"/>',
                                'label' => '<label for="{{name}}" class="form-label mb-2">{{text}}</label>',
                                'error' => '<div class="invalid-feedback">{{content}}</div>'
                            ]
                        ]) ?>
                    </div>

                    <!-- Email address input-->
                    <div class="mb-3">
                        <?= $this->Form->control('email', [
                            'type' => 'email',
                            'class' => 'form-control',
                            'label' => 'Email address*',
                            'placeholder' => 'name@example.com',
                            'required' => true,
                            'templates' => [
                                'inputContainer' => '{{content}}',
                                'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
                                'label' => '<label class="mb-2" {{attrs}}>{{text}}</label>',
                                'error' => '<div class="invalid-feedback" data-sb-feedback="email:required">{{content}}</div><div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>'
                            ]
                        ]) ?>
                    </div>
                    <!-- Phone number input-->
                    <div class="mb-3">
                        <?= $this->Form->control('phone_number', [
                            'type' => 'tel',
                            'class' => 'form-control',
                            'label' => 'Phone number*',
                            'placeholder' => '0123456789',
                            'required' => true,
                            'maxlength' => 10,
                            'templates' => [
                                'inputContainer' => '{{content}}',
                                'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
                                'label' => '<label class="mb-2" {{attrs}}>{{text}}</label>',
                                'error' => '<div class="invalid-feedback" data-sb-feedback="phone:required">{{content}}</div>'
                            ]
                        ]) ?>
                    </div>
                    <!-- Message input-->
                    <div class="mb-4">
                        <?= $this->Form->control('message', [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'label' => 'Message*',
                            'placeholder' => 'Enter your message here...',
                            'required' => true,
                            'style' => 'height: 10rem',
                            'templates' => [
                                'inputContainer' => '{{content}}',
                                'input' => '<textarea name="{{name}}"{{attrs}}>{{value}}</textarea>',
                                'label' => '<label class = "mb-2" {{attrs}}>{{text}}</label>',
                                'error' => '<div class="invalid-feedback" data-sb-feedback="message:required">{{content}}</div>'
                            ]
                        ]) ?>
                    </div>
                    <!-- Submit success message-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="d-grid"><?= $this->Form->button('Submit', ['class' => 'btn btn-primary btn-lg', 'id' => 'submitButton']) ?></div>
                    <?= $this->Form->end() ?>

                    <div><?=$this -> Flash -> render()?></div>
                </div>
            </div>
        </div>
        <!-- Contact cards-->
        <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
            <div class="col">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                <div class="h5 mb-2">Chat with us</div>
                <p class="text-muted mb-0">Chat live with one of our support specialists.</p>
            </div>
            <div class="col">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                <div class="h5">Ask the community</div>
                <p class="text-muted mb-0">Explore our community forums and communicate with other users.</p>
            </div>
            <div class="col">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-question-circle"></i></div>
                <div class="h5">Support center</div>
                <p class="text-muted mb-0">Browse FAQ's and support articles to find solutions.</p>
            </div>
            <div class="col">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                <div class="h5">Call us</div>
                <p class="text-muted mb-0">Call us during normal business hours at (555) 892-9403.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact">
    <div class="inner">
        <section>
            <form method="post" action="<?=url('/contact') ?>">
                @csrf
                <div class="fields">
                    <div class="field half">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="field half">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" />
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="primary" /></li>
                    <li><input type="reset" value="Clear" /></li>
                </ul>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
        </section>
        <section class="split">
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-envelope"></span>
                    <h3>Email</h3>
                    <a href="mailto:{{config('beery.emails.contact')}}">{{config('beery.emails.contact')}}</a>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-phone"></span>
                    <h3>Phone</h3>
                    <span>{{config('beery.phone')}}</span>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-home"></span>
                    <h3>Address</h3>
                    <span>
                        {{config('beery.address')}}<br />
                        {{config('beery.city')}}, CP {{config('beery.zip')}}<br />
                        {{config('beery.country')}}
                    </span>
                </div>
            </section>
        </section>
    </div>
</section>
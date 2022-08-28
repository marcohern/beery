<!-- Buy -->
<section id="payment">
    <div class="inner">
        <section>
            <form method="post" action="<?=url('/buy') ?>">
                @csrf
                <div class="fields">
                    
                    <div class="field">
                        <label for="cc-name">Credit Card Name</label>
                        <input type="text" id="cc-name" name="cc-name" autocomplete="cc-name" x-autocompletetype="cc-name" value="APPROVED">
                    </div>
                    <div class="field">
                        <label for="cc-number">Credit Card Number</label>
                        <input type="text" id="cc-num" name="cc-num" autocomplete="cc-number" x-autocompletetype="cc-number" pattern="\d*" value="4037997623271984">
                    </div>
                    <div class="field half">
                        <label for="cc-exp">Expires</label>
                        <input type="text" id="cc-exp" name="cc-exp" autocomplete="cc-exp" x-autocompletetype="cc-exp" placeholder="03/26" value="2030/12">
                    </div>
                    <div class="field half">
                        <label for="cvv2">CVV</label>
                        <input type="text" id="cvv2" name="cvv2" autocomplete="cc-csc" value="777">
                    </div>
                </div>
                <ul class="actions">
                    <li><button type="submit" class="button primary fit">Request Purchase</button></li>
                    <li><a class="button go-home">Cancel</a></li>
                </ul>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
        </section>
    </div>
</section>
<!-- Buy -->
<section id="buy">
    <div class="inner">
        <section>
            <form method="post" action="<?=url('/buy-summary-save') ?>">
                @csrf
                <input type="hidden" id="universal_price" value="8000"/>
                <h2>Flavors</h2>
                <div class="row">
                    <div id="flavor_selector" class="col-6 col-12-medium">
                        @foreach ($flavors as $k => $f)
                            <div class="row">
                                <div class="col-3">
                                    <label for="details[{{$f->code}}][qty]">{{$f->name}}</label>
                                </div>
                                <div class="col-6">
                                    <select name="details[{{$f->code}}][qty]" id="qty" class="qty fit">
                                        <option value="0:0">None</option>
                                        @foreach(config('beery_prices') as $key => $label)
                                            <option value="{{$key}}">{{$label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <span class="subtotal">$0</span>
                                </div>
                            </div>
                            <br/>
                        @endforeach
                        
                        <div class="row">
                            <div class="col-3">
                                <label>Total</label>
                            </div>
                            <div class="col-6">
                            </div>
                            <div class="col-3">
                                <span class="total"><b>$0</b></span>
                                <input type="hidden" name="total" class="total"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields">
                    <div class="field half">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" value="Marco Hernandez" required />
                    </div>
                    <div class="field half">
                        <label for="phone">Your Phone</label>
                        <input type="text" name="phone" id="phone" value="555 555 5555" required />
                    </div>
                    <div class="field">
                        <label for="email">Your Email Address</label>
                        <input type="email" name="email" id="email" value="marcohern@gmail.com" required />
                    </div>

                    
                    
                    <div class="field half">
                        <label for="address1">Address 1</label>
                        <input type="text" name="address1" id="address1" value="Cra 123 #45-67" required />
                    </div>
                    <div class="field half">
                        <label for="address2">Address 2</label>
                        <input type="text" name="address2" id="address2" value="Oficina 1010" required />
                    </div>
                    <div class="field quarter">
                        <label for="zone">Zone</label>
                        <input type="text" name="zone" id="zone" value="Los Santos" required />
                    </div>
                    <div class="field quarter">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" value="Medellín" required />
                    </div>
                    <div class="field quarter">
                        <label for="state">State</label>
                        <input type="text" name="state" id="state" value="Antioquia" required />
                    </div>
                    <div class="field quarter">
                        <label for="zip">Zip</label>
                        <input type="text" name="zip" id="zip"  value="050099" required />
                    </div>
                    <div class="field quarter">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country"  value="CO" required />
                    </div>

                    <div class="field">
                        <label for="comments">Comments</label>
                        <textarea name="comments" id="comments" rows="6"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Purchase" class="primary" /></li>
                    <li><a class="button go-home">Cancel</a></li>
                </ul>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
        </section>
    </div>
</section>
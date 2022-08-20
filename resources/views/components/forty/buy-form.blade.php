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
                                        <option value="0">None</option>
                                        <option value="6">1 Sixpack</option>
                                        <option value="12">2 Sixpacks</option>
                                        <option value="18">3 Sixpacks</option>
                                        <option value="20">1 Crate</option>
                                        <option value="40">2 Crates</option>
                                        <option value="80">3 Crates</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <span class="subtotal">$0</span>
                                    <input type="hidden" class="subtotal" name="details[{{$f->code}}][subtotal]"/>
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
                        <input type="text" name="name" id="name" required />
                    </div>
                    <div class="field half">
                        <label for="phone">Your Phone</label>
                        <input type="text" name="phone" id="phone" required />
                    </div>
                    <div class="field">
                        <label for="email">Your Email Address</label>
                        <input type="email" name="email" id="email" />
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
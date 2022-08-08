<!-- Contact -->
<section id="buy">
    <div class="inner">
        <section>
            <form method="post" action="<?=url('/buy') ?>">
                @csrf
                <div class="fields">
                    <div class="field half">
                        <label for="flavor">What flavor?</label>
                        <select name="flavor" id="flavor">
                            <option value="surprise-me">Surprise Me</option>
                            @foreach(config('beery.flavors') as $flavor_code =>$flavor_name)
                            <option value="{{$flavor_code}}">{{$flavor_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field half">
                        <label for="qty">How many?</label>
                        <select name="qty" id="qty">
                            <option value="6">1 Sixpack</option>
                            <option value="12">2 Sixpacks</option>
                            <option value="18">3 Sixpacks</option>
                            <option value="20">1 Crate</option>
                            <option value="40">2 Crates</option>
                            <option value="99999">More than 2 Crates</option>
                        </select>
                    </div>
                    <div class="field half">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="field half">
                        <label for="email">Your Email Address</label>
                        <input type="text" name="email" id="email" />
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
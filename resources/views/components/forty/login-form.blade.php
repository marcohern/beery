<div class="login">
    <form method="post" action="<?=url('/login')?>">
        @csrf
        <div class="row">
            <div class="col-12">
                <h2>Sign In</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" name="username" placeholder="Username"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="password" name="password" placeholder="Password"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="button primary fit">Sign In</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="button fit" href="<?=url('forgot-password')?>">Forgot Pasword?</a>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</div>
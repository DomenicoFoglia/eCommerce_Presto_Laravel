<x-layout>
    <main class="container">
        <section class="row justify-content-center">
            <h1 class="text-center">{{ __('ui.login.signIn') }}</h1>
        </section>
        <section class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">{{ __('ui.login.signIn') }}</button>
                </form>
            </div>
        </section>
    </main>
</x-layout>

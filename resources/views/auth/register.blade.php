<x-layout>
    <main class="container">
        <section class="row justify-content-center">
            <h1 class="text-center">{{ __('ui.register.signUp') }}</h1>
        </section>
        <section class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('ui.register.name') }}</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation"
                            class="form-label">{{ __('ui.register.passwordConfirm') }}</label>
                        <input name="password_confirmation" type="password" class="form-control"
                            id="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('ui.register.submit') }}</button>
                </form>
            </div>
        </section>
    </main>
</x-layout>

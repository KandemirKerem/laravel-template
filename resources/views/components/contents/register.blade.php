<div class="flex items-center justify-center p-8">

    <div class="w-full max-w-md space-y-8">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">N</span>
            <div>
                <p class="text-base font-semibold text-slate-900">Template</p>
                <p class="text-sm text-slate-500">Create your account.</p>
            </div>
        </div>
        <form method="post" action="{{route('register.store')}}" class="space-y-4 bg-card border border-slate-100 rounded-2xl p-6 shadow-sm">
            @csrf
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Username</label>
                <input required name="name" type="text" placeholder="Username" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('name')
            {{$message}}
            @enderror

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Email</label>
                <input required name="email" type="email" placeholder="Example@mail.com" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('email')
            {{$message}}
            @enderror

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Password</label>
                <input required name="password" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('password')
            {{$message}}
            @enderror

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Confirm Password</label>
                <input required name="password_confirmation" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('password_confirmation')
            {{$message}}
            @enderror

            <button type="submit" class="w-full py-3 bg-base text-white rounded-xl text-sm font-semibold hover:bg-slate-900">Create Account</button>
            <p class="text-sm text-center text-slate-600">Already have an account? <a href="{{route('login')}}" class="text-base font-semibold">Login</a></p>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            @endif
        </form>
    </div>
</div>

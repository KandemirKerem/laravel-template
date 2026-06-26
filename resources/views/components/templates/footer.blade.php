<!-- Footer -->
<footer class="bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">N</span>
                <div>
                    <p class="text-base font-semibold text-slate-900">Template</p>
                    <p class="text-sm text-slate-500">Laravel Template</p>
                </div>
            </div>
            <div class="flex gap-6 text-sm text-slate-600">
                <x-templates.navlink href="{{--route('homepage')--}}" :active="request()->routeIs('homepage')">Homepage</x-templates.navlink>
                <x-templates.navlink href="{{--route('blogs.index')--}}" :active="request()->is('blogs*')">Index</x-templates.navlink>
                <x-templates.navlink href="{{--route('dashboard.view')--}}" :active="request()->is('dashboard')">CRUD</x-templates.navlink>
                <x-templates.navlink href="{{--route('profile')--}}" :active="request()->is('profile')">Profile</x-templates.navlink>
            </div>
        </div>
        <div class="mt-6 text-xs text-slate-400">© 2026 Template. All rights reserved.</div>
    </div>
</footer>


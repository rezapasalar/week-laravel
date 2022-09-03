@section('title', __('menu.contact'))

<div class="pb-8">
    <div class="my-bg-contact dark:bg-none pb-8 md:pb-0">
        <div class="md:grid md:grid-cols-6 md:gap-7 max-w-7xl mx-auto pt-8 pb-0 md:pt-8 md:pb-8 sm:px-6 lg:px-8">
            <x-user.contact.factory />
            <x-user.contact.sales />
            <x-user.contact.social />
        </div>
    </div>

    <livewire:user.contact.message />

    <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto mt-8">
        <div class="border dark:border-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10275.372578007984!2d46.077627647789924!3d37.99109525231293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x401a72c9c1febaf1%3A0xcc520235bb2673a6!2sGolasal!5e0!3m2!1sen!2sir!4v1508150890397" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>

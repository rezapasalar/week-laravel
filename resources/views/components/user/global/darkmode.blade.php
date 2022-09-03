<div 
    x-data="{
        mode: 'light',
        changeMode(theme) {
            (theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches))
                ? window.document.documentElement.classList.add('dark')
                : window.document.documentElement.classList.remove('dark');

            this.mode = theme;
            localStorage.theme = theme;
            fetch(`/darkmode/${theme}`);
        }
    }"
    x-init="
        changeMode(localStorage.theme ? localStorage.theme : 'osPreference');
    "
>
    <div x-on:click="changeMode('osPreference')" :class="mode === 'dark' ? 'block' : 'hidden'"><x-both.svg.dark /></div>
    <div x-on:click="changeMode('dark')" :class="mode === 'light' ? 'block' : 'hidden'"><x-both.svg.light /></div>
    <div x-on:click="changeMode('light')" :class="mode === 'osPreference' ? 'block' : 'hidden'"><x-both.svg.preference /></div>
</div>
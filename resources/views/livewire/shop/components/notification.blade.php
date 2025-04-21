<div>
    <div x-transition @notify.window="setTimeout(() => {@this.set('show', false)}, 3000);"
        class="fixed top-5 right-5 z-50 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded shadow"
        style="display: {{ $show ? '' : 'none' }}">
        <p>{{ $message }}</p>
    </div>
</div>

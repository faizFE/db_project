<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-[12px] bg-[#f9f8f8] shadow-[0_2px_8px_rgba(0,0,0,0.15)]']) }}>
    <table class="w-full">
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
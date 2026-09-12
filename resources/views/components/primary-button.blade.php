<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-[100%] max-w-[500px] h-10 bg-[#4BB8FA] text-[#f9f8f8] shadow-[0_2px_8px_rgba(0,0,0,0.3)] mt-3 ml-0 rounded-lg border-[none] hover:bg-[#1591DC] hover:text-[#f9f8f8] hover:cursor-pointer']) }}>
    {{ $slot }}
</button>

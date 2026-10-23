<select {{ $attributes->merge(['class' => 'w-full bg-[#f9f8f8] h-10 mx-0 my-2 shadow-[0_2px_4px_rgba(0,0,0,0.3)] px-[5px] py-0 rounded-lg border-[none] focus:border-2 focus:border-solid focus:border-[#2BBBD7] focus:outline-none']) }}>
    {{ $slot }}
</select>
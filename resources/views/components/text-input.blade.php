@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-[100%] h-10 shadow-[0_2px_8px_rgba(0,0,0,0.3)] bg-[#f9f8f8] mx-0 my-2 pl-2.5 rounded-lg border-[none] focus:border-2 focus:border-solid focus:border-[#2BBBD7] focus:outline-none']) }}>
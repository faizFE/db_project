<textarea {{ $attributes->merge(['class' => 'w-full rounded-[10px] border-solid border-[black] bg-[#f9f8f8] px-4 text-sm text-gray-700 shadow-[0_2px_8px_rgba(0,0,0,0.3)]  outline-none focus:border-2 focus:border-solid focus:border-[#2BBBD7] focus:outline-none'])}}>
    {{ $slot }}
</textarea>
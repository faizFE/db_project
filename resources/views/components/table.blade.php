<div class="w-full overflow-hidden rounded-xl bg-white shadow-[0_2px_8px_rgba(0,0,0,0.15)] my-2">
    <div class="w-full overflow-x-auto">
        <table class="w-full table-auto border-collapse text-center">

            <thead class="[&_th]:border-b [&_th]:border-slate-200 [&_th]:bg-[#f1f2f9] [&_th]:px-4 [&_th]:py-3 [&_th]:text-center [&_th]:text-sm [&_th]:font-semibold">
                {{ $tableHeader }}
            </thead>

            <tbody class="[&_td]:px-4 [&_td]:py-3 [&_td]:text-sm [&_td]:text-center">
                {{ $body }}
            </tbody>

        </table>
    </div>
</div>

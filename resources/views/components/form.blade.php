<div class="w-full overflow-hidden rounded-xl bg-white shadow-md p-5">
    <form {{$attributes}}>
        @csrf
        {{$slot}}
    </form>
</div>
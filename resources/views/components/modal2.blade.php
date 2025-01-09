<dialog id="{{$id}}" class="modal">
    <div class="modal-box bg-white">
        <div class="flex justify-between items-center">
            <h1 class="text-lg text-black">{{$title}}</h1>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost">✕</button>
            </form>
        </div>
        {{$slot}}
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
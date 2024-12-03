<div class="overflow-x-auto border border-gray-200">
    <table class="table table-striped overflow-clip">
        <thead class="">
            <tr>
                @foreach ($headers as $header)
                    <th class="">{{ $header }}</th>
                @endforeach
                    <th>Detalhes</th>
            </tr>
        </thead>
        <tbod>
            {{ $slot }}
        </tbody>
    </table>
</div>

<div class="card">
    <div class="card-header bg-secondary text-white">
        <strong>Keranjang Permintaan Bahan</strong>
    </div>

    <div class="card-body p-0">
        <table class="table table-bordered table-sm mb-0">
            <thead class="thead-light text-center">
                <tr>
                    <th>NO</th>
                    <th>Bahan</th>
                    <th width="120">Jumlah</th>
                    <th>Satuan</th>
                    <th>Kilogram</th>
                </tr>
            </thead>
            <tbody>
                @if($permintaan && $permintaan->details->count())
                    @foreach($permintaan->details as $d)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $d->bahan->nama_bahan }}</td>
                        <td>
                            <input type="number"
                                class="form-control form-control-sm qty-input text-center"
                                data-id="{{ $d->id }}"
                                data-ukuran="{{ $d->bahan->ukuran }}"
                                value="{{ $d->qty ?? '' }}"
                                min="0">
                        </td>
                        <td class="text-center">
                            {{ $d->bahan->satuan->nama_satuan }}
                        </td>
                        <td class="text-center kg-text">
                            {{ $d->kg ?? 0 }}
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada bahan yang diminta
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if($permintaan && $permintaan->details->count())
    <div class="card-footer text-right">
        <form method="POST" action="{{ route('permintaan.submit', $permintaan->id) }}">
            @csrf
            <button class="btn btn-success btn-sm">
                <i class="fa fa-paper-plane"></i> Kirim Permintaan
            </button>
        </form>
    </div>
    @endif
</div>

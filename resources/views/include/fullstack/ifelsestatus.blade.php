@if($data->status_pengajuan === 'ditahan')
<p class="dash-lable mb-0 bg-primary bg-opacity-10 text-primary rounded-2">Menunggu Pengajuan</p>
@elseif($data->status_pengajuan === 'diterima')
<p class="dash-lable mb-0 bg-info bg-opacity-10 text-info rounded-2">Berhasil Dipinjam</p>
@elseif($data->status_pengajuan === 'dikembalikan')
<p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Dikembalikan</p>
@elseif($data->status_pengajuan === 'sukses')
<p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Sukses</p>
@else
<p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Ditolak</p>
@endif
</td>
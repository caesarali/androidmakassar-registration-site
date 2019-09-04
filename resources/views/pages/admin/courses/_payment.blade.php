<div class="modal fade" id="paymentModal" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" v-if="Object.keys(payment).length > 0">
                <div class="form-row">
                    <label class="col-6 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Tanggal Registrasi <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">@{{ payment.created_at }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-6 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Kode Registrasi <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">@{{ payment.code }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-6 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Biaya <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">Rp. @{{ payment.paybill }},-</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-6 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Status <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">
                            <span class="badge badge-success" v-if="payment.status == 2">Done</span>
                            <span class="badge badge-warning" v-else-if="payment.status == 1">Waiting</span>
                            <span class="badge badge-secondary" v-else>Unverified</span>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-6 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Pembayaran <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check mr-1"></i> Verifikasi Pembayaran
                    </button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
                    <label class="col-4 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Date <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">@{{ payment.created_at }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-4 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Code <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">@{{ payment.code }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-4 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Courses <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">@{{ payment.event.name }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-4 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Fee <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">Rp. @{{ payment.paybill }},-</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-4 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Status <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">
                            <span class="badge badge-success" v-if="payment.status == 2"><i class="fas fa-check mr-1"></i> Done</span>
                            <span class="badge badge-warning" v-else-if="payment.status == 1">Need Verification</span>
                            <span class="badge badge-secondary" v-else>Pending</span>
                        </p>
                    </div>
                </div>
                <hr class="border">
                <div class="form-row">
                    <label class="col-4 col-sm-4 col-form-label text-uppercase font-weight-bold d-flex">Bukti Transfer <span class="ml-auto">:</span></label>
                    <div class="col">
                        <p class="form-control-plaintext">
                            <a v-if="payment.receipt && payment.receipt.file_ext == 'pdf'" :href="'/' + payment.file" class="text-decoration-none text-secondary" target="_blank">
                                <i class="far fa-file-pdf"></i>
                                @{{ payment.receipt.date }} - @{{ payment.receipt.name }} (@{{ payment.receipt.bank }})
                            </a>
                            <a v-else href="#" class="text-decoration-none text-secondary" v-on:click.prevent="showPhoto(payment.receipt.file)">
                                <i class="far fa-image"></i>
                                @{{ payment.receipt.date }} - @{{ payment.receipt.name }} (@{{ payment.receipt.bank }})
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    @csrf @method('patch')
                    <div v-if="payment.receipt && payment.status">
                        <input type="hidden" name="status" :value="payment.status == 2 ? 1 : 2">
                        <button type="submit" class="btn btn-primary" v-if="payment.status == 1">
                            <i class="fas fa-check mr-1"></i> Verify Receipt
                        </button>
                        <button type="submit" class="btn btn-danger" v-if="payment.status == 2">
                            <i class="fas fa-times mr-1"></i> Cancel Verification
                        </button>
                    </div>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

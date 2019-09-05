import Swal from 'sweetalert2';

export default class Confirm {
    delete() {
        return Swal.fire({
            title: 'Hapus data?',
            text: "Data yang telah dihapus tidak dapat dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        })
    }
}

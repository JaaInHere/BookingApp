let room_id; // Deklarasi variabel global untuk room_id
let user_id;
let room_name;
console.log('TEST')
function openModal(roomId, userId, roomName) {
    room_id = roomId;
    user_id = userId;
    room_name = roomName;
    room_name = document.getElementById(`room_name_${roomId}`).value;
    document.getElementById('bookingModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('bookingModal').classList.add('hidden');
}

document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Debugging - menampilkan data di console sebelum dikirim
    let userId = $('#user_id').val();

    console.log('Room Name:', room_name);
    console.log('Room Id:', room_id);
    console.log('User Id:', userId);
    console.log('Name:', $('#name').val());

    const date = document.querySelector('input[name="date"]').value.split('T')[0];
    console.log('Date:', date);
    console.log('Waktu Mulai:', $('#start_time').val());
    console.log('Waktu Selesai:', $('#end_time').val());
    console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content'));

    // Lakukan AJAX request setelah memastikan data sudah benar
    $.ajax({
        url: '/dibooking',
        method: 'POST',
        data: {
            room_id: room_id, // room_id diambil dari variabel global
            user_id: $('#user_id').val(),
            room_name: room_name,
            name: $('#name').val(),
            date: date,
            start_time: $('#start_time').val(),
            end_time: $('#end_time').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response.message);
            window.location.href = 'dibooking';
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            // Periksa respons error
            if (xhr.responseJSON && xhr.responseJSON.message) {
                alert(xhr.responseJSON.message); // Tampilkan pesan error dari server
            } else {
                alert('Terjadi Kesalahan: ' + xhr.statusText);
            }
        }

    });
});

function BookingDone(id) {
    if (confirm("Booking Telah Selesai?")) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/admin/dibooking/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Booking Telah Selesai.");
                location.reload(); // Refresh halaman setelah berhasil
            } else {
                alert(data.message || "Booking Gagal Diselesaikan!");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi Kesalahan. Coba lagi nanti!");
        });
    }
}

function BookingDelete(id) {
    if (confirm("Hapus Booking?")) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/admin/dibooking/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Booking Telah Dihapus.");
                location.reload(); // Refresh halaman setelah berhasil
            } else {
                alert(data.message || "Booking Gagal DiHapus!");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi Kesalahan. Coba lagi nanti!");
        });
    }
}

function userDelete(id) {
    if (confirm("Hapus User?")) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/admin/userdata/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("User Telah Dihapus.");
                location.reload(); // Refresh halaman setelah berhasil
            } else {
                alert(data.message || "User Gagal DiHapus!");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi Kesalahan. Coba lagi nanti!");
        });
    }
}

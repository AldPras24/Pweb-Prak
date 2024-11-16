//Latihan 1
$(document).ready(function() {
    $('#header').css('text-align', 'center'); 
    $('li').css('margin', '5px'); 

    $('img[alt="Alumni Photo 1"]').css('border', '2px solid black');
    $('img[alt="Alumni Photo 2"]').css('border', '2px solid black');

    $('#alumniList li').css('font-size', '18px'); 

    $('li:even').css('color', 'blue'); 
    $('.featured').addClass('highlight'); 

    $('.gallery img').on('click', function() {
        var src = $(this).attr('src'); 
        $('#modalImage').attr('src', src); 
        $('#myModal').fadeIn(); 
    });

    $('.close').on('click', function() {
        $('#myModal').fadeOut(); 
    });

    
    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').fadeOut(); 
        }
    });
});
    //latihan 2
    $(document).ready(function () {
        // Menambahkan baris baru ke tabel
        $('#addRow').click(function () {
            const newRow = `
                <tr>
                    <td>No</td>
                    <td>Nama Baru</td>
                    <td>email@baru.com</td>
                    <td>
                        <button class="edit">Edit</button>
                        <button class="delete">Hapus</button>
                    </td>
                </tr>`;
            $('#alumniTable tbody').append(newRow);
        });
    
        // Mengedit baris yang ada
        $('#alumniTable').on('click', '.edit', function () {
            const row = $(this).closest('tr');
            const no = row.find('td').eq(0).text();
            const name = row.find('td').eq(1).text();
            const email = row.find('td').eq(2).text();
    
            // Tampilkan prompt untuk mengedit
            const newNomor = prompt('Edit Nomor:', no);
            const newName = prompt('Edit Nama:', name);
            const newEmail = prompt('Edit Email:', email);
    
            if (newNomor !== null && newName !== null && newEmail !== null) {
                row.find('td').eq(0).text(newNomor);
                row.find('td').eq(1).text(newName);
                row.find('td').eq(2).text(newEmail);
            }
        });
    
        // Menghapus baris dari tabel
        $('#alumniTable').on('click', '.delete', function () {
            if (confirm('Apakah Anda yakin ingin menghapus baris ini?')) {
                $(this).closest('tr').remove();
            }
        });
    });
    
    //Latihan 3
    $(document).ready(function () {
        // Event Mouse: Click dan Hover
        $('#contactButton').click(function () {
            alert("Anda akan menghubungi alumni!");
        });
    
        $('#hoverProfile').hover(
            function () { // mouseenter
                $(this).css({
                    "background-color": "lightblue",
                    "transform": "scale(1.05)",
                    "box-shadow": "0 4px 8px rgba(0, 0, 0, 0.3)"
                });
                $(this).find('img').css({
                    "transform": "scale(1.1)",
                    "filter": "brightness(1.2)"
                });
            },
            function () { // mouseleave
                $(this).css({
                    "background-color": "lightgray",
                    "transform": "scale(1)",
                    "box-shadow": "none"
                });
                $(this).find('img').css({
                    "transform": "scale(1)",
                    "filter": "brightness(1)"
                });
            }
        );
    
        // Event Keyboard: Keydown
        $('#searchAlumni').keydown(function (event) {
            $('#output').text('Anda mengetik: ' + event.key);
        });
    
        // Event Form: Submit
        $('#alumniForm').submit(function (event) {
            event.preventDefault(); // Mencegah pengiriman form
    
            const name = $('#name').val();
            const year = $('#year').val();
            const photo = $('#photo')[0].files[0];
    
            if (name && year && photo) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const newRow = `
                        <tr>
                            <td class="name">${name}</td>
                            <td class="year">${year}</td>
                            <td><img src="${e.target.result}" alt="Photo ${name}" class="alumni-photo"></td>
                            <td class="action-buttons">
                                <button class="delete">Hapus</button>
                            </td>
                        </tr>
                    `;
                    $('#alumniTable tbody').append(newRow);
                    // Bersihkan form
                    $('#name').val('');
                    $('#year').val('');
                    $('#photo').val('');
                    alert(`Data alumni ditambahkan!\nNama: ${name}\nTahun: ${year}`);
                };
                reader.readAsDataURL(photo);
            } else {
                alert('Harap isi semua kolom!');
            }
        });
    
        // Event Dokumen/Window: Resize
        $(window).resize(function () {
            const width = $(window).width();
            const height = $(window).height();
            $('#windowSize').text(`Ukuran jendela: ${width}x${height}`);
        });
    
        // Event Miscellaneous: Ready
        $('#output').text('Dokumen siap! Semua event siap digunakan.');
    
        // Event Kustom: Trigger custom event
        $('#contactButton').click(function () {
            $('#output').trigger('customEvent', ['Kontak alumni diklik!']);
        });
    
        $('#output').on('customEvent', function (event, message) {
            $(this).append(`<p>Event kustom dipicu: ${message}</p>`);
        });
    
        // Animasi Foto
        $('#alumniTable')
            .on('mouseenter', 'img', function () {
                $(this).css({
                    "transform": "scale(1.1)",
                    "filter": "brightness(1.2)"
                });
            })
            .on('mouseleave', 'img', function () {
                $(this).css({
                    "transform": "scale(1)",
                    "filter": "brightness(1)"
                });
            })
            .on('mousedown', 'img', function () {
                $(this).css({
                    "transform": "scale(0.95)",
                    "filter": "brightness(0.8)"
                });
            })
            .on('mouseup', 'img', function () {
                $(this).css({
                    "transform": "scale(1)",
                    "filter": "brightness(1)"
                });
            })
            .on('dblclick', 'img', function () {
                $(this).css({
                    "transform": "rotate(15deg)",
                    "filter": "brightness(1.2)"
                });
                setTimeout(() => {
                    $(this).css({
                        "transform": "rotate(0deg)",
                        "filter": "brightness(1)"
                    });
                }, 500);
            });
    
        // Event Select, Mouseup, Mousemove pada gambar
        $('#alumniTable')
            .on('selectstart', 'img', function () {
                $('#output').text('Gambar sedang dipilih...');
            })
            .on('mouseup', 'img', function () {
                $('#output').text('Mouse button dilepaskan pada gambar.');
            })
            .on('mousemove', 'img', function (event) {
                const offsetX = event.offsetX;
                const offsetY = event.offsetY;
                $('#output').text(`Gerakkan mouse: X=${offsetX}, Y=${offsetY}`);
            }).on('resize',function(){
                $('#windowSize').text('Ukuran jendela:' + ($window).width() + ' x ' + $(window).height());
            });
    
        // Hapus Alumni
        $('#alumniTable').on('click', '.delete', function () {
            $(this).closest('tr').remove();
        });
    });
    //tugas
    $(document).ready(function () {
        // 1. Fade-in semua gambar saat halaman dimuat
        $('.gallery img').hide().fadeIn(1000);
    
        // 2. Menampilkan gambar dalam modal saat diklik
        $('.gallery img').click(function () {
            const src = $(this).attr('src'); // Mendapatkan sumber gambar
            $('.modal img').attr('src', src); // Mengatur gambar pada modal
            $('.modal').fadeIn(); // Menampilkan modal
        });
    
        // 3. Menutup modal dengan tombol "Close" atau klik di luar gambar
        $('.modal .close').click(function () {
            $('.modal').fadeOut();
        });
    
        $('.modal').click(function (event) {
            if (!$(event.target).is('img')) { // Jika klik di luar gambar
                $('.modal').fadeOut();
            }
        });
    });
    


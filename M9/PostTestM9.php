<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu CRUD</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h2>Buku Tamu</h2>
<form id="guestForm" class="mb-4">
    <div class="form-group">
      <label for="guestKode">Kode:</label>
      <input type="text" class="form-control" id="guestKode" required>
    </div>
    <div class="form-group">
      <label for="guestNama">Nama:</label>
      <input type="text" class="form-control" id="guestNama" required>
    </div>
    <div class="form-group">
      <label for="guestEmail">Email:</label>
      <input type="email" class="form-control" id="guestEmail" required>
    </div>
    <div class="form-group">
      <label for="guestPesan">Pesan:</label>
      <input type="text" class="form-control" id="guestPesan" required>
    </div>
    <button type="submit" class="btn btn-primary" id="submitBtn">Add Guest</button>
  </form>
  
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Pesan</th>
        </tr>
      </thead>
      <tbody id="guestTableBody">
      </tbody>
    </table>
  </div>
  <script>
    $(document).ready(function() {
      const script_url = "https://script.google.com/macros/s/AKfycbxxYefRW2037aHxAal6tg-XcLEejisjL0MBfUscBh17hhMSjzrerE9tnl5C7HmqAZGX/exec"
      
      loadGuests();
        $('#guestForm').on('submit', function(event) {
    event.preventDefault();
    const kode = $('#guestKode').val();
    const nama = $('#guestNama').val();
    const email = $('#guestEmail').val();
    const pesan = $('#guestPesan').val();
    $.ajax({
        url: script_url,
        type: "GET",
        dataType: "jsonp",
        data: {
            kode: kode,
            nama: nama,
            email: email,
            pesan: pesan,
            action: 'insert'
        },
        success: function(response) {
            alert(response.result);
            loadGuests();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed: ", textStatus, errorThrown);
        }
    });
});
      function loadGuests() {
        $.ajax({
          url: script_url,
          type: "GET",
          data: { action: "read" },
          dataType: "json",
          success: function(response) {
            const tbody = $('#guestTableBody');
            tbody.empty();
            
            response.forEach(guest => {
              tbody.append(`
                <tr>
                  <td>${guest.Kode}</td>
                  <td>${guest.Nama}</td>
                  <td>${guest.Email}</td>
                  <td>${guest.Pesan}</td>
                </tr>
              `);
            });
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed:", textStatus, errorThrown);
          }
        });
      }
    });
  </script>
</body>
</html>
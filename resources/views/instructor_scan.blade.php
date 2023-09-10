<!-- instructor_scan.blade.php -->

@extends('layouts.instructor')

@section('content')

<div class="container">

  <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda3.png') }}"></a>

  <h1>Escanea el QR del aprendiz</h1>

  <div class="registration-form">
    <form>
      <button class="regresar" id="checkInBtn">Check-In</button>
      <button class="regresar" id="checkOutBtn">Check-Out</button>

      <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <video id="preview"></video>
      <script>
        let lastScannedUserId = null;

        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });

        scanner.addListener('scan', function(content) {
          alert(content);
          lastScannedUserId = content;
        });

        Instascan.Camera.getCameras().then(function(cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            alert('No cameras found.');
          }
        }).catch(function(e) {
          alert(e);
        });

        document.getElementById('checkInBtn').addEventListener('click', function() {
          if (lastScannedUserId) {
              axios.post('/attendance/check-in', { user_id: lastScannedUserId })
              .then(response => {
              if (response.data.success) {
                alert('Check-in exitoso');
              } else {
                alert('Error: ' + response.data.error);
              }
            }).catch(function(error) {
              alert('Error durante el check-in');
            });
          } else {
            alert('No se ha escaneado ningún usuario.');
          }
        });

        document.getElementById('checkOutBtn').addEventListener('click', function() {
          if (lastScannedUserId) {
              axios.post('/attendance/check-out', { user_id: lastScannedUserId })
              .then(response => {
              if (response.data.success) {
                alert('Check-out exitoso');
              } else {
                alert('Error: ' + response.data.error);
              }
            }).catch(function(error) {
              alert('Error durante el check-out');
            });
          } else {
            alert('No se ha escaneado ningún usuario.');
          }
        });
      </script>
    </form>
  </div>
</div>
</div>

@endsection

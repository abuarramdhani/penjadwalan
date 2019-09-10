<div class="modal modal-success fade" id="modal-loading">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="border-radius: 50px; width:">
      <div class="modal-body text-center" style="border-radius: 50px; padding: 5px;">
        <p><div class="lds-ring"><div></div><div></div><div></div><div></div></div><b style="font-size: 20px; margin-left: 5px;">Loading</b></p>
        <style media="screen">
          .lds-ring {
              display: inline-block;
              position: relative;
              width: 30px;
              height: 20px;
              }
              .lds-ring div {
              box-sizing: border-box;
              display: block;
              position: absolute;
              width: 20px;
              height: 20px;
              margin: 6px;
              border: 3px solid #fff;
              border-radius: 50%;
              animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
              border-color: #fff transparent transparent transparent;
              }
              .lds-ring div:nth-child(1) {
              animation-delay: -0.45s;
              }
              .lds-ring div:nth-child(2) {
              animation-delay: -0.3s;
              }
              .lds-ring div:nth-child(3) {
              animation-delay: -0.15s;
              }
              @keyframes lds-ring {
              0% {
                transform: rotate(0deg);
              }
              100% {
                transform: rotate(360deg);
              }
            }
        </style>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

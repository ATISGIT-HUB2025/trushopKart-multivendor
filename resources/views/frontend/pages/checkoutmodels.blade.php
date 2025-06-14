
<!-- INR Modal -->
<div class="modal fade" id="inrModal" tabindex="-1" aria-labelledby="inrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="inrModalLabel">Pay via UPI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ url('qrcode/inr.jpg') }}" alt="INR QR Code" class="qr-code qrcodeimage">
       
        <div class="paydesign">Pay <span id="inr_points">0</span></div>
       
        <div class="wallet-info mt-3">
          <strong>BLOCKPROEX INFOTECH PVT LTD</strong>
        </div>

         <form action="/user/saveneworder" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label text-start d-block mt-3">Transaction Id</label>
                <input
                    type="text"
                    class="form-control"
                    name="transaction_id"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Transaction Id"
                    required
                />
                <input type="hidden" value="inr" name="payment_method" >
                <input type="hidden" name="mypoints" value="" id="points_set">
            </div>

             <div class="mb-3">
               <label for="screenshot" class="form-label text-start d-block mt-3">Upload Screenshot</label>
<input
    type="file"
    class="form-control"
    name="screenshot"
    accept="image/*"
    id="screenshot"
    required
    aria-describedby="screenshotHelp"
/>
<small id="screenshotHelp" class="form-text text-muted">
    Please upload an image file (JPG, PNG, etc.) as your payment screenshot.
</small>
            </div>



            <button class="mybutton" type="submit">Confirm Order</button>
            
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Crypto Modal -->
<div class="modal fade" id="cryptoModal" tabindex="-1" aria-labelledby="cryptoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="cryptoModalLabel">Pay via Mpoints</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ url('qrcode/mpoints.jpg') }}" alt="Mpoints QR Code" class="qr-code qrcodeimage">
        
        <div class="paydesign">Pay <span id="mpoints">0</span></div>

        <div class="wallet-info mt-3">
          <strong>Wallet Address:</strong><br>
          0xABCDEF1234567890abcdef1234567890ABCDEF12
        </div>

        <form action="/user/saveneworder" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label text-start d-block mt-3">Transaction Id</label>
                <input
                    type="text"
                    class="form-control"
                    name="transaction_id"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Transaction Id"
                />
                <input type="hidden" value="points" name="payment_method" >
            </div>

            <button class="mybutton" type="submit">Confirm Order</button>
            
        </form>

      </div>
    </div>
  </div>
</div>
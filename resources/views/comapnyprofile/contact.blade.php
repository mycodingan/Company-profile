<style>
    .icon {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }

    .form-container {
        padding: 20px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .send-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .send-btn:hover {
        background-color: #0056b3;
    }
</style>
<div class="container">
    <div class="text-center">
        <h1 class="judul">Contact Us</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam.
        </p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="address-line mb-3 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div class="contact-info">
                    <div class="contact-info-title font-weight-bold">Address</div>
                    <div>{{ $company->alamat }}</div>
                </div>
            </div>
            <div class="address-line mb-3 d-flex">
                <i class="bi bi-telephone icon"></i>
                <div class="contact-info">
                    <div class="contact-info-title font-weight-bold">Phone</div>
                    <div>{{ $company->nomor_telepon }}</div>
                </div>
            </div>
            <div class="address-line mb-3 d-flex">
                <i class="bi bi-envelope icon"></i>
                <div class="contact-info">
                    <div class="contact-info-title font-weight-bold">Email</div>
                    <div>LenjarBumi@gmail.com</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-container">
                <h2>Send Message</h2>
                <form>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type your message...</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <button type="button" class="send-btn">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
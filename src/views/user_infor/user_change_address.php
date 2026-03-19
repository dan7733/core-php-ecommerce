<?php
if (isset($Address_txtErro) && !empty($Address_txtErro)) {
    echo "<script>alert('$Address_txtErro');</script>";
}
?>

<style>
/* ---------- Form Đổi Địa Chỉ - Đồng bộ hoàn toàn với các form trước ---------- */

.form-change-address {
    min-height: calc(100vh - 140px);
    display: flex;
    align-items: center;
    padding: 20px 15px;
    background-color: #f5f8fb;
}

.card-address {
    background: white;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(33, 130, 130, 0.15);
    overflow: hidden;
    border: 1px solid rgba(33, 130, 130, 0.1);
    max-width: 650px; /* Rộng hơn một chút vì địa chỉ thường dài */
    margin: 0 auto;
    width: 100%;
}

.card-address h4 {
    background: linear-gradient(135deg, #218282, #1a6767);
    color: white;
    text-align: center;
    padding: 25px 20px;
    margin: 0;
    font-size: 1.8rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.card-body {
    padding: 40px 35px;
}

.form-address {
    margin-bottom: 30px;
}

.form-address label {
    display: block;
    font-weight: 600;
    color: #218282;
    margin-bottom: 10px;
    font-size: 1.05rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.form-address input.formcontrol {
    width: 100%;
    padding: 14px 18px;
    font-size: 1.1rem;
    border: 2px solid #d0e0e0;
    border-radius: 12px;
    transition: all 0.3s ease;
    background-color: #f8fcfc;
    color: #2c3e50;
}

.form-address input.formcontrol:focus {
    outline: none;
    border-color: #218282;
    background-color: white;
    box-shadow: 0 0 0 4px rgba(33, 130, 130, 0.15);
}

.form-address input.formcontrol::placeholder {
    color: #aabbbd;
    font-style: italic;
}

/* Nút submit */
.btn-change-address {
    background: linear-gradient(135deg, #218282, #1a6767);
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    padding: 14px 30px;
    border: none;
    border-radius: 12px;
    width: 100%;
    max-width: 320px;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(33, 130, 130, 0.25);
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.btn-change-address:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(33, 130, 130, 0.35);
    background: linear-gradient(135deg, #1a6767, #155555);
}

.btn-change-address:active {
    transform: translateY(0);
}

/* Responsive cho mobile */
@media (max-width: 767.98px) {
    .card-address h4 {
        font-size: 1.6rem;
        padding: 20px 15px;
    }

    .card-body {
        padding: 30px 25px;
    }

    .form-address input.formcontrol {
        padding: 12px 16px;
        font-size: 1rem;
    }

    .btn-change-address {
        padding: 12px 25px;
        font-size: 1.05rem;
        max-width: 100%;
    }

    .form-change-address {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .card-address {
        border-radius: 15px;
        max-width: 100%;
    }

    .card-body {
        padding: 25px 20px;
    }

    .form-address label {
        font-size: 1rem;
    }
}
</style>

<div class="form-change-address row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card-address mt-5">
            <h4>Đổi địa chỉ</h4>
            <div class="card-body">
                <form id="change_addressForm" method="post">
                    <div class="form-address">
                        <label for="newaddress">Địa chỉ mới</label>
                        <input 
                            type="text" 
                            name="diachimoi" 
                            class="formcontrol" 
                            id="newaddress" 
                            placeholder="Nhập địa chỉ mới (ví dụ: 123 Đường Láng, Đống Đa, Hà Nội)" 
                            required 
                            minlength="10"
                            maxlength="255"
                            title="Vui lòng nhập địa chỉ chi tiết">
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" name="change-address-btn" class="btn-change-address btn btn-primary">
                            Đổi địa chỉ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
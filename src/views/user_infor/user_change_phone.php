<?php
if (isset($Phone_txtErro) && !empty($Phone_txtErro)) {
    echo "<script>alert('$Phone_txtErro');</script>";
}
?>

<style>
/* ---------- Form Đổi Số Điện Thoại - Thiết kế đẹp, responsive ---------- */

.form-change-phone {
    min-height: calc(100vh - 140px); /* Điều chỉnh theo chiều cao header + footer nếu có */
    display: flex;
    align-items: center;
    padding: 20px 15px;
    background-color: #f5f8fb;
}

.card-phone {
    background: white;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(33, 130, 130, 0.15);
    overflow: hidden;
    border: 1px solid rgba(33, 130, 130, 0.1);
    max-width: 500px;
    margin: 0 auto;
    width: 100%;
}

.card-phone h4 {
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

.form-phone {
    margin-bottom: 30px;
}

.form-phone label {
    display: block;
    font-weight: 600;
    color: #218282;
    margin-bottom: 10px;
    font-size: 1.05rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.form-phone input.formcontrol {
    width: 100%;
    padding: 14px 18px;
    font-size: 1.1rem;
    border: 2px solid #d0e0e0;
    border-radius: 12px;
    transition: all 0.3s ease;
    background-color: #f8fcfc;
    color: #2c3e50;
}

.form-phone input.formcontrol:focus {
    outline: none;
    border-color: #218282;
    background-color: white;
    box-shadow: 0 0 0 4px rgba(33, 130, 130, 0.15);
}

.form-phone input.formcontrol::placeholder {
    color: #aabbbd;
    font-style: italic;
}

/* Nút submit */
.btn-change-phone {
    background: linear-gradient(135deg, #218282, #1a6767);
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    padding: 14px 30px;
    border: none;
    border-radius: 12px;
    width: 100%;
    max-width: 300px;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(33, 130, 130, 0.25);
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.btn-change-phone:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(33, 130, 130, 0.35);
    background: linear-gradient(135deg, #1a6767, #155555);
}

.btn-change-phone:active {
    transform: translateY(0);
}

/* Responsive cho mobile */
@media (max-width: 767.98px) {
    .card-phone h4 {
        font-size: 1.6rem;
        padding: 20px 15px;
    }

    .card-body {
        padding: 30px 25px;
    }

    .form-phone input.formcontrol {
        padding: 12px 16px;
        font-size: 1rem;
    }

    .btn-change-phone {
        padding: 12px 25px;
        font-size: 1.05rem;
    }

    .form-change-phone {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .card-phone {
        border-radius: 15px;
    }

    .card-body {
        padding: 25px 20px;
    }

    .form-phone label {
        font-size: 1rem;
    }
}
</style>

<div class="form-change-phone row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card-phone mt-5">
            <h4>Đổi số điện thoại</h4>
            <div class="card-body">
                <form id="changephoneForm" method="post">
                    <div class="form-phone">
                        <label for="newphone">Số điện thoại mới</label>
                        <input 
                            type="tel" 
                            name="phonemoi" 
                            class="formcontrol" 
                            id="newphone" 
                            placeholder="Nhập số điện thoại mới (ví dụ: 0901234567)" 
                            required 
                            pattern="^0[1-9][0-9]{8}$" 
                            title="Số điện thoại Việt Nam phải bắt đầu bằng 0 và có 10 chữ số">
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" name="change-phone-btn" class="btn-change-phone btn btn-primary">
                            Đổi số điện thoại
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
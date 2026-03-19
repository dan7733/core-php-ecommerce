<?php
if (isset($Pass_txtErro) && !empty($Pass_txtErro)) {
    echo "<script>alert('$Pass_txtErro');</script>";
}
?>

<style>
/* ---------- Form Đổi Mật Khẩu - Thiết kế đẹp, hiện đại, responsive ---------- */

.form-change-pass {
    min-height: calc(100vh - 140px);
    display: flex;
    align-items: center;
    padding: 20px 15px;
    background-color: #f5f8fb;
}

.card-pass {
    background: white;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(33, 130, 130, 0.15);
    overflow: hidden;
    border: 1px solid rgba(33, 130, 130, 0.1);
    max-width: 550px;
    margin: 0 auto;
    width: 100%;
}

.card-pass .doipass {
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

.form-pass {
    margin-bottom: 30px;
}

.form-pass label {
    display: block;
    font-weight: 600;
    color: #218282;
    margin-bottom: 10px;
    font-size: 1.05rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.form-pass input.formcontrol {
    width: 100%;
    padding: 14px 18px;
    font-size: 1.1rem;
    border: 2px solid #d0e0e0;
    border-radius: 12px;
    transition: all 0.3s ease;
    background-color: #f8fcfc;
    color: #2c3e50;
}

.form-pass input.formcontrol:focus {
    outline: none;
    border-color: #218282;
    background-color: white;
    box-shadow: 0 0 0 4px rgba(33, 130, 130, 0.15);
}

.form-pass input.formcontrol::placeholder {
    color: #aabbbd;
    font-style: italic;
}

/* Hiệu ứng khi mật khẩu không khớp (nếu cần JS bổ sung sau) */
.form-pass input.invalid {
    border-color: #dc3545;
    box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.2);
}

/* Nút submit */
.btn-change-pass {
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

.btn-change-pass:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(33, 130, 130, 0.35);
    background: linear-gradient(135deg, #1a6767, #155555);
}

.btn-change-pass:active {
    transform: translateY(0);
}

/* Responsive cho mobile */
@media (max-width: 767.98px) {
    .card-pass .doipass {
        font-size: 1.6rem;
        padding: 20px 15px;
    }

    .card-body {
        padding: 30px 25px;
    }

    .form-pass input.formcontrol {
        padding: 12px 16px;
        font-size: 1rem;
    }

    .btn-change-pass {
        padding: 12px 25px;
        font-size: 1.05rem;
        max-width: 100%;
    }

    .form-change-pass {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .card-pass {
        border-radius: 15px;
    }

    .card-body {
        padding: 25px 20px;
    }

    .form-pass label {
        font-size: 1rem;
    }
}
</style>

<div class="form-change-pass row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card-pass mt-5">
            <h4 class="doipass">Đổi mật khẩu</h4>
            <div class="card-body">
                <form id="changepassForm" method="post">
                    <div class="form-pass">
                        <label for="newpass">Mật khẩu mới</label>
                        <input 
                            type="password" 
                            class="formcontrol" 
                            name="passmoi" 
                            id="newpass" 
                            placeholder="Nhập mật khẩu mới (tối thiểu 8 ký tự)" 
                            required 
                            minlength="8">
                    </div>

                    <div class="form-pass">
                        <label for="confirmpass">Xác nhận mật khẩu mới</label>
                        <input 
                            type="password" 
                            class="formcontrol" 
                            name="xacnhanpassmoi" 
                            id="confirmpass" 
                            placeholder="Nhập lại mật khẩu mới" 
                            required 
                            minlength="8">
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" name="change_pass-btn" class="btn-change-pass btn btn-primary">
                            Đổi mật khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
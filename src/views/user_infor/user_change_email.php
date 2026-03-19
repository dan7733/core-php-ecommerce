<?php
if (isset($Email_txtErro) && !empty($Email_txtErro)) {
    echo "<script>alert('$Email_txtErro');</script>";
}
?>

<style>
/* ---------- Form Đổi Email - Đồng bộ hoàn toàn với các form trước ---------- */

.form-change-email {
    min-height: calc(100vh - 140px);
    display: flex;
    align-items: center;
    padding: 20px 15px;
    background-color: #f5f8fb;
}

.card-email {
    background: white;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(33, 130, 130, 0.15);
    overflow: hidden;
    border: 1px solid rgba(33, 130, 130, 0.1);
    max-width: 550px;
    margin: 0 auto;
    width: 100%;
}

.card-email h4 {
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

.form-email {
    margin-bottom: 30px;
}

.form-email label {
    display: block;
    font-weight: 600;
    color: #218282;
    margin-bottom: 10px;
    font-size: 1.05rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.form-email input.formcontrol {
    width: 100%;
    padding: 14px 18px;
    font-size: 1.1rem;
    border: 2px solid #d0e0e0;
    border-radius: 12px;
    transition: all 0.3s ease;
    background-color: #f8fcfc;
    color: #2c3e50;
}

.form-email input.formcontrol:focus {
    outline: none;
    border-color: #218282;
    background-color: white;
    box-shadow: 0 0 0 4px rgba(33, 130, 130, 0.15);
}

.form-email input.formcontrol::placeholder {
    color: #aabbbd;
    font-style: italic;
}

/* Nút submit */
.btn-change-email {
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

.btn-change-email:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(33, 130, 130, 0.35);
    background: linear-gradient(135deg, #1a6767, #155555);
}

.btn-change-email:active {
    transform: translateY(0);
}

/* Responsive cho mobile */
@media (max-width: 767.98px) {
    .card-email h4 {
        font-size: 1.6rem;
        padding: 20px 15px;
    }

    .card-body {
        padding: 30px 25px;
    }

    .form-email input.formcontrol {
        padding: 12px 16px;
        font-size: 1rem;
    }

    .btn-change-email {
        padding: 12px 25px;
        font-size: 1.05rem;
        max-width: 100%;
    }

    .form-change-email {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .card-email {
        border-radius: 15px;
    }

    .card-body {
        padding: 25px 20px;
    }

    .form-email label {
        font-size: 1rem;
    }
}
</style>

<div class="form-change-email row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card-email mt-5">
            <h4>Đổi Email</h4>
            <div class="card-body">
                <form id="changeEmailForm" method="post">
                    <div class="form-email">
                        <label for="newEmail">Email mới</label>
                        <input 
                            type="email" 
                            name="emailmoi" 
                            class="formcontrol" 
                            id="newEmail" 
                            placeholder="Nhập email mới (ví dụ: example@gmail.com)" 
                            required>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" name="change-email-btn" class="btn-change-email btn btn-primary">
                            Đổi Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
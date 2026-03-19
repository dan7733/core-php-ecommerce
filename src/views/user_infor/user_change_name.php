<?php
if (isset($Name_txtErro) && !empty($Name_txtErro)) {
    echo "<script>alert('$Name_txtErro');</script>";
}
?>

<style>
/* ---------- Form Đổi Họ và Tên - Đồng bộ style với các form trước ---------- */

.form-change-name {
    min-height: calc(100vh - 140px);
    display: flex;
    align-items: center;
    padding: 20px 15px;
    background-color: #f5f8fb;
}

.card-name {
    background: white;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(33, 130, 130, 0.15);
    overflow: hidden;
    border: 1px solid rgba(33, 130, 130, 0.1);
    max-width: 550px;
    margin: 0 auto;
    width: 100%;
}

.card-name h4 {
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

.form-name {
    margin-bottom: 30px;
}

.form-name label {
    display: block;
    font-weight: 600;
    color: #218282;
    margin-bottom: 10px;
    font-size: 1.05rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.form-name input.formcontrol {
    width: 100%;
    padding: 14px 18px;
    font-size: 1.1rem;
    border: 2px solid #d0e0e0;
    border-radius: 12px;
    transition: all 0.3s ease;
    background-color: #f8fcfc;
    color: #2c3e50;
}

.form-name input.formcontrol:focus {
    outline: none;
    border-color: #218282;
    background-color: white;
    box-shadow: 0 0 0 4px rgba(33, 130, 130, 0.15);
}

.form-name input.formcontrol::placeholder {
    color: #aabbbd;
    font-style: italic;
}

/* Nút submit */
.btn-change-name {
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

.btn-change-name:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(33, 130, 130, 0.35);
    background: linear-gradient(135deg, #1a6767, #155555);
}

.btn-change-name:active {
    transform: translateY(0);
}

/* Responsive cho mobile */
@media (max-width: 767.98px) {
    .card-name h4 {
        font-size: 1.6rem;
        padding: 20px 15px;
    }

    .card-body {
        padding: 30px 25px;
    }

    .form-name input.formcontrol {
        padding: 12px 16px;
        font-size: 1rem;
    }

    .btn-change-name {
        padding: 12px 25px;
        font-size: 1.05rem;
        max-width: 100%;
    }

    .form-change-name {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .card-name {
        border-radius: 15px;
    }

    .card-body {
        padding: 25px 20px;
    }

    .form-name label {
        font-size: 1rem;
    }
}
</style>

<div class="form-change-name row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card-name mt-5">
            <h4>Đổi Họ và Tên</h4>
            <div class="card-body">
                <form id="changenameForm" method="post">
                    <div class="form-name">
                        <label for="currentname">Họ mới</label>
                        <input 
                            type="text" 
                            name="homoi" 
                            class="formcontrol" 
                            id="currentname" 
                            placeholder="Nhập họ mới (ví dụ: Nguyễn)" 
                            required 
                            pattern="[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ\s]+"
                            title="Họ chỉ chứa chữ cái và khoảng trắng">
                    </div>

                    <div class="form-name">
                        <label for="newname">Tên mới</label>
                        <input 
                            type="text" 
                            name="tenmoi" 
                            class="formcontrol" 
                            id="newname" 
                            placeholder="Nhập tên mới (ví dụ: Văn A)" 
                            required 
                            pattern="[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ\s]+"
                            title="Tên chỉ chứa chữ cái và khoảng trắng">
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" name="change-name-btn" class="btn-change-name btn btn-primary">
                            Đổi Họ và Tên
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
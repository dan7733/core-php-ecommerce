<div id="toast-container"></div>
<?php
if (isset($Pass_txtErro) && !empty($Pass_txtErro)) {
    echo "<script>document.addEventListener('DOMContentLoaded', function() { showToast('{$Pass_txtErro}', 'info'); });</script>";
}
?>

<style>
    :root { --deep-green: #0a5c36; --dark-grey: #222; }
    .form-dashboard-wrapper { padding: 20px; animation: fadeUp 0.5s ease-out forwards; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .profile-card { background: #fff; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); border: 1px solid #eaeaea; max-width: 600px; margin: 0 auto; overflow: hidden; }
    .profile-card-header { background-color: #f9f9f9; padding: 25px 30px; border-bottom: 2px solid #eee; display: flex; align-items: center; gap: 15px; }
    .profile-card-header i { font-size: 2.2rem; color: var(--dark-grey); }
    .profile-card-header h4 { margin: 0; font-size: 1.8rem; font-weight: 800; color: #222; text-transform: uppercase; }
    .profile-card-body { padding: 35px 30px; }
    .modern-form-group { margin-bottom: 25px; }
    .modern-form-group label { display: block; font-size: 1.2rem; font-weight: 700; color: #555; margin-bottom: 8px; }
    .modern-input { width: 100%; padding: 15px 18px; font-size: 1.3rem; border: 2px solid #ddd; border-radius: 10px; transition: 0.3s; outline: none; color: #222; }
    .modern-input:focus { border-color: var(--dark-grey); box-shadow: 0 0 0 4px rgba(34, 34, 34, 0.1); }
    .modern-input.error { border-color: #e74c3c; box-shadow: 0 0 0 4px rgba(231, 76, 60, 0.1); }
    .btn-save-profile { background: var(--dark-grey); color: #fff; border: none; padding: 16px 30px; font-size: 1.4rem; font-weight: bold; border-radius: 10px; width: 100%; cursor: pointer; transition: 0.3s; display: flex; justify-content: center; align-items: center; gap: 10px; }
    .btn-save-profile:hover { background: #000; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(34, 34, 34, 0.3); }
    
    #toast-container { position: fixed; bottom: 30px; right: 30px; z-index: 9999; display: flex; flex-direction: column; gap: 10px; }
    .custom-toast { min-width: 320px; background: #fff; padding: 18px 25px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); font-size: 1.3rem; font-weight: 600; display: flex; align-items: center; gap: 15px; border-left: 6px solid var(--dark-grey); transform: translateX(120%); transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); color: #333;}
    .custom-toast.show { transform: translateX(0); }
    .custom-toast i { font-size: 1.8rem; color: var(--dark-grey); }
    
    @media (max-width: 768px) { .profile-card-header { padding: 20px; } .profile-card-header h4 { font-size: 1.5rem; } .profile-card-body { padding: 25px 20px; } .modern-input { font-size: 1.2rem; padding: 12px; } .btn-save-profile { font-size: 1.3rem; } }
</style>

<div class="form-dashboard-wrapper">
    <div class="profile-card">
        <div class="profile-card-header">
            <i class="fas fa-shield-alt"></i>
            <h4>Bảo mật Mật khẩu</h4>
        </div>
        <div class="profile-card-body">
            <form method="post" onsubmit="return validatePass()">
                <div class="modern-form-group">
                    <label for="newpass">Mật khẩu mới</label>
                    <input type="password" name="passmoi" class="modern-input" id="newpass" placeholder="Tối thiểu 8 ký tự" required minlength="8">
                </div>
                <div class="modern-form-group">
                    <label for="confirmpass">Xác nhận lại mật khẩu</label>
                    <input type="password" name="xacnhanpassmoi" class="modern-input" id="confirmpass" placeholder="Nhập lại mật khẩu mới" required minlength="8">
                    <small id="passError" style="color: #e74c3c; display: none; margin-top: 8px; font-weight: bold; font-size: 1.1rem;"><i class="fas fa-exclamation-triangle"></i> Mật khẩu xác nhận không khớp!</small>
                </div>
                <button type="submit" name="change_pass-btn" class="btn-save-profile">
                    <i class="fas fa-lock"></i> ĐỔI MẬT KHẨU
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Kiểm tra mật khẩu khớp nhau ngay lúc submit
    function validatePass() {
        const pass = document.getElementById('newpass').value;
        const confirm = document.getElementById('confirmpass').value;
        const error = document.getElementById('passError');
        const confirmInput = document.getElementById('confirmpass');
        
        if (pass !== confirm) {
            error.style.display = 'block';
            confirmInput.classList.add('error');
            return false;
        }
        error.style.display = 'none';
        confirmInput.classList.remove('error');
        return true;
    }

    function showToast(msg, type) {
        const c = document.getElementById('toast-container');
        if(!c) return;
        const t = document.createElement('div');
        t.className = `custom-toast ${type}`;
        t.innerHTML = `<i class="fas fa-info-circle"></i> <span>${msg}</span>`;
        c.appendChild(t);
        setTimeout(() => t.classList.add('show'), 10);
        setTimeout(() => { t.classList.remove('show'); setTimeout(() => t.remove(), 400); }, 3000);
    }
</script>